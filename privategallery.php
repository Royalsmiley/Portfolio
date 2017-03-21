

<html>
<head>
<meta charset="UTF-8">
    <title>Riley van de Wiel CMS</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<body>

<div class="header">
<div class="navbalk">
	</div>
	<div class="headerimg">

	</div> 
	<div class="homeback">
	<div class="paginainhoud">
	<div class="center">
<?php include 'menu_3.php' ?>




	
	<?php

// Check for post data.
if ($_POST && !empty($_FILES)) {
	$formOk = true;

	//Assign Variables
	$path = $_FILES['image']['tmp_name'];
	$name = $_FILES['image']['name'];
	$size = $_FILES['image']['size'];
	$type = $_FILES['image']['type'];
	$title = $_POST['title'];
	$soort = $_POST['soort'];


	if ($_FILES['image']['error'] || !is_uploaded_file($path)) {
		$formOk = false;
		echo "Error: Error in uploading file. Please try again.";
	}

	//check file extension
	if ($formOk && !in_array($type, array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif'))) {
		$formOk = false;
		echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
	}
	// check for file size.
	if ($formOk && filesize($path) > 9000000) {
		$formOk = false;
		echo "Error: File size must be less than 500 KB.";
	}

	if ($formOk) {
		// read file contents
		$content = file_get_contents($path);

		//connect to mysql database
		if ($conn = mysqli_connect('rdbms.strato.de', 'U2105728', '2p6rs3xm', 'DB2105728')) {
			$content = mysqli_real_escape_string($conn, $content);
			$sql = "insert into images (name, size, type, content, title, soort) values ('{$name}', '{$size}', '{$type}', '{$content}','($title)','($soort)')";

			if (mysqli_query($conn, $sql)) {
				$uploadOk = true;
				$imageId = mysqli_insert_id($conn);
				
			} else {
				echo "Error: Could not save the data to mysql database. Please try again.";
			}

			mysqli_close($conn);
		} else {
			echo "Error: Could not connect to mysql database. Please try again.";
		}
	}
}
?>

<div class="galleryback">
<div class="gallerys">
<h1>Gallery page</h1> 
<div class="upload">
		<?php if (!empty($uploadOk)): ?>
		  		<h3>Recently Uploaded:</h3>
		  	
			
				<img src="image.php?id=<?=$imageId ?>" width="150px">
				<!--<strong>Embed</strong>: <input size="25" value='<img src="image.php?id=<?=$imageId ?>">'>-->
			

			<hr>
		<? endif; ?>

		<form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" >
		  <div>
		  	<h3>Image Upload:</h3>
		  </div>
		  <div>
		  	<label>Image</label>
		  	<input type="hidden" name="MAX_FILE_SIZE" value="500000">
			<input type="file" name="image" />
			<input type="text" name="title" placeholder="title" />
Kind:
<select name="kind">
<option value="none">none</option>
<option value="pencil">Pencil</option>
<option value="Fine-liner">Fine-liner</option>
</select>
		    <input name="submit" type="submit" value="Upload">
		  </div>
		</form>
</div>

 

</div>
</div>
</div>
<?php
	include 'Footer.php';
	?>
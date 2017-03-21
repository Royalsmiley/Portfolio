<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<html>
<head>
<meta charset="UTF-8">
    <title>Riley | Blog</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="contentwrapper">
<div class="header">
	<?php
	include 'menu_.php';
	?>
	

		
		</div>
<div class="blogback">
	<div class="bloginhoud">
		<div class="blogleft">
			<p><h2> Blog entries: </h2></p>
			<?php
				//here i make a connection to the database
				$connection = mysql_connect("rdbms.strato.de", "U2105728", "2p6rs3xm"); 
				$db = mysql_select_db("DB2105728", $connection); 
				$query = mysql_query("select * from blog_posts", $connection);
				while ($row = mysql_fetch_array($query)) {
				echo "<b><a href=\"blog.php?id={$row['id']}\">{$row['title']} - {$row['date_posted']}</a></b>";
				echo "<br />";
				}
			?>
		
			<?php
				//here i take the blog posts from the database
				if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$query1 = mysql_query("select * from blog_posts where id=$id", $connection);
				while ($row1 = mysql_fetch_array($query1)) {
				?>
				<div class="form">
				
				<!-- Displaying Data Read From Database -->
				<div class="blogpost">
					<div class="blogtext">
						<h2> <?php echo $row1['title']; ?> </h2>
						<?php echo $row1['post']; ?>
					</div>
					<div class="blogimg">
						<img src="image2.php?id=<?=$id ?>" width="200px">
					</div>
				</div>
			
</div>
<?php
}
}
?>
		</div>
		<div class="blogright">
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
	$post = $_POST['post'];
	$date_posted = $_POST['date'];


	if ($_FILES['image']['error'] || !is_uploaded_file($path)) {
		$formOk = false;
		echo "Error: Error in uploading file. Please try again.";
	}

	//check file extension
	if ($formOk && !in_array($type, array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif'))) {
		$formOk = false;
		echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
	}

	if ($formOk) {
		// read file contents
		$content = file_get_contents($path);

		//connect to mysql database
		if ($conn = mysqli_connect('rdbms.strato.de', 'U2105728', '2p6rs3xm')) {
			$content = mysqli_real_escape_string($conn, $content);
			$sql = "insert into blog_posts (title, post, content, date_posted, type) values ('{$title}', '{$post}', '{$content}', '{$date_posted}', '{$type}')";

			if (mysqli_query($conn, $sql)) {
				$uploadOk = true;
				
				
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
<form action="<?=$_SERVER['PHP_SELF']?>" method="post"  enctype="multipart/form-data" >
<label>Title</label><input type="text" name="title" placeholder="title" />
<label>Date</label><input type="text" name="date" placeholder="date" />
<label for="bericht">Message:</label><br />
      <textarea id="post" name="post" rows="8" style="width: 400px;"></textarea><br />
<label>Image</label>
		  	<input type="hidden" name="MAX_FILE_SIZE" value="500000">
			<input type="file" name="image" />
<input name="submit" type="submit" value="Upload">
	  </form>

		</div>
	</div>
</div>
</div>
<?php
	include 'Footer.php';
	?>
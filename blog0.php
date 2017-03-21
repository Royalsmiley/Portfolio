<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php 
    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
    $submitted_username = ''; 
    if(!empty($_POST)) 
    { 
        // This query retreives the user's information from the database using their username. 
        $query = " 
            SELECT 
                id, 
                username, 
                password, 
                salt, 
                email 
            FROM users 
            WHERE 
                username = :username 
        "; 
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 

            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 

            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // This variable tells us whether the user has successfully logged in or not. 
        $login_ok = false; 
         
        // Retrieve the user data from the database.
        $row = $stmt->fetch(); 
        if($row) 
        { 
            // we now check to see whether the passwords match by hashing the submitted password 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
             
            if($check_password === $row['password']) 
            { 
                // If they do, then we flip this to true 
                $login_ok = true; 
            } 
        } 

        if($login_ok) 
        { 
            // Here I am preparing to store the $row array into the $_SESSION by removing the salt and password values from it.
            unset($row['salt']); 
            unset($row['password']); 

            $_SESSION['user'] = $row; 
        } 
        else 
        { 
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
     
?> 

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
				<h2> Blog entries: </h2>
				
				<div class="blogpost">
					<div class="blogtext">
						<h2> Aragorn [Work in progress] </h2>
						<p>Here's Aragorn, son of Arathorn, King of Gonder!<br>
						At the moment I'm busy drawing Aragorn, hopefully I do his glory justice! <br>
						So far the amount of work put into this bastard is over <strong> 5 </strong> hours!<br>
						<br>
						I'll keep working on it and hopefully i have it done before the weekend! :)</p>
					</div>
					<div class="blogimg">
						<img src="image2.php?id=1" width="200px">
					</div>
				</div>
				<div class="blogpost">
					<div class="blogtext">
						<h2>The hollowed! </h2>
						<p>Once they were elves living in Advenium, Hill-elves they were called. They all lived happy lives.  
						But when the god Eguru decided they were too merry, 
						they had to less troubles he disobayed the other gods and their deal of not getting involved. 
						Because the last time they got involved half of the world was destroyed. 
						But still Eguru disobayed them and went to Advenium, 
						There he watched with the hill-elves with anger and then Eguru came up with an what he thought.. 
						Brilliant plan, he split the hill-elves in to seperate people.. One side you have their shell, 
						they still look like hill-elves but more emotionless and they all seem a bit more pale. 
						The other side you have a shell of their sins
					</div>
					<div class="blogimg">
						<img src="image2.php?id=2" width="200px">
					</div>
				</div>
				<div class="blogpost">
					<div class="blogtext">
						<h2> Cadan Raine </h2>
						<p>Cadan of the house Raine. House Raine is has become a famous house, 
						they were Nivrains but also duo to the claim to the throne of Andai and thus Klindav, 
						house Raine had this claim thanks to the assassination on King Eckbert. He was assassinated by the Nightcrawlers. 
						King Eckbert was young and had no brothers nor children. Father of Cadan, Berethor Raine was the trusty advisor of Eckbert.
						When Eckbert was assassinated the country of Klindav was in panic, they needed a new king. </p>
					</div>
					<div class="blogimg">
						<img src="image2.php?id=3" width="200px">
					</div>
				</div>
				<div class="blogpost">
					<div class="blogtext">
						<h2> Humans! </h2>
						<p>The humans, Native to klindav and most of the have lived and still live in Klindiv. 
						Humans are believed to be a descendent of the lord Agarmir, 
						Many evolved through as the humans we know but some still possess a bit of the power of Agarmir, 
						they are concidered heroes by the other humans, they are mightier, 
						a little bit bigger and live longer than normal humans, They are called Nivrains. 
						One of the most famous families who still posess this bloodline are noblemen.</p>
					</div>
					<div class="blogimg">
						<img src="image2.php?id=4" width="200px">
					</div>
				</div>
			
</div>

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
	if ($formOk && filesize($path) > 500000) {
		$formOk = false;
		echo "Error: File size must be less than 500 KB.";
	}

	if ($formOk) {
		// read file contents
		$content = file_get_contents($path);

		//connect to mysql database
		if ($conn = mysqli_connect('localhost', 'root', 'root', 'site')) {
			$content = mysqli_real_escape_string($conn, $content);
			$sql = "insert into blog_posts (title, post, type, content) values ('{$title}', '{$post}', '{$type}', '{$content}')";

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
<form action="<?=$_SERVER['PHP_SELF']?>" method="post"  >
<label>Title</label><input type="text" name="title" placeholder="title" />
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
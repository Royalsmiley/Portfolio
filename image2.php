<?php


	// verify request id.
	if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
		echo 'A valid image file id is required to display the image file.';
		exit;
	}

	$imageId = $_GET['id'];

	//connect to mysql database
	if ($conn = mysqli_connect('rdbms.strato.de', 'U2105728', '2p6rs3xm', 'DB2105728')) {
		$content = mysqli_real_escape_string($conn, $content);
		$sql = "SELECT title, post, type, content FROM blog_posts where id = {$imageId}";

		if ($rs = mysqli_query($conn, $sql)) {
			$imageData = mysqli_fetch_array($rs, MYSQLI_ASSOC);
			mysqli_free_result($rs);
		} else {
			echo "Error: Could not get data from mysql database. Please try again.";
		}
		//close mysqli connection
		mysqli_close($conn);

	} else {
		echo "Error: Could not connect to mysql database. Please try again.";
	}	

	if (!empty($imageData)) {
		// show the image.
		header("Content-type: {$imageData['type']}");
		echo $imageData['content'];
	}
?>
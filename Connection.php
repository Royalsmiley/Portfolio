
</html><!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <title>layout</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">

<?php
$servername = "rdbms.strato.de";
	$username = "U2105728";
	$password = "2p6rs3xm";
	$dbname = "DB2105728";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



function genereerHTML($t,$b,$i)
{
		echo '<div class="content"><h1>'.$t.'</h1><div class="imgContainer"><img src="'.$b.'" width="100" height="100" border="0" alt="Lipsum"></div><p>'.$i.'</p></div>';
}

?>

    </div>
</body>
</html>
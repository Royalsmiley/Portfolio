<?php
$id = intval($_GET['id']);

include("Connection.php");

$sql="SELECT * FROM rubrics WHERE id = '".$id."'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
{echo $row['title'].' <br><br> '. $row['content'];}

?>
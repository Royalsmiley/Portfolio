<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php // Nessesary for a connection with the database and importing the text from the database
  require("common.php"); 
include 'sessiestart.php';
include 'cms/config.php';
$SQL = "SELECT * FROM Aboutcontent";
$result = $db->query($SQL);
$row = $result->fetch_array()
?>

<html>
<head>
<meta charset="UTF-16">
    <title>Riley | About</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
		<script> /* This is nessecary to highlight the page youre on */
$(function(){
  $('a').each(function() {
    if ($(this).prop('href') == window.location.href) {
      $(this).addClass('current');
    }
  });
});
</script>


</head>
<body>
<div class="header">

	<?php
	include 'menu_.php';
	?>
		</div>
<div class="aboutback">
	<div class="paginainhoud">
		<div class="aboutleft">
		
			<h1> <?php echo $row["Titel"] ?></h1><br>
             <?php echo $row["Content1"] ?>	



		</div>
		<div class="aboutright">
			<div class="aboutimg">
				<img src="image.php?id=1" height="380px" ;="" width="300px">
			</div>
		</div>
	</div>
</div>

</div>
<?php
	include 'Footer.php';
	?>
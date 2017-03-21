<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php // Nessesary for a connection with the database and importing the text from the database
  require("Connection.php"); 

include 'cms/config.php';
$SQL = "SELECT * FROM Homecontent";
$result = $db->query($SQL);
$row = $result->fetch_array()
?>

<html>
<head>
<meta charset="UTF-8">
    <title>Riley | Home</title>
	<link rel=”shortcut icon” href=”favicon.ico” type="image/png">
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
<div class="homeback">
	<div class="paginainhoud">
		<div class="aboutleft">
        	<div class="inhoudtext">
            <h1> <?php echo $row["Titel"] ?></h1><br>
             <?php echo $row["Content"] ?>
			 <br><br>
			 <a href="about.php">Read more about me... </a>
            </div>

            
        </div>
		
		<!-- The small gallery of 4 pictures which are linked to the gallery page -->
	  <div class="aboutright">
        	<h1> Gallery </h1>
			<br>
        <div class="galleryimg"><a href="gallery.php"><img src="image.php?id=3"width='190px'; height='190px';></div></a>
        <div class="galleryimg"><a href="gallery.php"><img src="image.php?id=4"width='190px'; height='190px';></div></a>
        <div class="galleryimg"><a href="gallery.php"><img src="image.php?id=5"width='190px'; height='190px';></div></a>
        <div class="galleryimg"><a href="gallery.php"><img src="image.php?id=6"width='190px'; height='190px';></div></a>
          <p>&nbsp;</p>
            
		</div>
	</div>
</div>
</div>
<?php
	include 'Footer.php';
	?>

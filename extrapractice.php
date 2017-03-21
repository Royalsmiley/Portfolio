<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php // Nessesary for a connection with the database and importing the text from the database
  require("common.php"); 
include 'sessiestart.php';
include 'cms/config.php';

?>

<html>
<head>
<meta charset="UTF-16">
    <title>Riley | Vakinhoud</title>
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
	<a href="http://rvandewiel.com/Ded.php">
				 Terug 
			</a>
		<div class="links">
			<a href="http://rvandewiel.com/Practice1/php3.php">
				<h1> Practice 1: Rekentafel</h1>
			</a>
			<p> 
				Simpel rekentafeltje 
			</p><br>
		
			<a href="http://rvandewiel.com/Practice3/php2.php">
				<h1> Practice 2: Leeftijd berekenaar</h1>
			</a>
			<p> 
				Je moet je verjaardag in voeren en vervolgens wordt je leeftijd weergegeven
			</p><br>
				
			<a href="http://rvandewiel.com/Practice/php3.php">
				<h1> Practice 3: Bewegend plaatje</h1>
			</a>
			<p> 
				Hier bewegen 3 plaatjes van links naar rechts, de snelheid veranderd per keer.De afstand hangt af van de window, hij is namelijk resizable.
			</p><br>


		</div>
		
		
	</div>
</div>



</div>
<?php
	include 'Footer.php';
	?>
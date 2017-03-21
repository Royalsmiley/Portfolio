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
	<a href="http://rvandewiel.com/projects.php">
				 Terug 
			</a>
		<div class="voorwoord"><p><h1>  </h1>
			<br>
			
		</P>
		</div>
		<div class="links">
			<a href="http://rvandewiel.com/dev.php">
				<h1> Development (DEV) </h1>
			</a>
			<a href="http://rvandewiel.com/ux.php">
				<h1> User experience (UX) </h1>
			</a>
			<a href="http://rvandewiel.com/seo.php">
				<h1> Search engine optimisation (SEO) </h1>
			</a> 
            <a href="http://rvandewiel.com/sco.php">
				<h1> Strategy & Concepting (SCO) </h1>
			</a>
		<!--	<a href="http://rvandewiel.com/ptm.php">
				<h1> Proftaak media (PTM) </h1>
			</a> -->
			<a href="http://rvandewiel.com/scrum.php">
				<h1> SCRUM </h1>
			</a>
		</div>
		
		
	</div>
</div>



</div>
<?php
	include 'Footer.php';
	?>
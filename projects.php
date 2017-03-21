<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<html>
<head>
<meta charset="UTF-8">
    <title>Riley | Projects</title>
	<link href="style.css" rel="stylesheet" type="text/css">
		<link href="style.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="gallerij.js"></script>
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
<div class="projectback">
	<div class="paginainhoud2">
			<div class="boxgrid captionfull">
				<img src="images/vakinhoud.png"style="width: 300px; height: 260px;"/>
				<div class="cover boxcaption">
					<h2>Vakinhoud</h2>
					<p>link:<br/><a href="http://rvandewiel.com/vakinhoud.php">Click here</a></p>
				</div>		
			</div>
			<div class="boxgrid captionfull">
				 <img src="images/web1.jpg" style="width: 300px; height: 260px;"/>  <!--  Displays the tumbnail  !-->
				<div class="cover boxcaption">
					<h2>Youcook</h2> <!-- Title of the project !-->
					<p>Website link:<br/><a href="http://rvandewiel.com/project1.php">Click here</a></p> <!--  !-->
				</div>		
			</div>

			<div class="boxgrid captionfull">
				<img src="images/dig-mag.png"style="width: 300px; height: 260px;"/>
				<div class="cover boxcaption">
					<h2>Design digital magazine</h2>
					<p>Website link:<br/><a href="http://rvandewiel.com/project2.php">Click here</a></p>
				</div>		
			</div>
			<div class="boxgrid captionfull">
				<img src="images/web5.png"style="width: 300px; height: 260px;"/>
				<div class="cover boxcaption">
					<h2>Brandguide</h2>
					<p>Document link:<br/><a href="http://rvandewiel.com/projects/project3.php">Click here</a></p>
				</div>		
			</div>
			<div class="boxgrid captionfull">
				<img src="images/web6.png"style="width: 300px; height: 260px;"/>
				<div class="cover boxcaption">
					<h2>Kris van Son</h2>
					<p>Document link:<br/><a href="http://rvandewiel.com/project4.php">Click here</a></p>
				</div>		
			</div>
			<div class="boxgrid captionfull">
				<img src="images/web7.png"style="width: 300px; height: 260px;"/>
				<div class="cover boxcaption">
					<h2>Poster</h2>
					<p>Document link:<br/><a href="http://rvandewiel.com/project5.php">Click here</a></p>
				</div>		
			</div>
			<div class="boxgrid captionfull">
				<img src="images/web8.png"style="width: 300px; height: 260px;"/>
				<div class="cover boxcaption">
					<h2>LPF - Verslag</h2>
					<p>Document link:<br/><a href="http://rvandewiel.com/project6.php">Click here</a></p>
				</div>		
			</div>
			<div class="boxgrid captionfull">
				<img src="images/web9.png"style="width: 300px; height: 260px;"/>
				<div class="cover boxcaption">
					<h2>Digital Art</h2>
					<p>Document link:<br/><a href="http://rvandewiel.com/project7.php">Click here</a></p>
				</div>		
			</div>
	</div>
</div>
</div>
<?php
	include 'Footer.php';
	?>
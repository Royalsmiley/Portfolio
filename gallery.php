<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php 
    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 

?> 

<html>
<head>
<meta charset="UTF-8">
    <title>Riley | Gallery</title>
	<link href="style.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script><script>
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

<div class="galleryback">
<div class="gallerys">





	<br />
	<div class="preview" align="center">
		<img name="preview" src="http://rvandewiel.com/image.php?id=3" alt=""/>
	</div>
	
	<div class="thumbnails">
		
		<img onmouseover="preview.src=img3.src" name="img3" src="image.php?id=3"/>
		<img onmouseover="preview.src=img4.src" name="img4" src="image.php?id=4"/>
		<img onmouseover="preview.src=img5.src" name="img5" src="image.php?id=5"/>
		<img onmouseover="preview.src=img6.src" name="img6" src="image.php?id=6"/>
		<img onmouseover="preview.src=img7.src" name="img7" src="image.php?id=7"/>
		<img onmouseover="preview.src=img8.src" name="img8" src="image.php?id=8"/>
		<img onmouseover="preview.src=img9.src" name="img9" src="image.php?id=9"/>
		<img onmouseover="preview.src=img10.src" name="img10" src="image.php?id=10"/>
		<img onmouseover="preview.src=img11.src" name="img11" src="image.php?id=11"/>
		<img onmouseover="preview.src=img12.src" name="img12" src="image.php?id=12"/>
		<img onmouseover="preview.src=img13.src" name="img13" src="image.php?id=13"/>
		<img onmouseover="preview.src=img14.src" name="img14" src="image.php?id=14" />
		<img onmouseover="preview.src=img15.src" name="img15" src="image.php?id=15"/>
		<img onmouseover="preview.src=img16.src" name="img16" src="image.php?id=16" />
		<img onmouseover="preview.src=img17.src" name="img17" src="image.php?id=17"/>
		<img onmouseover="preview.src=img18.src" name="img18" src="image.php?id=18" />
		<img onmouseover="preview.src=img19.src" name="img19" src="image.php?id=19" alt=""/>
	</div><br/>



</div>
</div>

</body>
<?php
	include 'Footer.php';
	?>
</html>
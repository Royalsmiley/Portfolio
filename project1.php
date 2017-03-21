<!DOCTYPE html>
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
    <title>Riley | Project</title>
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

	<script>

function showContent(id) {
    if (id == "") {
        document.getElementById("DataContent").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            Content = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            Content = new ActiveXObject("Microsoft.XMLHTTP");
        }
        Content.onreadystatechange = function() {
            if (Content.readyState == 4 && Content.status == 200) {
                document.getElementById("DataContent").innerHTML = Content.responseText;
            }
        }
        Content.open("GET","php/getcontent.php?id="+id,true);
        Content.send();
    }
}
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
				<a href="http://rvandewiel.com/projects.php">
				 Terug 
			</a>
			<h1> YouCook </h1><br>
             This website was created for a school project to have a digital media product.
			 <br><br>

		</div>
		<div class="aboutright">
			<ul>
				<li><span>Client:</span> School project</li>
				<li><span>Type:</span> Website</li>
				<li><span>Year:</span> 2014</li>
			</ul>
			<br><br>
			<a href="http://rvandewiel.com/Youcook/" class="viewLivesite" target="_blank" style="padding-left:30px; font-size:20px;">View Live Site</a>
			
		</div>
	</div>
</div>

</div>
<?php
	include 'Footer.php';
	?>
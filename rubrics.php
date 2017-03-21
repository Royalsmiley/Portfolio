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
        Content.open("GET","getcontent.php?id="+id,true);
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
<div class="galleryback">
	<div class="paginainhoud">
		<div class="content">
			<div class="projectcontainer">
				<div class="aboutleft">
				
					<div id="rubrics_nav">
						<ul>
						<li><a id="1" onclick= "showContent(this.id)">Generalist</a></li>
						<li><a id="2" onclick= "showContent(this.id)">Specialist</a></li>
						<li><a id="3" onclick= "showContent(this.id)">Methorisch en gestructureerd</a></li>
						<li><a id="4" onclick= "showContent(this.id)">Originaliteit en creativiteit</a></li>
						<li><a id="5" onclick= "showContent(this.id)">Samenwerken</a></li>
						<li><a id="6" onclick= "showContent(this.id)">Ondernemendheid</a></li>
						<li><a id="7" onclick= "showContent(this.id)">Informatievaardig</a></li>
						<li><a id="8" onclick= "showContent(this.id)">Onderbouwing en verantwoording</a></li>
						<li><a id="9" onclick= "showContent(this.id)">Kritische houding</a></li>
						<li><a id="10" onclick= "showContent(this.id)">Communicatievaardig</a></li>
						<li><a id="11" onclick= "showContent(this.id)">Reflectievermogen</a></li>
						<li><a id="12" onclick= "showContent(this.id)">Ontwikkelingsgericht</a></li>
						</ul>       
					</div>

				</div>
				<div class="aboutright">
					<div class="aboutimg">
						<div id="rubrics_content">  
							<p id = "DataContent">
								Klik op de rubric onderwerpen links om te bekijken welke ontwikkelingen ik heb gemaakt.
							</p>    
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>
</div>
<?php
	include 'Footer.php';
	?>
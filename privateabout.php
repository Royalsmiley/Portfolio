<?php
include 'sessiestart.php';
include 'cms/config.php';


//var
$Titel = $_POST['Titel'];
$Content1 = $_POST['Content1'];
$Content2 = $_POST['Content2'];
$Content3 = $_POST['Content3'];

	if (isset($_POST['Titel'])){
         //$sql = "UPDATE Homecontent SET (Titel, Content) VALUES ('".$_POST['titel']."' , '".$_POST['content']."') WHERE ID = 1";
		 //$sql = "UPDATE Homecontent SET Titel = '$Titel' , Content = '$Content' WHERE ID = '1'";
		 $sql = "UPDATE Aboutcontent SET Titel = '$Titel' , Content1 = '$Content1' , Content2 = '$Content2' , Content3 = '$Content3'";
         $db->query($sql);
		 header('location:privateabout.php');
        }
	?>

<html>
<head>
<meta charset="UTF-8">
    <title>Riley van de Wiel CMS</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<body>

<div class="header">
<div class="navbalk">
	</div>
	<div class="headerimg">

	</div> 
	<div class="galleryback3">
	<div class="paginainhoud">
	<div class="center">
<?php include 'menu_3.php' ?>


<?php $SQL = "SELECT * FROM Aboutcontent WHERE ID=1";
$result = $db->query($SQL);
$row = $result->fetch_array();
?>


<h1>Aboutpage</h1> 
<form action="privateabout.php" method="post"> 
       Titel:<br /> 
    <input type="text" name="Titel" value="<?php echo $row["Titel"] ?>" maxlength="20" required /> 
    <br /><br /> 
    Content 1:<br /> 
    <textarea type="text" name="Content1" required style="width:300px; height:200px;"; ><?php echo $row["Content1"] ?></textarea> 
    <br /><br /> 
	 Content 2:<br /> 
    <textarea type="text" name="Content2" required style="width:300px; height:200px;"; ><?php echo $row["Content2"] ?></textarea> 
    <br /><br /> 
	 Content 3:<br /> 
    <textarea type="text" name="Content3" required style="width:300px; height:200px;"; ><?php echo $row["Content3"] ?></textarea> 
    <br /><br /> 
    <input type="submit" value="Change" /> 
</form> 

</div>
</div>
</div>
<?php
	include 'Footer.php';
	?>
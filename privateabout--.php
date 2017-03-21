<?php
include 'sessiestart.php';
include 'cms/config.php';


//var
$Titel = $_POST['Titel'];
$Content = $_POST['Content'];

	if (isset($_POST['Titel'])){
		 $sql = "UPDATE Aboutcontent SET Titel = '$Titel' , Content1 = '$Content1' , Content2 = '$Content2' , Content3 = '$Content3'";
         $db->query($sql);
		 header('location:private.php');
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


<h1>About page</h1> 
<form action="private.php" method="post"> 
    Titel:<br /> 
    <input type="text" name="Titel" value="<?php echo $row["Titel"] ?>" maxlength="20" required /> 
    <br /><br /> 
    Content 1:<br /> 
    <textarea type="text" name="Content" required style="width:300px; height:200px;"; ><?php echo $row["Content1"] ?></textarea> 
    <br /><br /> 
	 Content 2:<br /> 
    <textarea type="text" name="Content" required style="width:300px; height:200px;"; ><?php echo $row["Content2"] ?></textarea> 
    <br /><br /> 
	 Content 3:<br /> 
    <textarea type="text" name="Content" required style="width:300px; height:200px;"; ><?php echo $row["Content3"] ?></textarea> 
    <br /><br /> 
    <input type="submit" value="Change" /> 
</form> 

</div>
</div>
</div>
<?php
	include 'Footer.php';
	?>
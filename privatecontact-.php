<?php
include 'sessiestart.php';
include 'cms/config.php';


//var
$Titel = $_POST['Titel'];
$Content = $_POST['Content'];

	if (isset($_POST['Titel'])){
         //$sql = "UPDATE Homecontent SET (Titel, Content) VALUES ('".$_POST['titel']."' , '".$_POST['content']."') WHERE ID = 1";
		 $sql = "UPDATE Contactcontent SET Titel = '$Titel' , Content = '$Content' WHERE ID = '1'";
         $db->query($sql);
		 header('location:privatecontact.php');
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
	<div class="homeback">
	<div class="paginainhoud">
	<div class="center">
<?php include 'menu_3.php' ?>


<?php $SQL = "SELECT * FROM Contactcontent WHERE ID=1";
$result = $db->query($SQL);
$row = $result->fetch_array();
?>


<h1>Contact page</h1> 
<form action="private.php" method="post"> 
    Titel:<br /> 
    <input type="text" name="Titel" value="<?php echo $row["Titel"] ?>" maxlength="20" required /> 
    <br /><br /> 
    Content:<br /> 
    <textarea type="text" name="Content" required style="width:300px; height:200px;"; ><?php echo $row["Content"] ?></textarea> 
    <br /><br /> 
    <input type="submit" value="Change" /> 
</form> 

</div>
</div>
</div>
<?php
	include 'Footer.php';
	?>
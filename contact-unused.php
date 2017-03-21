<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php 
    // Nessesary for a connection with the database and importing the text from the database
    require("common.php"); 
	include 'sessiestart.php';
include 'cms/config.php';
$SQL = "SELECT * FROM Contactcontent";
$result = $db->query($SQL);
$row = $result->fetch_array()
?> 

<html>
<head>
<meta charset="UTF-8">
    <title>Riley | Contact</title>
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
		<div class="contactleft">
			<h3> <?php echo $row["Titel"]; ?> </h3>
			<?php echo $row["Content"] ;?>
        </div>
			
	<div class="contactright">
			<?php
session_start(); // Mail for the reciever
$mail_ontv = 'royalsmiley@hotmail.com'; 

// Checks for the fields
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    if (empty($_POST['naam']))
        $naam_fout = 1;
    if (function_exists('filter_var') && !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
            $email_fout = 1;
		
    // anti-spam control
    if (!empty($_SESSION['antiflood']))
    {
        $seconde = 30; // 30 second before the same person can send another email
        $tijd = time() - $_SESSION['antiflood'];
        if($tijd < $seconde)
            $antiflood = 1;
    }
}

// Check if all fields are filled in
if (($_SERVER['REQUEST_METHOD'] == 'POST' && (!empty($antiflood) || empty($_POST['naam']) || !empty($naam_fout) || empty($_POST['mail']) || !empty($email_fout) || empty($_POST['bericht']) || empty($_POST['onderwerp']))) || $_SERVER['REQUEST_METHOD'] == 'GET')
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!empty($naam_fout))
            echo '<p>Name is required.</p>';
        elseif (!empty($email_fout))
            echo '<p>Email is required.</p>';
        elseif (!empty($antiflood))
            echo '<p>You may only send 1 email each ' . $seconde . ' seconds.</p>';
        else
            echo '<p>You have either forgot to fill in your name, email or a message.</p>';
    }
        
  // HTML e-mail form
  echo '<form method="post" action="' . $_SERVER['REQUEST_URI'] . '" />
  <p>
  
      <label for="naam">Name:</label><br />
      <input type="text" id="naam" name="naam" value="' . (isset($_POST['naam']) ? htmlspecialchars($_POST['naam']) : '') . '" /><br />
      
      <label for="mail">E-mail:</label><br />
      <input type="text" id="mail" name="mail" value="' . (isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '') . '" /><br />
      
      <label for="onderwerp">Subject:</label><br />
      <input type="text" id="onderwerp" name="onderwerp" value="' . (isset($_POST['onderwerp']) ? htmlspecialchars($_POST['onderwerp']) : '') . '" /><br />
      
      <label for="bericht">Message:</label><br />
      <textarea id="bericht" name="bericht" rows="8" style="width: 400px;">' . (isset($_POST['bericht']) ? htmlspecialchars($_POST['bericht']) : '') . '</textarea><br />
      
      <input type="submit" name="submit" value=" Send " />
  </p>
  </form>';
}
// send to
else
{      
  // set datum
  $datum = date('d/m/Y H:i:s');
    
  $inhoud_mail = "===================================================\n";
  $inhoud_mail .= "Ingevulde contact formulier " . $_SERVER['HTTP_HOST'] . "\n";
  $inhoud_mail .= "===================================================\n\n";
  
  $inhoud_mail .= "Naam: " . htmlspecialchars($_POST['naam']) . "\n";
  $inhoud_mail .= "E-mail adres: " . htmlspecialchars($_POST['mail']) . "\n";
  $inhoud_mail .= "Bericht:\n";
  $inhoud_mail .= htmlspecialchars($_POST['bericht']) . "\n\n";
    
  $inhoud_mail .= "Verstuurd op " . $datum . " via het IP adres " . $_SERVER['REMOTE_ADDR'] . "\n\n";
    
  $inhoud_mail .= "===================================================\n\n";

  
  if (mail($mail_ontv, $_POST['onderwerp'], $inhoud_mail, $headers))
  {
      
      
      echo '<h1>The email has been send</h1>
      
      <p>Thank you for sending me a message, I will reply as soon as possible.</p>';
  }
  else
  {
      echo '<h1>The email has <strong> not </strong> been send.</h1>
      
      <p><b>My sincerest apology</b></p>';
  }
}
?>
		</div>
	</div>
</div>
</div>

<?php
	include 'Footer.php';
	?>
<?php 

    require("common.php"); 

    $submitted_username = ''; 

    if(!empty($_POST)) 
    { 

        $query = " 
            SELECT 
                id, 
                username, 
                password, 
                salt, 
                email 
            FROM users 
            WHERE 
                username = :username 
        "; 

        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        {  
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
 
        $login_ok = false; 
         
     
        $row = $stmt->fetch(); 
        if($row) 
        { 
          
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
             
            if($check_password === $row['password']) 
            { 
              
                $login_ok = true; 
            } 
        } 
         
    
        if($login_ok) 
        { 
         
            unset($row['salt']); 
            unset($row['password']); 
             
    
            $_SESSION['user'] = $row; 
             
       
            header("Location: private.php"); 
            die("Redirecting to: private.php"); 
        } 
        else 
        { 
    
            print("Login Failed."); 
             
       
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
     
?> 
<html>
<head>
<meta charset="UTF-8">
    <title>Riley van de Wiel Register</title>
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
<div class="register">
<h1>Login</h1> 
<form action="private.php" method="post"> 
    Username:<br /> 
    <input type="text" name="username" value="<?php echo $submitted_username; ?>" /> 
    <br /><br /> 
    Password:<br /> 
    <input type="password" name="password" value="" /> 
    <br /><br /> 
    <input type="submit" value="Login" /> 
</form> 
<a href="register.php">Register</a>
</div>
</div>
</div>
<?php
	include 'Footer.php';
	?>




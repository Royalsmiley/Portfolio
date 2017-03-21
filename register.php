<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    // This if statement checks to determine whether the registration form has been submitted 
    if(!empty($_POST)) 
    { 
        // the user has entered a non-empty username 
        if(empty($_POST['username'])) 
        { 
            die("Please enter a username."); 
        } 
         
        // the user has entered a non-empty password 
        if(empty($_POST['password'])) 
        { 
            die("Please enter a password."); 
        } 
         
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 

        $query = " 
            SELECT 
                1 
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

        $row = $stmt->fetch(); 

        if($row) 
        { 
            die("This username is already in use"); 
        } 

        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email 
        "; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
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
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This email address is already registered"); 
        } 

        $query = " 
            INSERT INTO users ( 
                username, 
                password, 
                salt, 
                email 
            ) VALUES ( 
                :username, 
                :password, 
                :salt, 
                :email 
            ) 
        "; 
 
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
         
        $password = hash('sha256', $_POST['password'] . $salt); 
         
        for($round = 0; $round < 65536; $round++) 
        { 
            $password = hash('sha256', $password . $salt); 
        } 
 
        $query_params = array( 
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            // Execute the query to create the user 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        header("Location: index.php"); 

        die("Redirecting to index.php"); 
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
<h1>Register</h1> 
<form action="register.php" method="post"> 
    Username:<br /> 
    <input type="text" name="username" value="" /> 
    <br /><br /> 
    E-Mail:<br /> 
    <input type="text" name="email" value="" /> 
    <br /><br /> 
    Password:<br /> 
    <input type="password" name="password" value="" /> 
    <br /><br /> 
    <input type="submit" value="Register" /> 
</form>
</div>
</div>
</div>
<?php
	include 'Footer.php';
	?>
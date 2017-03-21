<?php

session_start();

if (isset($_POST["name"])){
$_SESSION["name"] = $_POST["name"];
$_SESSION["password"] = $_POST["password"];
$_SESSION["name"] = "Guest";
}


else if(isset($_SESSION["name"]) == FALSE){
$_SESSION["name"] = "Guest";
}

?>
<?php  

session_start();
//session
if (!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

?>
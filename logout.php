<?php  

if (isset($_POST['exit'])) {
	session_start();
	setcookie('username', false , time()-86400);
	session_unset();
	$_SESSION = [];
	session_destroy();
	header("Location: login.php");
	exit;	
}

?>
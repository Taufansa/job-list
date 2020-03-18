<?php  
require 'class.php';
require 'db.php';
if (isset($_POST['login'])) {
	$login = new login($_POST['username'],$_POST['password']);
	$login->password_check();
}
?>
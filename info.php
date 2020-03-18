<?php  
require 'class.php';
require 'db.php';
if (isset($_POST['regist'])) {
	$people = new employee($_POST['nip'],$_POST['nama'],$_POST['grade'],$_POST['dept'],$_POST['phone'],$_POST['username'],$_POST['password'],$_POST['password_confirm']);
	
	$check_username = $people->checkusername();
	if ($check_username == false) {
		echo "<script>alert('please use another username.');</script>";
		echo "<script>javascript:history.go(-1);</script>";
		die();
	}

	$check_pass = $people->checkpasswordregist();
	if ($check_pass == false){
		echo "<script>alert('password not matched!');</script>";
		echo "<script>javascript:history.go(-1);</script>";
		die();
	}
	$people->insertuser();
    header('Location: login.php');
}


?>

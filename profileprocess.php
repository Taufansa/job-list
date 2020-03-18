<?php 
require 'security.php';
require 'class.php';
require 'db.php';

if (isset($_POST['update'])) {
	$user = new employee($_POST['nip'],$_POST['name'],$_POST['grade'],$_POST['dept'],$_POST['phone'],$_POST['username'],'','');
	$user->updateemployee();
	echo "<script>alert('Profile updated!');</script>";
	header('Location:profile.php');
}

if (isset($_POST['leave'])) {
	if ($_POST['team'] == '') {
		echo "<script>alert('You don't have a team!');</script>";
	    echo "<script>javascript:history.go(-1);</script>";
	    die();
	} else {
		$team = new team('','','','','');
		$team->leaveteam($_COOKIE['username']);
		echo "<script>alert('You have leave your team!');</script>";
		header('Location:profile.php');
	}
	
}

 ?>
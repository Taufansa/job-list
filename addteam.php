<?php  
require 'security.php';
require 'class.php';
require 'db.php';
$username = $_COOKIE["username"];

if (isset($_POST['add'])) {
	$team = new team($_POST['name'],$_POST['info'],$_POST['secret'],$_POST['admin'],$_POST['time']);
	$data = $team->checkadmin($username);

	if ($data['team_admin'] != null)  {
		echo "<script>alert('You already have a team!');</script>";
		echo "<script>javascript:history.go(-1);</script>";
		die();
	} else {
		$team->newteam();
		header('Location:index.php');
	}
}

if (isset($_POST['join'])) {
	$team = new team($_POST['name'],'',$_POST['secret'],$_POST['member'],'');
	$data = $team->checkadmin($username);
	if ($data['team'] != null)  {
		echo "<script>alert('You already joined another team!');</script>";
		echo "<script>javascript:history.go(-1);</script>";
		die();
	} else {
		$team->secret_check();
		header('Location:index.php');
	}
	
	
}




?>
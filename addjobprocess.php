<?php  
require 'security.php';
require 'class.php';
require 'db.php';

if (isset($_POST['add'])) {
	$add = new job($_POST['type'],$_POST['title'],$_POST['info'],$_POST['handle'],$_POST['request'],$_POST['start'],$_POST['end'],$_POST['status'],'',$_POST['time'],$_POST['username']);

	$status = $add->datechecker();
	if ($status == false) {
		echo "<script>alert('End date can not be smaller than start date');</script>";
		echo "<script>javascript:history.go(-1);</script>";
		die();
	} else {
		$add->insertjob();
		header('Location:index.php');
	}
}

?>
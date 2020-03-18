<?php  
require 'security.php';
require 'class.php';
require 'db.php';

$people = new job($_POST['type'],$_POST['title'],$_POST['info'],$_POST['handle'],$_POST['request'],$_POST['start'],$_POST['end'],$_POST['status'],$_POST['number'],$_POST['time'],$_POST['username']);

if (isset($_POST['update'])) {
	
	if ($people->checkjob($_POST['number']) != $_COOKIE['username']) {
	    echo "<script>alert('You are not authorized to update this job!');</script>";
	    echo "<script>javascript:history.go(-2);</script>";
	    die();
	}

	$status = $people->datechecker();
	if ($status == false) {
		echo "<script>alert('End date can not be smaller than start date');</script>";
		echo "<script>javascript:history.go(-1);</script>";
		die();
	} else {
		$people->editdata();
		header('Location:index.php');
	}
}

if (isset($_POST['delete'])) {
	$people->deletejob($_POST['number']);
	header('Location:index.php');
}

?>
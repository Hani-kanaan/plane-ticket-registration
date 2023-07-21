<?php
	session_start();
	if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
		header("Location: login.php");
	} else {
		require_once('connect.php');
		
		extract ($_GET);
		
		$query = "UPDATE `seats` SET `flag`=0 ,`bookedby`= 'empty' WHERE `bookedby` = '{$_SESSION["uname"]}';" ;
		mysqli_query($con, $query);
	    mysqli_close($con);
		header("Location: seats.php");
	}
	?>
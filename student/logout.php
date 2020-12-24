<?php

	session_start();
	
	// if(isset($_SESSION['username'])){
		session_destroy();
	// }
	header('location:../login.php');

?>

<h1>heloooo..</h1>
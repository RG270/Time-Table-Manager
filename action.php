<?php

include 'db.php';

function ok($res = "Default Output"){
	exit(json_encode($res));
}

if(isset($_POST['login'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['login'];

	if(empty($username)){
		$err[] = "Username is Required";
	}

	if(empty($password)){
		$err[] = "Password is Required";
	}

	if(isset($err)){
		$errors = implode('<br>', $err);
		$output['type'] = 'error';
		$output['msg'] = $errors;
		ok($output);
	}

	//$password = md5($password);

	$sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' AND `type` = '$type'";

	$res = mysqli_query($db, $sql);

	if(mysqli_affected_rows($db) > 0){

		$user = mysqli_fetch_assoc($res);

		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['type'] = $type;

		$output['login_type'] = 'success';

		if($type == 'admin'){
			$output['url'] = 'admin/administrator.php';}
		if($type == 'student'){
			$output['url'] = 'student/student.php';
		}

		$output['msg'] = "Welcome ".$user['name'];
		ok($output);

	}else{

		$output['type'] = 'error';
		$output['msg'] = "Invalid Username or Password.";
		ok($output);
	}
}

?>
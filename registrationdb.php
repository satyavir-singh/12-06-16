<?php
	require_once("config.php");
	session_start();
	$username =  $_POST['username'];
	$password =  $_POST['password'];
	$emailid =  $_POST['emailid'];

	$password =  md5($password);


	$_SESSION['username'] = $username;
	
	
    mysqli_select_db($con,"web");

	$query= " INSERT INTO cust_registration (c_username,c_email,c_password)  VALUES ('$username','$emailid','$password') ";

    $result=mysqli_query($con,$query);


	if ($result) {
			
		header('Location: login_dashboard.php');
	}

	else{
	 echo "In Valid!";

	}



?>
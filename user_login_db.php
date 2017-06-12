<?php
	require_once("config.php");
	session_start();
	$username =  $_POST['username'];
	$password =  $_POST['password'];

	


	$_SESSION['username'] = $username;
	
	
    mysqli_select_db($con,"web");


	$query="SELECT * FROM cust_registration WHERE c_username ='$username' and c_password ='".md5($password)."'";
		$result = mysqli_query($con,$query);

		

		$rows = mysqli_num_rows($result); 

		if ($rows == 1) {
			
			header("Location: login_dashboard.php");
		}

		else{
		 echo "In Valid!";

		}



?>
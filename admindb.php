<?php
	require_once("config.php");
	session_start();
	$admin_name =  $_POST['admin_name'];
	$admin_password =  $_POST['admin_password'];

	


	$_SESSION['username'] = $username;
	
	
    mysqli_select_db($con,"web");


	 $query="SELECT * FROM admin WHERE admin_name ='$admin_name' and admin_password ='$admin_password'";
		$result = mysqli_query($con,$query);
		$rows = mysqli_num_rows($result); 
		
		if ($rows == 1) {

			$rows1=mysqli_fetch_assoc($result);
		
			$_SESSION['admin_name'] = $rows1['admin_name'];
			
			header("Location: admin_dashboard.php");
		}

		else{
		 echo "In Valid!";

		}



?>
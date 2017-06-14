<?php
	session_start();

    $emailid=$_SESSION['emailid'];
    require_once("config.php");

	  	
	/*$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);*/

	$c_id=$_POST['c_id'];
	$c_firstname=$_POST['c_firstname'];
	$c_lastname=$_POST['c_lastname'];
	$c_dob=$_POST['c_dob'];
	$c_mobile=$_POST['c_mobile'];
	$c_email=$_POST['c_email'];
	$b_streetname=$_POST['b_streetname'];
	$b_state=$_POST['b_state'];
	$b_city=$_POST['b_city'];
	$b_zipcode=$_POST['b_zipcode'];
	$b_landmark=$_POST['b_landmark'];




	mysqli_select_db($con,"web");

	$query= " INSERT INTO cust_details 
	(c_id,c_firstname,c_lastname,c_dob,c_mobile,c_email,b_streetname,b_state,b_city,b_zipcode,b_landmark)  
	VALUES 
	('$c_id','$c_firstname','$c_lastname','$c_dob','$c_mobile','$c_email','$b_streetname','$b_state','$b_city','$b_zipcode','$b _landmark') ";

    $result=mysqli_query($con,$query);


	if ($result) {
			
		header('Location: login_dashboard.php');
	}

	else{
	 echo "In Valid!";

	}


 ?>


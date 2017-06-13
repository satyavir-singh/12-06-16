<?php
	session_start();
    
    require_once("config.php");
	$cat_id=$_POST['cat_id'];
	$p_id=$_POST['p_id'];
	$emailid=$_SESSION['emailid'];
	$quantity=$_POST['quantity'];
	

    mysqli_select_db($con,"web");

    if($emailid)
    {
    	$query="SELECT * FROM cart_id where emailid='".$emailid."'";    	
		 $result=mysqli_query($con,$query);
			$row=mysqli_fetch_assoc($result);
			
		
		$count=mysqli_num_rows($result);
		if($count >= 0 )
		{
			$query= "INSERT INTO cart_id (emailid)  VALUES ('$emailid') ";
            $result=mysqli_query($con,$query);
            if($result)
            {

            			$query="SELECT * FROM cart_id where emailid='".$emailid."'";   
            	        $result=mysqli_query($con,$query);
						$row=mysqli_fetch_assoc($result);
           
    		
			$query1=  "INSERT INTO cart (cart_id,p_id,emailid,quantity)  VALUES ('".$row['cart_id']."','$p_id','$emailid','$quantity') ";

    		$result1=mysqli_query($con,$query1); 
			}

		}
		else
		{
			   

$query= "INSERT INTO cart (cart_id,p_id,emailid,quantity)  VALUES ('".$row['cart_id']."','$p_id','$emailid','$quantity') ";
   			//$result=mysqli_query($con,$query);

   			$result = mysqli_query($con,$query);

    		
					
		}

    }



?>
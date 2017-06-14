<?php
	session_start();

    $emailid=$_SESSION['emailid'];
    $cart_id=$_GET['cart_id'];
    //$quantity=$_POST['quantity'];
    $tracking_number=rand(100000,999999);
    $grand_total=$_GET['grand_total'];
	
	require_once("config.php");
	if(!array_key_exists('username', $_SESSION))
	{
		header('Location: start.php');
	}

	mysqli_select_db($con,"web");

	
	$query= "INSERT INTO orders (c_email,tracking_number,grand_total)  VALUES ('$emailid','$tracking_number','$grand_total') ";
    $result=mysqli_query($con,$query);

   
    if($result)
    {
    	$query1="SELECT * FROM orders where c_email='".$emailid."'";    	
		$result1=mysqli_query($con,$query1);
		$row1=mysqli_fetch_assoc($result1);

		$query2="SELECT * FROM cart where cart_id='".$cart_id."'and emailid='".$emailid."'";    	
		$result2=mysqli_query($con,$query2);
		//$row2=mysqli_fetch_assoc($result2);
		//print_r($row2);
		//$count=mysqli_num_rows($result2);
		while($row2=mysqli_fetch_assoc($result2))
		{
	
		$query3=  "INSERT INTO orders_products (order_id,p_id)  VALUES ('".$row1['order_id']."','".$row2['p_id']."') ";

    		$result3=mysqli_query($con,$query3); 

	    	if(result3)
	    	{
	    		$result = mysqli_query($con, "DELETE FROM cart WHERE cart_id='".$cart_id."'");

	    	}
    	}
	}

?>
<!DOCTYPE html>
<html>
<head>
	
	<script src="https://code.jquery.com/jquery-3.2.1.js"
			  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			  crossorigin="anonymous">	  	
	</script>
	
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<style type="text/css">
		div{
			  display:inline-block;
			  padding:0px;
			  margin:0px;
			}

			body{
			   padding:0px;
			   margin:0px;
			}
	</style>




	<style>
		.dropbtn {
		    background-color: #4CAF50;
		    color: black;
		    padding: 12px;
		    font-size: 12px;
		    border: none;
		    cursor: pointer;
		}

		.dropdown {
		    position: relative;
		    display: inline-block;
		}

		.dropdown-content {
		    display: none;
		    position: absolute;
		    background-color: #f9f9f9;
		    min-width: 160px;
		    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		    z-index: 1;
		}

		.dropdown-content a {
		    color: black;
		    padding: 12px 16px;
		    text-decoration: none;
		    display: block;
		}

		.dropdown-content a:hover {background-color: #f1f1f1}

		.dropdown:hover .dropdown-content {
		    display: block;
		}

		.dropdown:hover .dropbtn {
		    background-color: #3e8e41;
		}
	</style>



	<style>
		.button:link, .button:visited {
			  display: block;
			  width: 10em;  
			  padding: 0.2em;
			  line-height: 1.4;
			  background-color: #4CAF50;
			  border: 1px solid black;
			  color: #000;
			  text-decoration: none;
			  text-align: center;
			}

		.button:hover {
			 background-color: #369;
			 color: #fff;
		}

	</style>

</head>
<body>
		<div class="header" style="height:100px;width:100%;background-color: #0094ff;margin:0;">

		<div style="float: left;width: 1070px;margin-left: 15px;">

			<h2><i class="fa fa-snowflake-o" aria-hidden="true"></i>&nbsp;KhaRidlo</h2>

		</div>

		<div style="float: left;padding-top: 4px;width: 100px;">
			<table>
				<tr><td><i class="fa fa-user-circle" aria-hidden="true">&nbsp;<?php echo $_SESSION['username']; ?></td>
</i>
				<td><div class="dropdown">
					  <button class="dropbtn">ACCOUNT</button>
					  <div class="dropdown-content">
					  	<a href="detail.php">DETAIL</a>
					    <a href="">SETTING</a>
					    <a href="logout.php">LOGOUT</a>
					  </div>
					</div>
				</td>
				</tr><br>
			</table>
		</div>

		<div style="width:100%;margin-left:30%;">

			<div style="float:left;margin-right: 285px;">
			
			<input type="text" name="search" id="search" class="search"  placeholder="search" style="width: 400px;" >
			</div>
		</div>

		<div>
			<h1>Successfully order place and your tracking address : 
			<?php echo $tracking_number ;?>
				</h1>
		</div>






</body>
</html>

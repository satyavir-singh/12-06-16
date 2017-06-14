<?php
	session_start();
	$cart_id=$_GET['cart_id'];
    $emailid=$_SESSION['emailid'];
	require_once("config.php");
//print_r($_SESSION);
if(!array_key_exists('username', $_SESSION))
{
	header('Location: start.php');
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



		<div class="section">
			<div style="float: left; width: 800px;">
				<fieldset>
					<legend><i class="fa fa-address-book" aria-hidden="true"></i>&nbsp;DELIVERY ADDRESS</legend>
					<table>
				
				<?php

					$query="SELECT * FROM cust_details where c_email='".$emailid."'";    	
					$result=mysqli_query($con,$query);
					$row =mysqli_fetch_assoc($result);


				?>
					
					<tr>
						<td>FIRST NAME</td>
						<td><input type="text" name="c_firstname" id="c_firstname" value="<?php echo $row['c_firstname']; ?>" readonly></td>
					</tr>
					<tr>
						<td>LAST NAME</td>
						<td><input type="text" name="c_lastname" id="c_lastname" value="<?php echo $row['c_lastname']; ?>" readonly></td>
					</tr>
					
					<tr>
						<td>MOBILE NO 
						<td><input type="text" name="c_mobile" id="c_mobile" value="<?php echo $row['c_mobile']; ?>" readonly></td>
					</tr>
					<tr>
						<td>EMAIL</td>
						<td><input type="email" name="c_email" id="c_email" value="<?php echo  $emailid; ?>" readonly></td>
					</tr>
					<tr>
						<td colspan="2"><i class="fa fa-address-card" aria-hidden="true"></i>
 &nbsp; ADDRESS</td>
					</tr>
					<tr>
						<td>STREET NAME</td>
						<td><input type="text" name="b_streetname" id="b_streetname" value="<?php echo $row['b_streetname']; ?>" readonly></td></td>
					</tr>
					<tr>
						<td>STATE</td>
						<td><input type="text" name="b_state" id="b_state" value="<?php echo $row['b_state']; ?>" readonly></td>
					</tr>
					<tr>
						<td>CITY</td>
						<td><input type="text" name="b_city" id="b_city" value="<?php echo $row['b_city']; ?>" readonly></td>
					</tr>
					<tr>
						<td>ZIPCODE</td>
						<td><input type="postcode" name="b_zipcode" id="b_zipcode" value="<?php echo $row['b_zipcode']; ?>" readonly></td>
					</tr>
				
					<tr>
						<td>LANDMARK</td>
						<td><input type="text" name="b_landmark" id="b_landmark" value="<?php echo $row['b_landmark']; ?>" readonly></td>
					</tr>
				</table>
				</fieldset>
			</div>


			<?php

					$query1="SELECT count(cart_id) FROM cart WHERE cart_id='".$cart_id."'";    	
					$result1=mysqli_query($con,$query1);
					$row1 =mysqli_fetch_assoc($result1);


				?>


			<?php

					//$query2="SELECT sum(cart_id) FROM cart WHERE cart_id='".$cart_id."'";    	
					$query2="SELECT sum(p_price) FROM product a JOIN cart b on 
							a.p_id=b.p_id where b.cart_id='".$cart_id."'";
					$result2=mysqli_query($con,$query2);
					$row2=mysqli_fetch_assoc($result2);


				?>

			

			<div style="float: left;width:470px;margin-left: 20px;">
				<div style="float: left;"">
				<fieldset>
					<legend><i class="fa fa-money" aria-hidden="true"></i>&nbsp;PRICE DETAIL</legend>
					<table>
						<tr>
							<td>Total Product</td>
							<td><?php echo $row1['count(cart_id)']; ?></td>
						</tr>
						<tr>
							<td>Total Price</td>
							<td><i class="fa fa-inr" aria-hidden="true"></i>
								<?php echo $row2['sum(p_price)']; ?></td>
						</tr>
						
					</table>
				</fieldset>
				</div>
				<br>



				<div style="width:40px;margin-left: 20px;">
					<a href="orderdb.php?cart_id=<?php echo $cart_id; ?>&grand_total=<?php echo $row2['sum(p_price)']; ?>" class="button">Payment </a>
				</div>








			</div>
			
		</div>
		
	</div>






</body>
</html>

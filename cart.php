<?php
	session_start();

    $emailid=$_SESSION['emailid'];
    require_once("config.php");

	$query="SELECT * FROM cart_id where emailid='".$emailid."'";    	
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);



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
					  	<a href="">DETAIL</a>
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
			
			<div style="float:left;">
			<a href="cart.php" class="button"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>&nbsp;CART</a>
			</div>
			
		</div>
		
	</div>



	<div class="section">
		<h1>MY CART</h1>
		<table>
			<tr>
				<td>

					<?php

						$query1="SELECT * FROM product a JOIN cart b on 
							a.p_id=b.p_id where b.emailid='".$emailid."' and b.cart_id='".$row['cart_id']."'";
							$result1=mysqli_query($con,$query1);
						while($row1=mysqli_fetch_assoc($result1))
						{


					?>
					<div>
						<div style="float: left;width:300px;">
							<img src="<?php echo $row1['image']; ?>" width="150px" style="margin-left: 70px">
						</div>
						<div style="float: left;">
							<?php echo $row1['p_name']; ?><br><br>
							<i class="fa fa-inr" aria-hidden="true"></i><?php echo $row1['p_price']; ?><br><br>
							<input type="number" name="quantity" id="quantity" min="1" value="<?php echo $row1['quantity']; ?>" max="10"><br><br>

							<a href="" class="button">REMOVE</a>
						</div>
					
					</div>

					<div style="width: 1200px;">
						<div style="float: left;margin-left:300px;margin-right: 50px;">
							<a href="" class="button">Continue Shopping</a>
						</div>
						<div style="float: left;">
							<a href="" class="button">Place Order</a>
						</div>
					</div>
					<?php

						}
				?>
				</td>
			</tr>
		</table>
	</div>


</body>
 </html>
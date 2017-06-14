<?php
	session_start();

    $emailid=$_SESSION['emailid'];
    require_once("config.php");

	$query="SELECT * FROM cust_registration where c_email='".$emailid."'";    	
	$result=mysqli_query($con,$query);
	$row =mysqli_fetch_assoc($result);



 ?>


 <!DOCTYPE html>
 <html>
 <head>
	
	<script src="https://code.jquery.com/jquery-3.2.1.js"
			  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			  crossorigin="anonymous">	  	
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script>

		$(document).ready(function(){

		

			$(".edit").click(function(){
				$(".div2").show();
				$(".div1").hide();
			});

		});



		
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
	<div style="width: 1200px;">
		<div style="float:right;margin-right: 300px;">
		<input type="submit" class="edit" value="EDIT">
		</div>
	</div>
	<div style="margin-left: 150px;margin-top: 50px; " class="div1">
		<form tag="Create Logon" method="POST" action="detaildb.php">
				
				<table>
				<?php

					$query1="SELECT * FROM cust_details where c_id='".$row['c_id']."'";    	
					$result1=mysqli_query($con,$query1);
					$row1 =mysqli_fetch_assoc($result1);


				?>
					
					<tr>
						<td>FIRST NAME</td>
						<td><input type="text" name="c_firstname" id="c_firstname" value="<?php echo $row1['c_firstname']; ?>" readonly></td>
					</tr>
					<tr>
						<td>LAST NAME</td>
						<td><input type="text" name="c_lastname" id="c_lastname" value="<?php echo $row1['c_lastname']; ?>" readonly></td>
					</tr>
					<tr>
						<td>USERNAME </td>
						<td><input type="text" name="c_username" id="c_username" value="<?php echo $row['c_username']; ?>" readonly></td>
					</tr>
					<tr>
						<td>Date of Birth 
						<td><input type="date of birth" name="c_dob" id="c_dob" value="<?php echo $row1['c_dob']; ?>" readonly>*</td>
					</tr>
					<tr>
						<td>MOBILE NO 
						<td><input type="text" name="c_mobile" id="c_mobile" value="<?php echo $row1['c_mobile']; ?>" readonly></td>
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
						<td><input type="text" name="b_streetname" id="b_streetname" value="<?php echo $row1['b_streetname']; ?>" readonly></td></td>
					</tr>
					<tr>
						<td>STATE</td>
						<td><input type="text" name="b_state" id="b_state" value="<?php echo $row1['b_state']; ?>" readonly></td>
					</tr>
					<tr>
						<td>CITY</td>
						<td><input type="text" name="b_city" id="b_city" value="<?php echo $row1['b_city']; ?>" readonly></td>
					</tr>
					<tr>
						<td>ZIPCODE</td>
						<td><input type="postcode" name="b_zipcode" id="b_zipcode" value="<?php echo $row1['b_zipcode']; ?>" readonly>*</td>
					</tr>
				
					<tr>
						<td>LANDMARK</td>
						<td><input type="text" name="b_landmark" id="b_landmark" value="<?php echo $row1['b_landmark']; ?>" readonly></td>
					</tr>
				</table>
				
			</form>
			</div>








			<div style="display:none;margin-left: 150px;margin-top: 50px; " class="div2">
		<form tag="Create Logon" method="POST" action="detaildb.php">
				
				<table>
					<input type="hidden" name="c_id" id="c_id" value="<?php echo $row['c_id']; ?>">
					<tr>
						<td>FIRST NAME</td>
						<td><input type="text" name="c_firstname" id="c_firstname" value="<?php echo $row1['c_firstname']; ?>" required></td>
					</tr>
					<tr>
						<td>LAST NAME</td>
						<td><input type="text" name="c_lastname" id="c_lastname" value="<?php echo $row1['c_lastname']; ?>" required></td>
					</tr>
					<tr>
						<td>USERNAME </td>
						<td><input type="text" name="c_username" id="c_username" value="<?php echo $row['c_username']; ?>" readonly></td>
					</tr>
					<tr>
						<td>Date of Birth 
						<td><input type="date of birth" name="c_dob" id="c_dob" value="<?php echo $row1['c_dob']; ?>" required>*</td>
					</tr>
					<tr>
						<td>MOBILE NO 
						<td><input type="text" name="c_mobile" id="c_mobile" value="<?php echo $row1['c_mobile']; ?>" required></td>
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
						<td><input type="text" name="b_streetname" id="b_streetname" value="<?php echo $row1['b_streetname']; ?>" required></td></td>
					</tr>
					<tr>
						<td>STATE</td>
						<td><input type="text" name="b_state" id="b_state" value="<?php echo $row1['b_state']; ?>" required></td>
					</tr>
					<tr>
						<td>CITY</td>
						<td><input type="text" name="b_city" id="b_city" value="<?php echo $row1['b_city']; ?>" required></td>
					</tr>
					<tr>
						<td>ZIPCODE</td>
						<td><input type="postcode" name="b_zipcode" id="b_zipcode" value="<?php echo $row1['b_zipcode']; ?>" required>*</td>
					</tr>
				
					<tr>
						<td>LANDMARK</td>
						<td><input type="text" name="b_landmark" id="b_landmark" value="<?php echo $row1['b_landmark']; ?>" required></td>
					</tr>
				
		 			<tr>
		 				<td><input type="submit" value="Submit" /></td>
		 				<td></td>
		 			</tr>
				
				</table>
				
			</form>
			</div>



	</div>


</body>
</html>
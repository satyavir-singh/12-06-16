<?php
	session_start();
	require_once("config.php");
	$cat_id=$_GET['cat_id'];
	$sub_category_id=$_GET['sub_category_id'];
	$p_id=$_GET['p_id'];

	if(array_key_exists('emailid', $_SESSION))
	{
		$emailid=$_SESSION['emailid'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.2.1.js"
			  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			  crossorigin="anonymous">	  	
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	
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
			
			<div style="float:left;">
			<a href="cart.php" class="button"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>&nbsp;CART</a>
			</div>
			
		</div>
		
	</div>



	<div class="section" style="background-color: white;">

		<div class="left_section" style="float:left;width: 100px;height: 100%;background-color: lightblue;margin-right: 100px;">

			<?php
				
					$query="SELECT * FROM category_id";
					$result = mysqli_query($con,$query);

					while($row=mysqli_fetch_assoc($result))
					{
					?>
						<tr>
						<td>
							<a href="category.php?cat_id=<?php echo $row['cat_id']; ?>" class="button">
									<?php echo $row['category_name'] ?>

									
							</a>
						</td>
						</tr>
									
						<?php
						}
						?>
		</div>





		<div class="right_section" style="float:left;margin-left: 50px;">


			<?php
				
					$query="SELECT * FROM category_id where cat_id=$cat_id";
					$result = mysqli_query($con,$query);

					$row=mysqli_fetch_assoc($result);
					
			?>
			<button style="background-color: #0094ff"><?php echo $row['category_name']; ?></button><br>
			
			<?php
				
					$query1="SELECT * FROM sub_category where sub_category_id=$sub_category_id";
					$result1 = mysqli_query($con,$query1);

					$row1=mysqli_fetch_assoc($result1);

			?>
			<i class="fa fa-caret-square-o-right" aria-hidden="true"></i><button style="background-color: #0094ff"><?php echo $row1['sub_category_name']; ?></button><br>



			<?php
				
					$query="SELECT * FROM product where p_id=$p_id";
					$result = mysqli_query($con,$query);

					$row=mysqli_fetch_assoc($result);
			?>
			<br>	
					<div class="product">
						
						<div style="float:left;margin-left: 50px;">
							
								<img src="<?php echo $row['image']; ?>" width="150px" style="margin-left: 70px"><br>
								<div>
									<div style="float:left;margin-right:5px;">
									<button type="submit" class="add_cart" ><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>&nbsp;
									ADD To CART</button>
									</div>
									<div style="float:left;"><button type="submit" class="buy_now" ><i class="fa fa-bolt" aria-hidden="true"></i>
									BUY NOW</button>
								</div>

								</div>
						</div>

						<div style="float:left;margin-left: 50px;">
							<table>
								<tr>
								<td>Product Name:</td>
								<td><?php echo $row['p_name']; ?></td>
								</tr>

								<tr>
								<td>Product Description:</td>
								<td><?php echo $row['p_desc']; ?></td>
								</tr>

								<tr>
									<td>
										Quantity:
									</td>
									<td>
										<input type="number" name="quantity" id="quantity" min="1" value="1" max="10">
									</td>
								</tr>


								<tr>
								<td>Product Price:</td>
								<td><i class="fa fa-inr" aria-hidden="true"></i>
								<?php echo $row['p_price']; ?>
								</td>
								</tr>

							</table>
								

									
						</div>
					</div>


							
						
			

		</div>

		<h3 class="ajax_div"></h3>


	</div>




	

</body>

<script>
		
	$(".add_cart").click(function(){

		var quantity=$("#quantity").val();
		var p_id=<?php echo $p_id; ?>;
		var cat_id=<?php echo $cat_id; ?>;
		//var emailid="<?php echo $emailid; ?>";


		$.ajax({
			url:'cartdb.php',
			type :'POST',
			data:{p_id:p_id,cat_id:cat_id,quantity:quantity},			
			success: function(html){
				$(".ajax_div").html(html);
			},
			error: function(){
				alert("error");
			}
		});
	});

	</script>


</html>




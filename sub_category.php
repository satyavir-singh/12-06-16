<?php
	session_start();
	require_once("config.php");
	$cat_id=$_GET['cat_id'];
	$sub_category_id=$_GET['sub_category_id'];
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

		<div style="float: left;width: 1100px;margin-left: 15px;">

			<h2><i class="fa fa-snowflake-o" aria-hidden="true"></i>&nbsp;KhaRidlo</h2>

		</div>

		<div style="float: left;padding-top: 4px;width: 100px;">
			<table>
				<tr><td><i class="fa fa-user-circle" aria-hidden="true">&nbsp;<?php echo $_SESSION['username']; ?></td>
				<td><div class="dropdown">
					  <button class="dropbtn">ACCOUNT</button>
					  <div class="dropdown-content">
					  	<a href="detail.php">DETAIL</a>
					    <a href="#">SETTING</a>
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

	<div class="section" >

		<div class="top_section" style="width: 1200px;height: 100%;margin-right: 120px;">


		<table>
			<tr>
				<?php
				
				$query="SELECT * FROM category_id";
				$result = mysqli_query($con,$query);

				while($row=mysqli_fetch_assoc($result))
					{
				?>
					
			<div style="float: left;width: 100px;">
			

				<td>
				<div class="dropdown">
					  <button class="dropbtn"><a href="category.php?cat_id=<?php echo $row['cat_id']; ?>" class="button" style="background-color: #0094ff">
								
										
								<?php echo $row['category_name'] ?>

							</a></button>
					 <div class="dropdown-content">
					  	
					<a href="category.php?cat_id=<?php echo $row['cat_id']; ?>" class="button">
					<?php echo $row['category_name'] ?>
							</a>

					<?php

					$query1="SELECT * FROM sub_category_id where cat_id=".$row['cat_id'];
					$result1 = mysqli_query($con,$query1);

					while($row1=mysqli_fetch_assoc($result1))
					{
			
					?>
						<a href="sub_category.php?cat_id=<?php echo $row1['cat_id']; ?>
						&sub_category_id=<?php echo $row1['sub_category_id']; ?>
						" style="background-color: #0094ff"  >
								<?php echo $row1['sub_category_name']; ?></a>

						<!-- <a  style="background-color: #0094ff" href="sub_category.php?cat_id=<?php echo $row1['cat_id']; ?>&
							sub_category_id=<?php echo $row1['sub_category_id']; ?>">
							<?php echo $row1['category_name'] ?></a> -->
					<?php
						}
					?>


					 </div>

				</div>

				</td>
				
				
			</div>


			<?php
						}
		?>
			</tr>
		</table>						
		</div>


		<div class="right_section" style="width:1200px;">
			<?php
				
					$query="SELECT * FROM category_id where cat_id=$cat_id";
					$result = mysqli_query($con,$query);
					if($result)
					while($row=mysqli_fetch_assoc($result))
					{
						
						 
			?>
						<tr>
						<td>
								<button style="background-color: #0094ff"><?php echo $row['category_name']; ?></button>
							
						</td>
						</tr>

						<tr>
						<td>

						<?php
				
							$query1="SELECT * FROM sub_category_id a JOIN category_id b on 
							a.cat_id=b.cat_id where a.cat_id='".$cat_id."'and a.sub_category_id='".$sub_category_id."'";



									$result1 = mysqli_query($con,$query1);

									while($row1=mysqli_fetch_assoc($result1))
									{
							?>
										
												<a href="sub_category.php?cat_id=<?php echo $row1['cat_id']; ?>&sub_category_id=<?php echo $row1['sub_category_id']; ?>" style="background-color: #0094ff" class="button">
													<?php echo $row1['sub_category_name'] ?>
												</a>
											
										


										<?php
								
										$query2="SELECT * FROM sub_category a JOIN product b on 
											a.p_id=b.p_id where a.cat_id='".$cat_id."' and a.sub_category_id='".$row1['sub_category_id']."' ";



													$result2 = mysqli_query($con,$query2);
													if($result2)
													while($row2=mysqli_fetch_assoc($result2))
													{
											?>
										<div>		
										<a href="product.php?cat_id=<?php echo $row['cat_id']; ?>&
											sub_category_id=<?php echo $row1['sub_category_id']; ?>&
										p_id=<?php echo $row2['p_id']; ?>" class="button">
																
														<image width="160px" height="100px" src="<?php echo $row2['image'] ?>"></image>
															
															
														<?php echo $row2['p_name'] ?>
														</a>
													</div>		
														
														

										<?php
													}
										?>

					</td>
					</tr></table>
													
					<?php
								}
					?>

					
			<?php
					}
			?>			




			
		</div>
		
		

	</div>




</body>
</html>

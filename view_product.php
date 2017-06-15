<?php
	session_start();
	require_once("config.php");
	$cat_id=$_GET['cat_id'];
	$sub_category_id=$_GET['sub_category_id'];
	$p_id=$_GET['p_id'];


	if(!array_key_exists('admin_name', $_SESSION))
	{
		header('Location: start.php');
	}
?>

<!DOCTYPE html>
<html>
<head>

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




<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css
"></script>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"
			  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			  crossorigin="anonymous">	  	
	</script>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script> -->
          
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<!-- <style type="text/css">
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
 -->


	



</head>
<body>
	<div class="header" style="height:100px;width:100%;background-color: #0094ff;margin:0;">

		<div style="float: left;width: 1070px;margin-left: 15px;">

			<h2><i class="fa fa-snowflake-o" aria-hidden="true"></i>&nbsp;KhaRidlo</h2>

		</div>

		<div style="float: left;padding-top: 4px;width: 100px;">
		<br>
			<table class="table">
				<tr><td><i class="fa fa-user-circle" aria-hidden="true">&nbsp;<?php echo $_SESSION['admin_name']; ?></td>
</i>
					<td>
						<div class="dropdown">
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
	</div>


		<div class="section" style="background-color: white;">

	




		<div class="first_section" style="float:left;margin-left: 50px;">


			<?php
				
					$query="SELECT * FROM category_id where cat_id=$cat_id";
					$result = mysqli_query($con,$query);

					$row=mysqli_fetch_assoc($result);
					
			?>
			<button style="background-color: #0094ff"><?php echo $row['category_name']; ?></button><br>
			
			<?php
				
					$query1="SELECT * FROM sub_category where sub_category_id='".$sub_category_id."'";
					$result1 = mysqli_query($con,$query1);
					$row1=mysqli_fetch_assoc($result1);

			?>
			<i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
			<button style="background-color: #0094ff"><?php echo $row1['sub_category_name']; ?></button><br>



			<?php
				
					$query2="SELECT * FROM product where p_id=$p_id";
					$result2 = mysqli_query($con,$query2);

					$row2=mysqli_fetch_assoc($result2);
			?>
			<br>	
					<div class="product">
						
						<div style="float:left;margin-left: 50px;">
							
								<img src="<?php echo $row2['image']; ?>" width="150px" style="margin-left: 70px"><br>
								

								</div>
						</div>

						<div style="float:left;margin-left: 50px;">
							<table>
								<tr>
								<td>Product Name:</td>
								<td><?php echo $row2['p_name']; ?></td>
								</tr>

								<tr>
								<td>Product Description:</td>
								<td><?php echo $row2['p_desc']; ?></td>
								</tr>

								<tr>
									<td>
										Quantity:
									</td>
									<td>
										<?php echo $row2['p_stock']; ?>
									</td>
								</tr>


								<tr>
								<td>Product Price:</td>
								<td><i class="fa fa-inr" aria-hidden="true"></i>
								<?php echo $row2['p_price']; ?>
								</td>
								</tr>

							</table>
								

									
						</div>
					</div>


							
						
			

		</div>

		<h3 class="ajax_div"></h3>


	</div>




	

</body>
</html>



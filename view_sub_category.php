<?php
	session_start();
	require_once("config.php");
	$cat_id=$_GET['cat_id'];
	$sub_category_id=$_GET['sub_category_id'];

	if(!array_key_exists('admin_name', $_SESSION))
	{
		header('Location: start.php');
	}


	if( isset($_POST['p_name']) )
	{
	$cat_id=$_POST["cat_id"];
	$sub_category_id=$_POST["sub_category_id"];

	$category_name=$_POST["category_name"];
	$sub_category_name=$_POST["sub_category_name"];
	

	$p_name=$_POST["p_name"];
	$p_price=$_POST["p_price"];
	//$image=$_POST["image"];
	$p_meta_title=$_POST["p_meta_title"];
	$p_meta_keyword=$_POST["p_meta_keyword"];
	$p_meta_desc=$_POST["p_meta_desc"];
	$p_stock=$_POST["p_stock"];
	$p_status=$_POST["p_status"];
			
	
	$query= " INSERT INTO product (p_name,p_price,p_meta_title,
	p_meta_keyword,p_meta_desc,
	p_stock,p_status)  VALUES 
	('$p_name','$p_price','$p_meta_title','$p_meta_keyword','$p_meta_desc','$p_stock','$p_status') ";
	$result=mysqli_query($con,$query);


	$query3="select * from product where p_name='$p_name'";
	$result3=mysqli_query($con,$query3);
	$row=mysqli_fetch_assoc($result3);

	$query1= " INSERT INTO sub_category (sub_category_id,cat_id,p_id,sub_category_name,)  VALUES ('$sub_category_name','$cat_id','','$sub_category_name') ";

	$result1=mysqli_query($con,$query1);

	$query2= " INSERT INTO category (p_id,cat_id,sub_category_id,,sub_category_name,)  VALUES ('$sub_category_name','$cat_id') ";

	$result2=mysqli_query($con,$query2);

	if ($result  ) 
	
	{
		header("Location: view_sub_category.php?cat_id=$cat_id&sub_category_id=$sub_category_id");
	}
}
?>



<!DOCTYPE html>
<html>
<head>
<script
			  src="https://code.jquery.com/jquery-3.2.1.js"
			  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			  crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
	$(".product").click(function(){
		$(".div2").show();
		$(".div1").hide();
		$(".div3").hide();
	});
});
</script>

          
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">



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

	
</head>
<body>
	<div class="header" style="height:100px;width:100%;background-color: #0094ff;margin:0;">

		<div style="float: left;width: 1070px;margin-left: 15px;">

			<h2><i class="fa fa-snowflake-o" aria-hidden="true"></i>&nbsp;KhaRidlo</h2>

		</div>

		<div style="float: left;padding-top: 4px;width: 100px;">
		<br>
			<table>
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





		<div class="section">

				<div class="div1">
				<button type="submit" class="product">ADD-Product</button>
				</div>

				<?php


					$query="select * from category_id where cat_id=$cat_id";
					$result=mysqli_query($con,$query);
					$row=mysqli_fetch_assoc($result);


					$query1="select * from sub_category where sub_category_id=$sub_category_id";
					$result1=mysqli_query($con,$query1);
					$row1=mysqli_fetch_assoc($result1);

				?>



				<div class="div2" style="display: none;">
				<br>
				<form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
				<table>
				<tr>
					<input type="hidden" name="cat_id" id="cat_id" value="<?php echo $cat_id; ?>">
					<input type="hidden" name="category_name" id="category_name" value="<?php echo $row['category_name']; ?>">

					<input type="hidden" name="sub_category_id" id="sub_category_id" value="<?php echo $sub_category_id; ?>">
					<input type="hidden" name="sub_category_name" id="sub_category_name" value="<?php echo $row1['sub_category_name']; ?>">
					
					
					
					<td>PRODUCT NAME :</td>
					<td><input type="text" name="p_name" id="p_name" ></td>
				</tr>

				<tr>
					<td>IMAGE</td>
					<td><img src="" name="image" id="image" width="150px" height="150px"></td>
				</tr>

				<tr>
					<td>p_price</td>
					<td><input type="text" name="p_price" id="p_price" ></td>
				</tr>

				<tr>
					<td>p_meta_title</td>
					<td><input type="text" name="p_meta_title" id="p_meta_title" ></td>
				</tr>

				<tr>
					<td>p_meta_keyword</td>
					<td><input type="text" name="p_meta_keyword" id="p_meta_keyword" ></td>
				</tr>

				<tr>
					<td>p_meta_desc</td>
					<td><input type="text" name="p_meta_desc" id="p_meta_desc" ></td>
				</tr>

				<tr>
					<td>p_stock</td>
					<td><input type="text" name="p_stock" id="p_stock" ></td>
				</tr>

				<tr>
					<td>p_status</td>
					<td><input type="text" name="p_status" id="p_status" ></td>
				</tr>


				<tr>
					<td></td>
					<td><input type="Submit" value="UPDATE" ></td>
				</tr>		
				
				</table>
			</form>

				</div><br>




				<div class="div3" style="width: 1200px;">
				<br>
				<table border="1" class="bordered">
					<tr>
						<td align="center">PRODUCT</td>
						<td>IMAGE</td>
						<td align="center">VIEW PRODUCT</td>
						<td align="center">ACTION</td>
					</tr>
					<?php
						
						//$query="SELECT * FROM product where cat_id='$cat_id' ";
						$query="SELECT * FROM product a JOIN sub_category b on 
								a.p_id=b.p_id where b.sub_category_id='".$sub_category_id."'";

						$result = mysqli_query($con,$query);

						while($row=mysqli_fetch_assoc($result))
						{
							
					?>

					<tr>
						<td align="center"><?php echo $row['p_name'] ?></td>
						<td><img src="<?php echo $row['image'] ?>" width="150px" height="150px" ></td>

						<td><a href="view_product.php?cat_id=<?php echo $cat_id; ?>&sub_category_id=<?php echo $sub_category_id; ?>&p_id=<?php echo $row['p_id']; ?>" >VIEW</a></td>

						<td><a href="update_delete_product.php?cat_id=<?php echo $cat_id; ?>&sub_category_id=<?php echo $sub_category_id; ?>&p_id=<?php echo $row['p_id']; ?>&update=1" >UPDATE</a></td>

						<td><a href="update_delete_product.php?cat_id=<?php echo $cat_id; ?>&sub_category_id=<?php echo $sub_category_id; ?>&p_id=<?php echo $row['p_id']; ?>&delete=1" >DELETE</a></td>
					</tr>		
					
					<?php
						}
					?>	

					
			</div>
		</div>	


</body>
</html>



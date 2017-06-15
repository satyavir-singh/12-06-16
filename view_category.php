<?php
	session_start();
	require_once("config.php");
	$cat_id=$_GET['cat_id'];
	
	if(!array_key_exists('admin_name', $_SESSION))
{
	header('Location: start.php');
}


if( isset($_POST['sub_category_name']) )
{
	$cat_id=$_POST["cat_id"];
	$sub_category_name=$_POST["sub_category_name"];
	
	$query= " INSERT INTO sub_category_id (sub_category_name,cat_id)  VALUES ('$sub_category_name','$cat_id') ";

	$result=mysqli_query($con,$query);

	if ($result) 
	{
		header("Location: view_category.php?cat_id=$cat_id");
	}
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
	
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	


	



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
			<div >
			<br>
<!-- ADD SUB CATEGORY -->
			<form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
		
			<table>
			<input type="hidden" name="cat_id" id="cat_id" value="<?php echo $cat_id; ?>">
				<tr>
					<td><input type="text" placeholder="SUB-CATEGORY NAME" name="sub_category_name" id="sub_category_name" required></td>
				<td>
					<input type="submit" value="ADD SUB-CATEGORY" >
				</td></tr>
			</table>
			</form>

			</div><br>
			<div style="width: 1200px;">
			<br>
			<table border="1" class="bordered">
				<tr>
					<td align="center">SUB-CATEGORY NAME</td>
					<td align="center">VIEW</td>
					<td align="center">ACTION</td>
				</tr>
				<?php
					
					$query="SELECT * FROM sub_category_id where cat_id='$cat_id' ";
					$result = mysqli_query($con,$query);

					while($row=mysqli_fetch_assoc($result))
					{
						
				?>

				<tr>
					<td align="center"><?php echo $row['sub_category_name'] ?></td>
					<td><a href="view_sub_category.php?cat_id=<?php echo $cat_id; ?>&sub_category_id=<?php echo $row['sub_category_id']; ?>" >VIEW</a></td>

					<td><a href="update_delete_sub_category.php?cat_id=<?php echo $cat_id; ?>&sub_category_id=<?php echo $row['sub_category_id']; ?>&update=1" >UPDATE</a></td>

					<td><a href="update_delete_sub_category.php?cat_id=<?php echo $cat_id; ?>&sub_category_id=<?php echo $row['sub_category_id']; ?>&delete=1" >DELETE</a></td>
				</tr>		
				
				<?php
					}
				?>	

				
			</div>
		</div>	


</body>
</html>



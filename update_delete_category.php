<?php
	session_start();
	require_once("config.php");

	if(!array_key_exists('admin_name', $_SESSION))
	{
		header('Location: start.php');
	}

	$cat_id=$_GET["cat_id"];
	$update=$_GET['update'];
	$delete=$_GET['delete'];


	if( $delete )
	{
		$query="DELETE from category_id where cat_id=$cat_id";
		 $result=mysqli_query($con,$query);
	    header("Location: admin_dashboard.php");
	}

	if( (isset($_POST['category_name']))  && ($update=1) )
	{
			$cat_id=$_POST["cat_id"];
			$category_name=$_POST["category_name"];

			$query="UPDATE category_id
			SET category_name='$category_name'
			WHERE cat_id=$cat_id "; 

		    $result=mysqli_query($con,$query);

	    if ($result) 
	    {
	    	header("Location: admin_dashboard.php");
	    }


	}

	

	

	
?>

<!DOCTYPE html>
<html>
<head>



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

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"
			  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			  crossorigin="anonymous">	  	
	</script>

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script> -->
          
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
				<tr><td><i class="fa fa-user-circle" aria-hidden="true">&nbsp;<?php echo $_SESSION['admin_name']; ?></td>
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
	</div>

		<div class="section">
			
			<div style="width: 1200px;margin-left: 70px;">
			<br>
			<h4 style="margin-left: 90px;">
				EDIT CATEGORY
			</h4>
				<?php
					
					$query="SELECT * FROM category_id where cat_id='".$cat_id."'";
					$result = mysqli_query($con,$query);

					$row=mysqli_fetch_assoc($result);
				
						
				?>
				<form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
				<table>
				<tr>
					<input type="hidden" name="cat_id" id="cat_id" value="<?php echo $row['cat_id'] ?>">
					<td>CATEGORY NAME :</td>
					<td><input type="text" name="category_name" id="category_name" value="<?php echo $row['category_name'] ?>"></td>
				</tr>
					<td></td>
					<td><input type="Submit" value="UPDATE" name=""></td>
				</tr>		
				
				</table>
			</form>
				
			</div>
		</div>	


</body>
</html>



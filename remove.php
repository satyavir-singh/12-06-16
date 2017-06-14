<?php
//including the database connection file
include("config.php");
//getting id of the data from url
$cart_id = $_GET['cart_id'];
$p_id = $_GET['p_id'];

//deleting the row from table
$result = mysqli_query($con, "DELETE FROM cart WHERE cart_id=$cart_id and p_id=$p_id");
//$result1 = mysqli_query($con, "DELETE FROM cart_id WHERE cart_id=$cart_id");


//redirecting to the display page (index.php in our case)
header("Location:cart.php");
?>
<?php
	require_once("config.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="header" style="height:60px;width:100%;background-color: #0094ff;margin:0;">

		<div style="float: left;width: 960px;margin-left: 15px;">

			<h3><i class="fa fa-snowflake-o" aria-hidden="true"></i>&nbsp;KhaRidlo</h3>

		</div>
		
	</div>

	<div class="detail" style="background-color: white;">

		<div style="margin-left: 50px;margin-top: 50px;">
			<form method="post" action="/user_login_db.php">
			<table>
				<tr>
				    <td>Username</td>
				    <td><input type="text" placeholder="Enter Username" name="username" required></td>
				</tr>
				<tr>
				    <td>Password</td>
				    <td><input type="password" placeholder="Enter Password" name="password" required></td>
				</tr>
				<tr>
					<td></td>
				    <td><input type="checkbox"> Remember me</td>
				</tr>
				<tr>
					<td></td>
					<td>
				    <button type="submit">Login</button>
				    <button type="button" >Cancel</button>
				    </td>
				</tr>
			</form>
		</div>
	</div>	

</body>
</html>
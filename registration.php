<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.2.1.js"
			  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			  crossorigin="anonymous">	  	
	</script>


	
</head>
<body>

	<div class="header" style="height:60px;width:100%;background-color: #0094ff;margin:0;">

		<div style="float: left;width: 960px;margin-left: 15px;">

			<h3><i class="fa fa-snowflake-o" aria-hidden="true"></i>&nbsp;KhaRidlo</h3>

		</div>
		
	</div>

	<div class="detail" style="background-color: white;">

		<div style="margin-left: 50px;margin-top: 50px;">
			<form action="registrationdb.php" method="POST" class="detail" >
				 <table>
					      <tr>
					        <td colspan=2>
					        <center><font size=4><b>REGISTRATION</b></font></center>
					        </td>
					       </tr>
					      <tr>
					       <td>Name</td>
					       <td><input type=text name="username" id="username" class="usernames" >*</td>
					      </tr>
					      <tr>
					        
					      </tr>
					       <tr>
					        <td>EmailId</td>
					        <td><span><input type="email" name="emailid" id="emailid" class="emailid" >*
					        </span></td>
					       </tr>
					       <tr>
					       		<td>Password</td>
					       		<td><input type="pasasword" name="password" id="password" class="password" >*</td>
					       </tr>
					       
					       <tr>
					       		<td>&nbsp;</td>
					       		<td><input type="submit" value="CREATE" >
					       		<input type="reset" value="RESET" >
					       		</td>
					       </tr>
					
					 </table>     
			</form>
		</div>
	</div>




	

</body>
</html>
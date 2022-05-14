<!DOCTYPE html>
<html>
	<head>
		<title>Login page</title>

	</head>

	<body>

		<center>
			<h3>Login here</h3>
			<form action ="login.php" method="post"></form> 
			
				<table>
				  <tr>
				     <td>Username:</td>
			             <td>
					<input type="text" name="user">
				     </td>
				  </tr>

				  <tr>
				     <td>Password:</td>
				     <td>
					<input type="password" name="password">
				     </td>
				  </tr>

				  <tr>
					<td> 
					   <input type="submit" name="submit" value="Login">
					</td> 
				 
					<td>
					   <p>Dont have an account?<a href="register"> Register here</a></p>
					</td>
   				  </tr>	

				</table>

		</center>

</body>
<!DOCTYPE html>
<html>
	<head>
		<title>Login page</title>

	</head>

	<body>

	@if(Session::get('error'))
	<script type="text/javascript">alert("Wrong E-mail or Password")</script>
	@endif

		<center>
			<h3>Login here</h3>
			<form action ="{{ route('login.process') }}" method="POST"> 
			@csrf
				<table>
				  <tr>
				     <td>E-mail:</td>
			             <td>
					<input type="text" name="email">
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
			</form>

		</center>

</body>
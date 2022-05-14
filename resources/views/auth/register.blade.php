<!DOCTYPE html>
<html>
	<head>
	      	<title>Register page</title>
<style type ="text/css">
	input[type="submit"]{
	     cursor: pointer;
	    }
</style>
	</head>

	
	<body>

		<center>
			<h3>Register here</h3>
			<form action="{{ route('register.process') }}" method="POST">
	    		@csrf
			<table>
			
				<tr> 
				   <td>First name:</td>
				   <td><input type="text"  name="first_name" placeholder="Enter first name here">
				   </td>
				</tr>
				
				<tr> 
				   <td>Last name:</td>
				   <td><input type="text"  name="last_name" placeholder="Enter last name here">
				   </td>
				</tr> 

				<tr> 
				   <td>Username:</td>
				   <td><input type="text"  name="username" placeholder="Enter username here">
				   </td>
				</tr> 

				<tr>
				   <td>Password:</td>
				   <td><input type="password" name="password" placeholder="Enter password here">
				   </td>
				</tr>

				<tr> 
				   <td>Email:</td>
				   <td><input type="text"  name="email" placeholder="Enter email here">
				   </td>
				</tr>
				
				<tr> 
				   <td>Gender:</td>
				   <td><label>Male</label><input type="radio"  name="gender" value="1" checked>
				   <td><label>Female</label><input type="radio"  name="gender" value="2">
				   </td>
				</tr>

				<tr> 
				   <td>Phone:</td>
				   <td><input type="text"  name="phone" placeholder="Enter phone number here">
				   </td>
				</tr>

				<tr>
				   <td>
					<input type="submit" name="submit" value="submit">
				   </td>

				<td>
				   <p>Already have an account?<a href="login">Login here</a></p>
				</td>
			    </tr>
				
			</table> 


			</form>	
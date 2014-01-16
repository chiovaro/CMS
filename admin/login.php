<?php  
	session_start();
?>

<html>
	<head>
		<title>Admin Login</title>
	</head>

<body bgcolor="gray">
	<form action="login.php" method="post">
		<table width="400" border="10" align="center" bgcolor="pink">
			<tr>
				<td bgcolor="yellow" colspan="4" align="center"><h1>Admin Login Form</h1></td>
			</tr>

			<tr>
				<td align="right">User Name:</td>
				<td><input type="text" name="user_name"></td>
			</tr>

			<tr>
				<td align="right">Password</td>
				<td><input type="password" name="user_pass"></td>
			</tr>

			<tr>
				<td colspan="4" align="center"><input type="submit" name="login" value="Login"></td>
			</tr>

		</table>
	</form>

</body>

</html>

<?php 
	include("includes/connect.php");

	if(isset($_POST['login'])){
		$user_name = $_POST['user_name'];
		$user_pass = $_POST['user_pass'];

		$user_name = strip_tags($user_name);
		$user_pass = strip_tags($user_pass);

		$user_name = mysql_real_escape_string($user_name);
		$user_pass = mysql_real_escape_string($user_pass);

		$encrypt = md5($user_password);

		$admin_query = "SELECT * FROM admin_login WHERE user_name='$user_name' AND user_pass='$user_pass'";

		$run = mysql_query($admin_query);

		if(mysql_num_rows($run) > 0){
			$_SESSION['user_name'] = $user_name;

			echo "<script>window.open('index.php','_self')</script>";
		}else{
			echo "<script>alert('User name or Password incorrect')</script>";
		}
	}
	

 ?>

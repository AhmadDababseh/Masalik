<?php 
	session_start();
	extract($_POST);
	$conn = mysqli_connect("localhost","root","","masalik") or die('Connection Failed.');
	
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$select = " SELECT pcode,username,password FROM users WHERE username = '$username' && password = '$password' ";
		

		$result = mysqli_query($conn, $select) or die("database fail");

		if(mysqli_num_rows($result)){
			$row = mysqli_fetch_array($result);
			$_SESSION['pcode'] = $row['pcode'];
			header('location:mainpage.php');
			
		}
		else{
			echo 'incorrect username or password!';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> Masalik Log In</title>
		<link rel="stylesheet" href="masalik.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
	<main>
		<div class="logintext"> 
				<h1 id="masalik"> Masalik </h1>
				<div class="moto">
					<h3> Location Saving </h3> 
					<h3> Location Sharing </h3> 
					<h3> Made Easier </h3>
				</div>
		</div> <br>
		<div class="loginform">
			<form name="login" method="post">
				<label for="username"></label> Username<br>
				<input type="text" name="username" required> <br>
					
				<label for="password"></label> Password <br>
				<input type="password" name="password" required> <br>
				
				<input type="submit" name="login" value="Log In" id="login"> 
			</form>
			<footer class="signupbutton"> 
			Not a member?
			<a href="http://localhost/masalik/signup.php" > Sign up </a>
		</footer>
		</div>
	</main>
	</body>
</html>
					
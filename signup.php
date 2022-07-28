<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> Masalik Sign up</title>
		<link rel="stylesheet" href="masalik.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
	
		<body>
			<main class="signup">
				<div class="signuptext"> 
					<h1 id="masalik"> Masalik </h1>
					<div class="moto">
						<h3> Location Saving </h3> 
						<h3> Location Sharing </h3> 
						<h3> Made Easier </h3>
					</div>
				</div> <br>
				<div class="signupform">
					<form name="signingup" action="http://localhost/masalik/signupredirect.php" method="post">
					<label for="username"></label> Username<br>
					<input type="text" name="username" required> <br>
					
					<label for="email"></label> Email <br>
					<input type="email" name="email" required> <br>
					
					<label for="password"></label> Password <br>
					<input type="password" name="password" required> <br>
					
					<label for="phone"></label> Phone Number <br>
					<input type="tel" name="phone" required pattern="[0-9]{10}"> <br>
					
					<label for="DOB"></label> Date of Birth <br>
					<input type="date" name="DOB" required> <br>
					
					<input type="submit" name="signup" value="Sign up" id="signup"> 
				</form>
				</div> <br>
				<div class="extrapages">
					By pressing the Sign up button, you are agreeing to our <br>
					<a href="http://localhost/masalik/extrapages/termsconditions.html">Terms and Conditions</a> and <a href="http://localhost/masalik/extrapages/privacypolicy.html"> Privacy Policy</a>
				</div>
		</main>
	</body>
</html>
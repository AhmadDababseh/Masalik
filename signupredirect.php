<?php 
	extract($_POST);
	$conn = mysqli_connect("localhost","root","","masalik") or die("Connection Failed.". mysqli_error());
		
	$username = $_POST['username'];
	$pcode = generatepcode($username);
		
	function generatepcode($username){
		$arr = str_split($username);
		$long = implode(" ", $arr);
		$short = str_replace(' ','', $long);
		$lower = strtolower($short);
		$x = 0;
		do{
			if(!isset($pcode)){$pcode = $lower[rand(0, strlen($lower)-1)]; $x++;}
			else{$pcode .= $lower[rand(0, strlen($lower)-1)]; $x++;}
		}while($x < 5);
		return $pcode;
	}
	
	$sqlquery = "INSERT INTO users(pcode, username, password, phone,email, DOB) VALUES('$pcode', '$username', '$password', '$phone', '$email', '$DOB')";
	$result = mysqli_query($conn, $sqlquery) or die("Query failed: " . mysqli_error());
	mysqli_close($conn);
	setcookie('pcode',$pcode, TIME()+7200, "/");
	$_SESSION['pcode'] = $pcode;
	header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> Masalik Sign up</title>
		<link rel="stylesheet" href="masalik.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<main> 
			
			
		</main>
		
	</body>

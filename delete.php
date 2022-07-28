<?php 
	session_start();
	extract($_POST);
	$conn = mysqli_connect("localhost","root","","masalik") or die('connedction failed');
	if(isset($deletebutton)){
		$selectsql = "SELECT root,name FROM general, specific WHERE root = '$root'";
		$selectresult = mysqli_query($conn, $selectsql);
		if(mysqli_num_rows($selectresult)  < 0){
			echo "Location can not be found"; 
			break;
		}
	}
	
	function confirmdelete(){
		$returned = mysqli_num_rows($selectresult);
		$row = mysqli_fetch_assoc($selectresult);
		for ($x = 0; $x < $returned; $x++){
			echo "<form id='deleteelement' method='post'>";
			echo "<span> $row['name'] <span>";
			echo "<input type='submit' name='confirmbutton' value='delete' id='confirmbutton'>";
			echo "</form>";
	}
	extract($_POST);
	if(isset($confirmdelete)){
		$deletesql = "DELETE FROM general, specific WHERE root = $root";
		$deleteresult = mysqli_query($conn, $deletesql);
		if(mysqli_num_rows($deleteresult) > 0){
			header("Refresh:0");
		}
	}
		
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> Masalik </title>
		<link rel="stylesheet" href="masalik.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<section id="deletebar">
		<form id="deleteform">
			<label for="deleteroot"></label> enter root<br>
			<input type="search" name="deleteroot" required> <br>
			
			<input type="submit" name="deletebutton" value="delete" id="deletebutton"> 
		</form>
	</body>
</html>
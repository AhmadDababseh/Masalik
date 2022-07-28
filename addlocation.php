<?php
	session_start();
	extract($_POST);
	if(isset($name)){
		$conn = mysqli_connect("localhost", "root", "", "masalik") or die('connedction failed');
		$pcode = $_SESSION['pcode'];
		function generateroot(){
			global $pcode;
			$root = "$pcode". rand(pow(10, 2), pow(10, 3)-1);
			return $root;
		}
		$root = generateroot(); // update to : check if root already in use
		$generalsql = "INSERT INTO general VALUES('$root',  '$name',  '$governorate',  '$district',  '$subdistrict');";
		$generalresult = mysqli_query($conn, $generalsql) or die('general failed '.MYSQLI_ERROR());
		
		$definitesql = "INSERT INTO definite VALUES('$root','$neighborhood', '$street', '$buildingName', '$buildingNo', '$floorNo', '$apartmentNo')";
		$definiteresult = mysqli_query($conn, $definitesql) or die('definite failed'.MYSQLI_ERROR());
		
		$restrictionssql = "INSERT INTO restrictions VALUES('$pcode','$root')";
		$restrictionsresult = mysqli_query($conn, $restrictionssql) or die('restrictions failed'.MYSQLI_ERROR());
		mysqli_close($conn);
		header('location:add.php');
	}
?>
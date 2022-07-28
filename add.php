<?php/*
	extract($_POST);
	if(isset($addlocation)){
		$conn = mysqli_connect("localhost", "root", "", "masalik") or die('connedction failed');
		session_start();
		$pcode = $_SESSION['pcode'];
		function generateroot(){
			global $pcode;
			$root = "$pcode". rand(pow(10, 2), pow(10, 3)-1);
			return $root;
		}
		$root = generateroot(); // check if root already in use
		echo $root;
		$generalsql = "INSERT INTO general VALUES($root,  $name,  $governorate,  $district,  $subdistrict)";
		$generalresult = mysqli_query($conn, $generalsql) or die('general failed '.MYSQLI_ERROR());
		
		$specificsql = "INSERT INTO specific VALUES($root, ,$neighborhood, $street, $buildingName, $buildingNo, $floorNo, $apartmentNo)";
		$specificresult = mysqli_query($conn, $specificsql) or die('specific failed'.MYSQLI_ERROR());
		mysqli_close($conn);
	}
*/
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> Add </title>
		<link rel="stylesheet" href="masalik.css">
	</head>
	<body>
		<main class="addpage">
			<header class="addtype">
			<h1>Add Location</h1>
			</header>
			<section id="formsection">
				<form method="post" id="addform" action="addlocation.php">
					<label for="name">Name</label> <br>
					<input type="text" name="name" id="name" > <br>
					
					<label for="governorate">Governorate</label><br>
					<select name="governorate" id="governorate" form="addform" >
					<?php
						echo "<br>";
						$gov = array("Ajloun", "Amman", "Aqaba", "Balqa", "Irbid", "Jerash", "Karak", "Maan", "Madaba", "Mafraq", "Tafilah", "Zarqa");
						foreach($gov as $name) 
								{echo "<option class='gov' value='$name'> $name </option>";}
					?>
					</select> <br>
					
					<label for="district">District</label><br>
					<input  type="text" name="district" id="district" form="addform">
					
					<label for="subdistrict">Subdistrict</label>
					<input type="text" name="subdistrict" id="subdistrict" form="addform">
					
					<label for="neighborhood">Neighborhood</label> <br>
					<input type="text" name="neighborhood" id="neighborhood" > <br>
					
					<label for="street">Street</label> <br>
					<input type="text" name="street" id="street" > <br>
					
					<label for="buildingName">Building Name</label><br>
					<input type="text" name="buildingName" id="buildingName" > <br>
					
					<label for="buildingNo">Building Number</label><br>
					<input type="number" name="buildingNo" id="buildingNo" > <br>
					
					<label for="floorNo">Floor Number</label> <br>
					<input type="number" name="floorNo" id="floorNo" > <br>
					
					<label for="apartmentNo">Apartment Number</label> <br>
					<input type="number" name="apartmentNo" id="apartmentNo" > <br>
					
					<label for="expiration">Expiration Date</label> <br>
					<input type="datetime-local" name="expiration" id="expiration" ><br>
					
					<input type="submit" value="add" id="addlocation"> <br>
				</form>
			</section>
			<footer>
				<button type="button" onclick="javascript:location.href='mainpage.php'" id="backmain"> main page </button>
				<button type="button" onclick="window.location.reload()" id="refresh"> add another</button>
			</footer>
		</main>
	</body>
</html>
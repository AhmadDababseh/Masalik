<?php
	session_start();
	if(isset($_SESSION)){
		$pcode = $_SESSION['pcode'];
	}
	$conn = mysqli_connect("localhost","root","","masalik") or die('connedction failed');
	
	function deletefunction(){
		foreach($_POST as $rt => $ne){
		//$deletesql = "";
		}
		header('location:mainpage.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> Edit </title>
		<link rel="stylesheet" href="masalik.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>

		<header class="logintext"> 
			<h1 id="masalik"> Masalik </h1>
			<div class="moto">
				<h3> Location Saving </h3> 
				<h3> Location Sharing </h3> 
				<h3> Made Easier </h3>
			</div>
		</header> <br>	
		<main>
			<div id="information">
				<?php
				foreach($_POST as $rt => $ne){
				$selectsql = "SELECT * FROM general WHERE root = '$rt'";
				$result = mysqli_query($conn, $selectsql);
				$row = mysqli_fetch_array($result);
				$_SESSION['rootrestrict'] = $rt;
				$generalsql = "SELECT * FROM general WHERE root = '$rt'";
				$generalresult = mysqli_query($conn, $generalsql);
				$displaygeneral = mysqli_fetch_assoc($generalresult);
				if(isset($displaygeneral)){
					foreach($displaygeneral as $x => $element){
						echo $element;
						echo "<br>";
					}
				}
					
				$definitesql = "SELECT * FROM definite WHERE root = '$rt'";
				$definiteresult = mysqli_query($conn, $definitesql) or die('definite failed');
				$displaydefinite = mysqli_fetch_assoc($definiteresult);
				if(isset($displaydefinite)){
					foreach($displaydefinite as $x => $element){
						if($x == 'root'){continue;}
						echo $x.": ".$element;
						echo "<br>";
					}
				}
			}
			?>
			</div>
			
			<button type="button" onclick="javascript:document.getElementById('restrictions').removeAttribute('hidden');" id="res"> restirct</button>
			<div id="restrictions" hidden> 
			<form action="restrict.php" method="post" name="restirctform">
				<label for="access">access</label><br>
				<select name="access" id="access" form="restirctform" >
					<option> public </option>
					<option> private </option>
				</select> <br>
				
				<label for="exception">exception </label><br>
				<input type="text" name="exception" id="exception" form="restirctform"><br>
				
				
				<input type="submit" value="save" id="save" name="save"> <br>
			</form>
		<div>
		</main>
		

	</body>
</html>
<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","masalik");
	extract($_POST);
	function displaylocation(){ // displays location information based on the restrictions set
		$generalsql = "SELECT * FROM general WHERE root = '$inputroot'";
		$generalresult = mysqli_query($conn, $generalsql);
		$displaygeneral = mysqli_fetch_assoc($generalresult);
		if(isset($displaygeneral)){
			foreach($displaygeneral as $x => $element){
				echo $x.": ".$element;
				echo "<br>";
			}
		}
		$definitesql = "SELECT * FROM definite WHERE root = '$inputroot'";
		$definiteresult = mysqli_query($conn, $definitesql) or die('definite failed');
		$displaydefinite = mysqli_fetch_assoc($definiteresult);
		if(isset($displaydefinite)){
			foreach($displaydefinite as $x => $element){
				if($x =='root'){continue;}
				echo $x.": ".$element;
				echo "<br>";
			}
		}
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width initial-scale=1.0">
		<title> search </title>
		<link rel="stylesheet" href="masalik.css">
	</head>
	<body>
		<main>
			<header>
			<div class="logintext"> 
				<h1 id="masalik"> Masalik </h1>
				<div class="moto">
					<h3> Location Saving </h3> 
					<h3> Location Sharing </h3> 
					<h3> Made Easier </h3>
				</div>
			</div> <br>
			</header>
			<div class="searchbox">
				<form method="post" action="">
					<input type="search" name="inputroot" placeholder="search"></input>
					<input type="submit" name="search" value="search"></input>
				</form>
			</div>
			
			<section class="searchresult">
				<?php
					if(isset($search))
					{
						if(ctype_alpha($inputroot)){
							$usersql = "SELECT username, phone, email, DOB FROM users WHERE pcode = '$inputroot'";
							$userresult = mysqli_query($conn, $usersql);
							$displayuser = mysqli_fetch_assoc($userresult);
							if(isset($displayuser)){
								foreach($displayuser as $x => $element){
									echo $element;
									echo "<br>";
									continue;
								}
							}
						}
						else{
							$restrictsql = "SELECT * FROM restrictions WHERE root = '$inputroot'";
							$restrictresult = mysqli_query($conn, $restrictsql);
							$displayrestrict = mysqli_fetch_assoc($restrictresult);
							if(isset($displayrestrict) AND $displayrestrict['access']){
								if($displayrestrict['access'] == 1){
									if($displayrestrict['exception'] == '$pcode'){displaylocation();}
								}
								else echo"Access Denied";
								
								if($displayrestrict['access'] == 0){
									if($displayrestrict['exception'] == '$pcode'){echo "Access Denied";}
								}
								else displaylocation();
							}
						}
					}
				?>
			</section>
			<footer>
				<button type="button" onclick="javascript:location.href='mainpage.php'" id="mainpage"> main page </button>
			</footer>
		</main>
	</body>
</html>
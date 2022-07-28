<?php 
	session_start();
	if(isset($_SESSION)){
		$pcode = $_SESSION['pcode'];
	}
	$conn = mysqli_connect("localhost","root","","masalik") or die('connedction failed');
	$selectsql = "SELECT * FROM users WHERE pcode = '$pcode'";
	$result = mysqli_query($conn, $selectsql);
	$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> Masalik </title>
		<link rel="stylesheet" href="masalik.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<div class="logintext"> 
			<h1 id="masalik"> Masalik </h1>
			<div class="moto">
				<h3> Location Saving </h3> 
				<h3> Location Sharing </h3> 
				<h3> Made Easier </h3>
			</div>
		</div> <br>	
		<main class="mainpage">
			<section id="profile">
				<div id="userinfo">
					<?php 
						if(isset($row)){
							foreach($row as $x => $element){
								if(is_int($x) and $x != 2){
									echo $element;
									echo "<br>";
									continue;
								}
								else {continue;}
							}
						}
					?>
				</div>
				<button type="button" onclick="javascript:location.href='connect.php'" id="connect"> connect </button>
				<button type="button" onclick="javascript:location.href='history.php'" id="history"> history </button>
			</section>
			<section id="mainsection">
				<div id="display">
					<?php 
						$generalsql = "SELECT root,name FROM general WHERE root LIKE '$pcode%' ";
						$generalresult = mysqli_query($conn, $generalsql);
						echo "<form method='post' action='edit.php' target='_blank'>";
						while($displaygeneral = mysqli_fetch_assoc($generalresult)){
							echo "<input type='submit' value='".$displaygeneral['name']."' id='".$displaygeneral['name']."' name='".$displaygeneral['root']."'>";
							echo "<br>";
						}
						echo "<br>";
					?>
				</div>
				
				<button type="button" onclick="javascript:location.href='add.php'" id="add"> add </button>
				<button type="button" onclick="javascript:location.href='search.php'" id="search"> search </button>
				<button type="button" onclick="javascript:location.href='logout.php'" id="logout"> log out </button>
				
			</section>
		</main>
	</body>
</html>
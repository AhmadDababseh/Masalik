<?php
	session_start();
	if(isset($_SESSION)){
		$pcode = $_SESSION['pcode'];
	}
	$conn = mysqli_connect("localhost","root","","masalik") or die('connedction failed');
	$rt = $_SESSION['rootrestrict'];
	extract($_POST);
	if(isset($save)){
		if(isset($access)){
			$selectsql = "SELECT access FROM restrictions WHERE root = '$rt'";
			$selectresult = mysqli_connect($conn, $selectsql);
			if($selectdisplay = mysqli_num_rows($selectresult)){
				$updatesql = "UPDATE restrictions SET access = '$access'  WHERE root = '$rt'";
				if(isset($exception)){ "UPDATE restrictions SET exception = '$exception'  WHERE root = '$rt'";}
			}
				else {$insertsql = "INSERT INTO restrictions VALUES('$access', '$exception')";
			}
		}
		
	}echo "<script>window.close();</script>";
?>


<?php
	session_start();
	include_once 'includes/connection.php';
	$page = $_GET['pg'];
 
	if(isset($_GET['id']) & !empty($_GET['id']) & isset($_SESSION['u_id'])){
			$uid = $_SESSION['u_id'];
			$pid = $_GET['id'];
 			$sql = "INSERT INTO wishlist (u_id,p_id) VALUES ('$uid', '$pid');";
			mysqli_query($conn, $sql);
			header('location: '.$page.'.php?status=success');
				
			
 


	}else{
		$page = $_GET['pg'];
		header('location: '.$page.'.php?status=failed');
	}
?>
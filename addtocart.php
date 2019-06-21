
<?php
	session_start();
	
 
	if(isset($_GET['id']) & !empty($_GET['id'])){
		if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
 
			$items = $_SESSION['cart'];
			$cartitems = explode(",", $items);
			if(in_array($_GET['id'], $cartitems)){
				$page = $_GET['pg'];
				header('location: '.$page.'.php?status=incart');
			}else{
				$items .= "," . $_GET['id'];
				$_SESSION['cart'] = $items;
				$page = $_GET['pg'];
				header('location: '.$page.'.php?status=success');
				
			}
 
		}else{
			$items = $_GET['id'];
			$_SESSION['cart'] = $items;
			$page = $_GET['pg'];
			header('location: '.$page.'.php?status=success');
		}
		
	}else{
		$page = $_GET['pg'];
		header('location: '.$page.'.php?status=failed');
	}
?>
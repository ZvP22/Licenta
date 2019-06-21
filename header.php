<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<title>Idevices</title>
	<link rel='stylesheet' type='text/css' href='./style.css' />
	<script src="javascript.js"></script>
	
</head>
<body>
	<div class="container">
		

		<div class="header">
			<div class="logo"><h1><a href="index.php">Idevices</a></h1></div>
			<ul class="nav">
				<li><a href="imac.php">Mac</a></li>
				<li><a href="ipad.php">Ipad</a></li>
				<li><a href="iphone.php">Iphone</a></li>
				<li><a href="watch.php">Watch</a></li>
				<li><a href="accesorii.php">Accesorii</a></li>


				
			</ul>



			<div class="Account-Drop">
				<div class="dropdown">
					<button onclick="myFunction()" class="dropbtn"><img src="imagini/account.png"></button>
					<div id="myDropdown" class="dropdown-content">
						<?php
						if(isset($_SESSION['role']) && $_SESSION['role'] == '1')

						{


							echo '<a href="users.php">Utilizatori</a>
							<a href="adaugaproduse.php">Adauga produse</a>
							<a href="comenzinoi.php">Comezi noi</a>
							<a href="istoriccomeziAD.php">Comezi finalizate</a>
							<a><form action="includes/logout.php" method="POST">
							<button class="logout-button" type="submit" name="submit">Log out</button>
							</form>';
						}else{if(isset($_SESSION['role']) && $_SESSION['role'] == '0'){
							echo '
							<a href="Cart.php">Cosul de cumparaturi</a></li>
							<a href="istoricComenzi.php">Comenzile mele</a>
							<a href="wishlist.php">Wishlist</a>
							<a href="date.php">Date Personale</a>
							<form action="includes/logout.php" method="POST">
							<button class="logout-button" type="submit" name="submit">Log out</button>
							</form>';
						}else{
							echo '
							<form  class="login-form" action="includes/login.php" method="POST">
							<p>Conecteaza-te</p>
							<a><input type="text" name="uid" placeholder="Utilizator/Email"></a>
							<a><input type="password" name="pwd" placeholder="Parola"></a>
							<button class="login-button" type="submit" name="submit">Login</button>
							
							</form><a  href="signup.php">Nu ai cont? Creaza unul</a>';

						} }
						?>	

					</div>
				</div>
				
			</div>

			
			<div class="cos_cumparaturi"><a href="cart.php"><img src="imagini/cos.png"></a><?php
			if(!empty($_SESSION['cart']))
			{
				$items = $_SESSION['cart'];
				$cartitems = explode(",", $items);
				$count = count($cartitems);
			}
			else
			{
				$count = 0;
			}
			echo $count;
			?></div>

			<div class="search-container">
				<form method="POST" action="search.php" id="searchform">

					<input class="search-btn" type="text" name="search" placeholder="Cauta">
				</form>
				
			</div>
		</div>



		





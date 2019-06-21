

<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<title>Idevices</title>
	<link rel='stylesheet' type='text/css' href='./style.css' />
</head>
<body>
	<div class="container">
		<div class="login-header"> 
			<?php
			if(isset($_SESSION['u_id'])){
				echo '<form action="includes/logout.php" method="POST">
				<button type="submit" name="submit">Log out</button>
			</form>';
			}else{
				echo '
			<form action="includes/login.php" method="POST">
				<input type="text" name="uid" placeholder="Username/email">
				<input type="password" name="pwd" placeholder="password">
				<button type="submit" name="submit">Login</button>
				
			</form><a  href="signup.php">Sign up</a>';

			}
			?>	
			<?php
			if(isset($_SESSION['u_id'])){?>
			<a href="account.php" id="myProfile"><?php echo "Hi,".$_SESSION["name"]; ?></a>
		<?php } ?>
		
		</div>

	<div class="header">
		<div class="logo"><h1><a href="index.html">Idevices</a></h1></div>
		<ul class="nav">
			<li><a href="imac.php">Mac</a></li>
			<li><a href="ipad.php">Ipad</a></li>
			<li><a href="iphone.php">Iphone</a></li>
			<li><a href="watch.php">Watch</a></li>
			<li><a href="imac.php">Accesorii</a></li>
		</ul>
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

	<br>

	<div class="content">
						<?php
				session_start();
				require_once('includes/connection.php');

				$sql = "SELECT * FROM products";

				if(isset($_GET['status']) & !empty($_GET['status'])){ 
			if($_GET['status'] == 'success'){
				echo "<div class=\"alert alert-success\" role=\"alert\">Produsul a fost adaugat</div><br >";
			}elseif ($_GET['status'] == 'incart') {
				echo "<div class=\"alert alert-info\" role=\"alert\">Produsul exista deja in cos</div>";
			}elseif ($_GET['status'] == 'failed') {
				echo "<div class=\"alert alert-danger\" role=\"alert\">Nu s-a putut adauga in cos</div>";
			}
	}

	?>
		<div class="product-grid product-grid--flexbox">
			<div class="product-grid__wrapper">
				

				<!-- afisare produse -->
<?php			if(isset($_POST['minval'])){
				
				 	$min=$_POST['minval'];
				 	$max=$_POST['maxval'];


				$sql = " SELECT * FROM products WHERE p_price BETWEEN '$min' AND '$max' ORDER BY p_price ASC";
						
					$res = mysqli_query($conn, $sql);
						
					while($r = mysqli_fetch_assoc($res)) 
							{

				echo '<div class="product-grid__product-wrapper">
					<div class="product-grid__product">
						<div class="product-grid__img-wrapper">			
							<img src="'.$r["p_image"].'" alt="Img" class="product-grid__img" />
						</div>

						<span class="product-grid__title">'.$r["p_name"].'</span>
						<span class="product-grid__price">'.$r["p_price"].' Lei</span>
						<div class="product-grid__extend-wrapper">
							<div class="product-grid__extend">
								
								<span  class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> <a href="addtocart.php?id='.$r['p_id'].'&pg=imac"> Add to cart</a></span>
								<span  class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> <a href="addtowishlist.php?id='.$r['p_id'].'&pg=imac"> Add to Wishlist</a></span>

								<span  class="product-grid__btn product-grid__view"><i class="fa fa-eye"></i><a href="single.php?p='.$r['p_id'].'"> View more</a></span>
							</div>
						</div>
					</div>
				</div>';
				 
				    }
				     
				     }else{
				     	echo "dsaf";
				     }
				?>
				

	
</div>


</div>
</body>
</html>

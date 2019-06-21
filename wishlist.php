
<?php include('header.php'); ?>

	<div class="content">
		<h2 align="center">Wishlist</h2>

<?php
	session_start();
	include_once 'includes/connection.php';
	$page = $_GET['pg'];
	?>

	
	<?php
 
$sql = " SELECT * FROM wishlist WHERE u_id = '".$_SESSION['u_id']."'";
					$res = mysqli_query($conn, $sql);
						
					while($r = mysqli_fetch_assoc($res)) 
							{
								$sql1 = "SELECT * FROM products WHERE p_id = '".$r['p_id']."'";
								$res1 = mysqli_query($conn, $sql1);
								$row = mysqli_fetch_assoc($res1);
								
								echo '		<div class="product-grid__product-wrapper">
												<div class="product-grid__product">
													<div class="product-grid__img-wrapper">			
														<img src="'.$row["p_image"].'" alt="Img" class="product-grid__img" />
													</div>

														<span class="product-grid__title">'.$row["p_name"].'</span>
														<span class="product-grid__price">'.$row["p_price"].' Lei</span>
												<div class="product-grid__extend-wrapper">
													<div class="product-grid__extend">
														
														<span  class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> 	<a href="addtocart.php?id='.$row['p_id'].'&pg=wishlist">Adauga in cos</a></span>

														<span  class="product-grid__btn product-grid__delete"><i class="fa fa-cart-arrow-down"></i> 	<a href="delcart.php?id='.$r['id'].'&pg=wishlist">Sterge</a></span>
													

														<span  class="product-grid__btn product-grid__view"><i class="fa fa-eye"></i><a href="single.php?p='.$r['p_id'].'"> Vezi mai multe</a></span>
							</div>
						</div>
					</div>
				</div>
			';
				 		
	
	


}
?>
</div>
</div>

<?php include('footer.php'); ?>
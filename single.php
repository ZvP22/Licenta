<?php include('header.php'); ?>

<div class=content>

	<?php
				session_start();
				require_once('includes/connection.php');

				$sql = "SELECT * FROM products";

				if(isset($_GET['status']) & !empty($_GET['status'])){ 
			if($_GET['status'] == 'success'){
				echo "<div class=\"alert alert-success\" role=\"alert\">Produsul a fost adaugat</div>";
			}elseif ($_GET['status'] == 'incart') {
				echo "<div class=\"alert alert-info\" role=\"alert\">Produsul exista deja in cos</div>";
			}elseif ($_GET['status'] == 'failed') {
				echo "<div class=\"alert alert-danger\" role=\"alert\">Nu s-a putut adauga in cos</div>";
			}
	}				
	?>

	



						  
								<?php 
								include 'includes/connection.php';
								$product_id = $_GET['p'];
								$sql = " SELECT * FROM products ";
								$sql = " SELECT * FROM products WHERE p_id = $product_id";
								if (!$conn) {
									die("Connection failed: " . mysqli_connect_error());
								}
								$result = mysqli_query($conn, $sql);

								

								if (mysqli_num_rows($result) > 0) 
								{
									while($row = mysqli_fetch_assoc($result)) 
									{
									echo '
									
										<div class="prod-flex"> <img src="'.$row['p_image'].'"  
											<div class="prod-content">
									
											<div class="flex-prod-content">
											<h3>Nume</h3>
											<div class="single-details">'.$row["p_name"].'</div>
											<h3>Descriere</h3>
											<div class="single-details">'.$row["p_descriere"].'</div>
											<div class="price-single"><span class="product-grid__price">Pret: '.$row["p_price"].' Lei</span></div>
										
												<div class=single-button><span  class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> <a href="addtocart.php?id='.$row['p_id'].'&pg=single"> Adauga in cos</a></span>
												
												<span  class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> <a href="addtowishlist.php?id='.$row['p_id'].'&pg=single"> Adauga in wishlist</a></span></div>
														
											</div>
											</div>
										</div>';
			
									
									
									
									}
								} 
								?>								
		
					
									

 </div>
    
<?php include('footer.php'); ?>
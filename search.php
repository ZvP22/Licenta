<?php include('header.php'); ?>
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
<?php			if(isset($_POST['search'])){
				
				 	$name=$_POST['search'];

				$sql = " SELECT * FROM products WHERE p_name LIKE '%$name%'";
						
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
								
								<span  class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> <a href="addtocart.php?id='.$r['p_id'].'&pg=search">Adauga in cos</a></span>
								

								<span  class="product-grid__btn product-grid__view"><i class="fa fa-eye"></i><a href="single.php?p='.$r['p_id'].'"> Vezi mai mult</a></span>
							</div>
						</div>
					</div>
				</div>';
				 
				    }
				     
				     }else{
				     	echo "<h2 align='center'>Nu s-a gasit niciun produs! Ne pare rau</h2>";
				     }
				?>
				

	
</div>


</div>
<?php include('footer.php'); ?>
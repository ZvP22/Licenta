<?php include('header.php'); ?>
		





		<div class="content">

			<div class="double-range">

				<form method="POST" name="slider" action="ipad.php">
					<span class="double-range__value"></span>

					<div class="double-range__bar"></div>

					<input type="range" class="double-range__range"/>
					<input type="range" class="double-range__thumb" name="minval" value="0" min="0" max="5000" step="1"/>
					<input type="range" class="double-range__thumb" name = "maxval" value="10" min="500" max="10000" step="1"/>

				</div>
				<br>
				<input class="slider-button" type="submit" value="Trimite">
			</form>
		</div>
		<div class="styled-select slate">

			<form method="POST" action="ipad.php">
				<select name="sort">
					<option value="default">--</option>
					<option value="nume">Nume</option>
					<option value="pret">Pret crescator</option>
					<option value="pretD" >Pret descrescator</option>
				</select>
				<input type="submit" name="submit" value="Go">
			</form>
		</div>	
		<br/>
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
				<?php					

				
				
				if(isset($_POST['sort'])){
					$var1 = $_POST['sort'];
					
					if($var1 == "nume"){
						$sql =	" SELECT * FROM products WHERE p_type LIKE 'tablet' ORDER BY p_name ASC" ;
						

					}else if($var1 == "pret"){
						$sql =	" SELECT * FROM products WHERE p_type LIKE 'tablet' ORDER BY p_price ASC" ;
						

					}else if($var1 == "pretD"){
						$sql =	" SELECT * FROM products WHERE p_type LIKE 'tablet' ORDER BY p_price DESC" ;
						
					}
				}else if(isset($_POST['minval'])){
					
					$min=$_POST['minval'];
					$max=$_POST['maxval'];


					$sql = " SELECT * FROM products WHERE p_type LIKE 'tablet' AND p_price BETWEEN '$min' AND '$max' ORDER BY p_price ASC";
				}else{ 
					
					$sql = " SELECT * FROM products WHERE p_type LIKE 'tablet'"; 

				}



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
					
					<span  class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> <a href="addtocart.php?id='.$r['p_id'].'&pg=ipad">Adauga in cos</a></span>
					

					<span  class="product-grid__btn product-grid__view"><i class="fa fa-eye"></i><a href="single.php?p='.$r['p_id'].'">Vezi mai mult</a></span>
					</div>
					</div>
					</div>
					</div>';
					
					
				}
				
				
				?>
				

				
			</div>

		</div>
<?php include('footer.php'); ?>
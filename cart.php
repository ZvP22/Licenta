<?php include('header.php'); ?>
<div class="cart-container">
	<h2 align="center">Cosul tau</h2>

<?php 
require_once('includes/connection.php'); 

$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
?>
	<div class="row">
	  <table class="table">
	  	<tr>
	  		<th>Nr.</th>
	  		<th>Nume produs</th>
	  		<th>Pret</th>
	  	</tr>
		<?php
		$total = '';
		$i=1;
		if(!empty($_SESSION['cart'])){
		 foreach ($cartitems as $key=>$id) {
			$sql = "SELECT * FROM products WHERE p_id = $id";
			$res = mysqli_query($conn, $sql);
			$r = mysqli_fetch_assoc($res);
		?>	  	
	  	<tr>
	  		<td><?php echo $i; ?></td>
	  		<td><a class ="delete-button" href="decart.php?remove=<?php echo $key; ?>">Sterge</a> <?php echo $r['p_name']; ?></td>
	  		<td><?php echo $r['p_price']; ?> lei</td>
	  	</tr>
		<?php 
			$total = $total + $r['p_price'];
			$i++; 
			}
			 }
		?>
		<tr>
			<td><strong>Pret Total</strong></td>
			<td><strong><?php echo $total; ?> lei</strong></td>
			<?php if(!empty($_SESSION['cart'])){ ?>
			<td><a href="finalizare.php?total=<?=$total?>" class="finalizare-button">Finalizare comanda</a></td>
			<?php  } ?>
		</tr>
	  </table>
	  
	</div>
 
</div>
 <?php include('footer.php'); ?>

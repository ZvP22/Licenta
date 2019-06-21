
<?php
	session_start();
	include_once 'includes/connection.php';

	$produse = $_SESSION['cart'];
	$total = $_GET['total'];
	
	$sql = " SELECT * FROM users WHERE user_id = '".$_SESSION['u_id']."'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);

	$adresa = $row['adresa'];
	$tel = $row['nrTel'];
	$u_id = $_SESSION['u_id'];
	$status = '0';

 
	if(isset($produse)){
 			$sql = "INSERT INTO comenzi (produse,total,adresa,nrTel,u_id, status) VALUES ('$produse', '$total', '$adresa', '$tel', '$u_id', status);";
 
			
			if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
   unset($_SESSION['cart']);
} 
			//header('location: index.html?status=success');
				
			
 


	}else{
		header('location: index.html?status=failed');
	}
?>
<?php include('header.php'); ?>

		<div class="content">
	<div class="flex-container-fin">
	  		<div  class="Account-nav-fin">
		<h2 align="center">Comanda a fost finalizata cu succes!</h2>
		<h4 align="center">Comanda dumneavoastra a fost finalizata cu succes. ID-ul comenzii este <?=$last_id?></h4>

		<h4 align="center">Comanda va fi livrata la adresa: <?=$adresa?> .
		Numarul de telefon: <?=$tel?></h4>

		<h4 align="center">Livrarea se face prin curier iar totalul este de <?=$total?> de lei.</h4>
		<h4 align="center">Pentru mai multe detalii accesati pagina "Comenzile mele" din meniu contului dumneavoastra!</h4>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
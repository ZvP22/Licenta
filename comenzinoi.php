<?php include('header.php'); ?>

	<div class="content">



<?php
	session_start();
	include_once 'includes/connection.php';
	$page = $_GET['pg'];
 
$sql = " SELECT * FROM comenzi WHERE status = '0'";
					$res = mysqli_query($conn, $sql);
						echo '<h2 align="center">Comenzi in cus de procesare</h2>';
					while($r = mysqli_fetch_assoc($res)) 
							{
								
								echo '<div class= "user-table">
								<table>
								<tr>
								<th>ID-ul comenzii</th>
								<th>ID-ul produselor</th>
								<th>ID-ul utilizatorul</th>
								<th>Adresa livrarii</th>
								<th>Numar telefon</th>
								<th>Pret Total</th>
								</tr>
								'
								;
								echo '<tr>
								<td>' . $r['id'] . '</td>
								<td>' . $r['produse'] .'</td>
								<td>'. $r['u_id'] .'</td> 
								<td>' .$r['adresa'] . '</td>
								<td>'. $r['nrTel'] .'</td>
								<td>'. $r['total'] .'</td>
								<td><a class ="delete-button" href="anulareComanda.php?id=' . $r['id'] . '&pg=comenzinoi">Anulare Comanda</a></td>
								<td><a class ="finalizare-button" href="procesareComanda.php?id=' . $r['id'] . '">Finalizare comanda</a></td>
								</tr> ';
								
								
								
								
								echo '</table></div><br/>';
								
	
?>




<?php
}
?>

</div>
<?php include('footer.php'); ?>

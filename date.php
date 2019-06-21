<?php include('header.php'); ?>

	<div class="content">
		<h2 align="center">Date Personale</h2>
		<?php				

				session_start();
				require_once('includes/connection.php');
				$sql = " SELECT * FROM users WHERE user_id = '".$_SESSION['u_id']."'";
						
					$res = mysqli_query($conn, $sql);
						
					while($r = mysqli_fetch_assoc($res)) 
							{
								

							echo '
							<div class= flex-box-w>
							<p>Nume: '.$r['user_first'].'</p>
							<hr>
							<p>Prenume: '.$r['user_last'].'</p>
							<hr>
							<p>E-mail: '.$r['user_email'].'</p>
							<hr>
							<p>Adresa: '.$r['adresa'].'</p>
							<hr>
							<p>Telefon: '.$r['nrTel'].'</p>
							<hr>
							<a class ="modifica-button" href="modificaDatele.php?">Modifica datele</a>
							</div>

							';


					}
		 

?>







</div>
</div>
<?php include('footer.php'); ?>

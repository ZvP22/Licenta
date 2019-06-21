<?php include('header.php'); ?>



  </div>
	</div>
<div class="main-cointaner">
	<div class="flex-container-sign">
	<div class="main-wraper">
		
		<h2 align="center">Inregistreaza-te</h2>
		<form class="signup-form" action="includes/signup-back.php" method="POST">
			
			<input type= "text" name="first" placeholder="Nume">
		
			<input type= "text" name="last" placeholder="Prenume">
			<input type= "text" name="adresa" placeholder="Adresa Completa">
			<input type= "text" name="nrTel" placeholder="Numar telefon">
			<input type= "text" name="email" placeholder="E-mail">
			<input type= "text" name="uid" placeholder="Nume utilizator">
			<input type= "password" name="pwd" placeholder="Parola">

			<button type="submit" name="submit">Trimite</button>
		</form>
</div>
	</div>


<?php include('footer.php'); ?>

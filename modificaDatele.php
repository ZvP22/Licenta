<?php include('header.php'); ?>
<div class="main-cointaner">
	<br>
	<div class="flex-container-mod-date">
	<div class="main-wraper">
		
		<h2 align="center">Modifica datele personale</h2>
		<form class="mod-form" action="includes/modificaDatele-back.php" method="POST">
			<input type= "text" name="first" placeholder="Nume">
			<input type= "text" name="last" placeholder="Prenume">
			<input type= "text" name="adresa" placeholder="Adresa">
			<input type= "text" name="nrTel" placeholder="Numar telefon">
			

			<button type="submit" name="submit">Modifica</button>
		</form>
</div>
	</div>



</div>
<?php include('footer.php'); ?>
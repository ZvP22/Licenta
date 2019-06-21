<?php include('header.php'); ?>
	

	


<div class="main-cointaner">
	<br>
	<div class="flex-container-adauga">
	<div class="main-wraper">
		<h2 align="center">Adauga un produs</h2>
		<form class="adaugare-form" action="includes/adaugaprouse-back.php" method="POST">
			
			<input type= "text" name="nume" placeholder="Numele prodului">
			<input type= "text" name="img" placeholder="Adresa imaginii">
			<input type= "text" name="pret" placeholder="Pret prodului">
			<input type= "text" name="categorie" placeholder="Categoria produsului">
			<input type= "text" name="descriere" placeholder="Descriere prosului">
			

			<button class="adauga-produs" type="submit" name="submit">Adauga</button>
		</form>
</div>
	</div>



</div>
<?php include('footer.php'); ?>



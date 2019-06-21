<?php include('header.php'); ?>

	<div class="content">



<?php
	session_start();
	include_once 'includes/connection.php';
	$page = $_GET['pg'];
 
$sql = " SELECT * FROM users WHERE role = '0'";
					$res = mysqli_query($conn, $sql);
						echo '<h2 align="center">Lista utilizatori</h2>';
					while($r = mysqli_fetch_assoc($res)) 
							{
								
								echo '<div class= "user-table">
								<table>
								<tr>
								<th>ID</th>
								<th>Nume</th>
								<th>E-mail</th>
								<th>Username</th>
								<th>Numar Telefon</th>
								</tr>
								'
								;
								echo '<tr>
								<td>' . $r['user_id'] . '</td>
								<td>' . $r['user_first'] .'</td>
								<td>'. $r['user_email'] .'</td> 
								<td>' .$r['user_uid'] . '</td>
								<td>'. $r['nrTel'] .'</td>
								<td><a class ="delete-button" href="deluser.php?id='.$r['user_id'].'">Sterge utilizatorul</a></td>
								</tr> ';
								
								
								
								
								echo '</table></div><br/>';
								
	
?>




<?php
}
?>

</div>
<?php include('footer.php'); ?>
<?php
session_start();
include_once 'includes/connection.php';
if(isset($_GET['id'])){
$del = $_GET['id'];	

$sql = "DELETE FROM comenzi WHERE id='$del';";
mysqli_query($conn, $sql);

}
$page = $_GET['pg'];
header('location: '.$page.'.php?status=success');
?>
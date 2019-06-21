<?php
session_start();
include_once 'includes/connection.php';
if(isset($_GET['id'])){
$del = $_GET['id'];	

$sql = "UPDATE comenzi SET status = 1 WHERE id = $del; ";
mysqli_query($conn, $sql);

}
header('location:comenzinoi.php');
?>
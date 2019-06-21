<?php 
session_start();
include_once 'includes/connection.php';
$cartitems = explode(",", $items);
if(isset($_GET['id'])){
$del = $_GET['id'];
$sql = "DELETE FROM wishlist WHERE id='$del';";
mysqli_query($conn, $sql);

}

header('location:wishlist.php');
?>
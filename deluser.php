<?php
session_start();
include_once 'includes/connection.php';
if(isset($_GET['id'])){
$del = $_GET['id'];
$sql = "DELETE FROM users WHERE user_id = '$del';";
mysqli_query($conn, $sql);

}
header('location:users.php');
?>
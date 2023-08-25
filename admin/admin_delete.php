<?php
include 'config.php';

if(isset($_GET['id'])){
   $user_id = $_GET['id'];
   $delete_query = "DELETE FROM `users_table` WHERE id = $user_id";
   mysqli_query($conn, $delete_query) or die('delete query failed');
   header('location: store.php');
} else {
   header('location: store.php');
}
?>

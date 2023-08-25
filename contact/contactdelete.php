<?php
include 'config.php';

if(isset($_GET['contact_id'])){
   $user_id = $_GET['contact_id'];
   $delete_query = "DELETE FROM `user_table` WHERE id = $user_id";
   mysqli_query($conn, $delete_query) or die('delete query failed');
   header('location: contactdata.php');
} else {
   header('location: contactdata.php');
}
?>

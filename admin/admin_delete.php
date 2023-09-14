<?php
include '../dbconnect.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
   $adminId = $_GET['id'];
   
   $deleteQuery = "DELETE FROM `users_table` WHERE id = $adminId";

   if(mysqli_query($conn, $deleteQuery)) {
      echo "Admin deleted successfully.";
      header('location: storeAdminDetails.php');
   } else {
      echo "Error deleting admin: " . mysqli_error($conn);
   }
} else {
   echo "Invalid admin ID.";
}
?>
<?php
include '../dbconnect.php';

if(isset($_GET['id'])){
   $user_id = $_GET['id'];
   $delete_query = "DELETE FROM `form` WHERE id = $user_id";
   $deleter_res = mysqli_query($conn, $delete_query) or die('delete query failed');
   if($delete_res) {
    echo "Product Deleted Successfully.";
    header('location: manageCustomer.php');
} else {
    echo "Product Deletion Failed.";
    header('location: manageCustomer.php');
}
 
} 
?>

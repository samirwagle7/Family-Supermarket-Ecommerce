<?php
include 'dbconnect.php';

$select = mysqli_query($conn, "SELECT * FROM `form`") or die('query failed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Data</title>
   <link rel="stylesheet" href="./css/customer.css">

   
</head>
<body>
   
<div class="cd-container">
   <h2>User Data</h2>

   <!-- Display data in a table -->
   <table class="user-table">
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Email</th>
         <th>Password</th>
         <th>Phone</th>
         <th>Action</th>
      </tr>
      <?php
      while ($row = mysqli_fetch_assoc($select)) {
         echo '<tr>';
         echo '<td>' . $row['id'] . '</td>';
         echo '<td>' . $row['name'] . '</td>';
         echo '<td>' . $row['email'] . '</td>';
         echo '<td>' . $row['password'] . '</td>';
      
         echo '<td>' . $row['phone'] . '</td>';
     
     
         echo '<td><a href="updateCustomer.php?id=' . $row['id'] . '">Update</a> | <a href="deleteCustomer.php?id=' . $row['id'] . '">Delete</a></td>';
         echo '</tr>';
      }
      ?>
   </table>
</div>

</body>
</html>

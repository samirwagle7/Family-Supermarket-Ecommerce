<?php
include '../dbconnect.php';

$select = mysqli_query($conn, "SELECT * FROM `users_table`") or die('query failed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Data</title>

   <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f3f3f3;
         margin: 0;
         padding: 0;
      }

      .container {
         margin: 20px auto;
         width: 80%;
         padding: 20px;
         background-color: #f7f7f7;
         box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      }

      h2 {
         font-size: 24px;
         margin-bottom: 20px;
      }

      .user-table {
         width: 100%;
         border-collapse: collapse;
         background-color: #fff;
         border: 1px solid #ccc;
      }

      .user-table th,
      .user-table td {
         padding: 10px;
         text-align: left;
      }

      .user-table th {
         background-color: #007bff;
         color: #fff;
      }

      .user-table tr:nth-child(even) {
         background-color: #f2f2f2;
      }

      .user-table a {
         color: #007bff;
         text-decoration: none;
      }

      .user-table a:hover {
         text-decoration: underline;
      }
   </style>
</head>
<body>
   
<div class="container">
   <h2>Admin Data</h2>

   <!-- Display data in a table -->
   <table class="user-table">
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Email</th>
         <th>Phone</th>
         <th>Action</th>
      </tr>
      <?php
      while ($row = mysqli_fetch_assoc($select)) {
         echo '<tr>';
         echo '<td>' . $row['id'] . '</td>';
         echo '<td>' . $row['name'] . '</td>';
         echo '<td>' . $row['email'] . '</td>';
         echo '<td>' . $row['phone'] . '</td>';
     
     
         echo '<td><a href="update.php?id=' . $row['id'] . '"></a> | <a href="admin_delete.php?id=' . $row['id'] . '">Remove</a></td>';
         echo '</tr>';
      }
      ?>
   </table>
</div>

</body>
</html>

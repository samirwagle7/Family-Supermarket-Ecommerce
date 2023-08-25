<?php
include '../dbconnect.php';

$select = mysqli_query($conn, "SELECT * FROM `contact_tbl`") or die('query failed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Data</title>
</head>
<body>
   
<div class="contactdata-container">
   <h2>Contact Table</h2>
   <!-- Display data in a table -->
   <table class="con-usr-tbl">
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Email</th>
        
         <th>Phone</th>
    <th>subject</th>
    <th>Message</th>
         <th>Action</th>
      </tr>
      <?php
      while ($row = mysqli_fetch_assoc($select)) {
         echo '<tr>';
         echo '<td>' . $row['id'] . '</td>';
         echo '<td>' . $row['name'] . '</td>';
         echo '<td>' . $row['email'] . '</td>';
         echo '<td>' . $row['phone'] . '</td>';
         echo '<td>' . $row['subject'] . '</td>';
        
         echo '<td>' . $row['message'] . '</td>';
     
     
         echo '<td><a href="update.php?id=' . $row['id'] . '"></a> <a href="delete.php?id=' . $row['id'] . '">Remove</a></td>';
         echo '</tr>';
      }
      ?>
   </table>
</div>

</body>
</html>

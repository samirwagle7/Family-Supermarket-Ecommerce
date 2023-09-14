<?php
include '../dbconnect.php';
session_start();

$select = mysqli_query($conn, "SELECT * FROM contact_tbl") or die('query failed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce-Samir Wagle</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/contact.css">
    <script src="https://kit.fontawesome.com/18e31dbed1.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Main Dashboard -->
    <section id="dashboard">
        <div class="left-dash-sec section-p1">
             
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
         echo '<td>' . $row['contact_id'] . '</td>';
         echo '<td>' . $row['name'] . '</td>';
         echo '<td>' . $row['email'] . '</td>';
         echo '<td>' . $row['number'] . '</td>';
         echo '<td>' . $row['subject'] . '</td>';
        
         echo '<td>' . $row['message'] . '</td>';
     
     
         echo '<td><a href="update.php?id=' . $row['contact_id'] . '"></a> <a href="contactdelete.php?id=' . $row['contact_id'] . '">Remove</a></td>';
         echo '</tr>';
      }
      ?>
   </table>
</div>
        </div>

        <div class="right-dash-sec-customer">
            <div class="sidebar">
                    <h6>User Details</h6>
                    <p><?php echo $_SESSION['admin_name']; ?> </p>
                    
                
                <nav>
                    <ul>
                        <li><a href="../admin/admin.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li><a href="../admin/manageProducts.php"><i class="fas fa-box-open"></i> Product Management</a></li>
                        <li><a href="../admin/addProduct.php"><i class="fas fa-tags"></i>Add Product</a></li>
                        <li><a href="../admin/orders.php"><i class="fas fa-shopping-cart"></i> Order Management</a></li>
                        <li><a href="#"><i class="fas fa-credit-card"></i> Payment Option Management</a></li>
                        <li><a href="#"><i class="fas fa-file"></i> Page Management</a></li>
                        <li><a href="../admin/manageCustomer.php"><i class="fas fa-users"></i>Customer Management</a></li>
                        <li><a class="active" href="#"><i class="fas fa-message"></i>Contact Message</a></li>
                
                    </ul>
                </nav>
                <div class="setting">
                    <a><i class="fa-solid fa-gear"></i>Setting</a>
                    <a href="adminLogout.php"><i class="fa-solid fa-right-from-bracket"></i>Log Out</a>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>






<?php
include '../dbconnect.php';
session_start();

// Fetch the admin's name from the database based on the stored user ID
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $admin_query = mysqli_query($conn, "SELECT * FROM users_table WHERE id = '$user_id'");
    $adminData = mysqli_fetch_assoc($admin_query);

    // Store the admin's name in a session variable
    $_SESSION['admin_name'] = $adminData['name'];

    $select = mysqli_query($conn, "SELECT * FROM `form` LIMIT 2") or die('query failed');
    $customer = mysqli_query($conn, "SELECT * FROM `form`") or die('query failed');
} else {
    echo "User ID is not set";
    header('location: admin_login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/customer.css">
    <script src="https://kit.fontawesome.com/18e31dbed1.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Main Dashboard -->
    <section id="dashboard">
        <div class="left-dash-sec section-p1">
            <h2>Welcome To Admin Dashboard <?php echo $adminData['name']?></h2>
            <div class="recent-order section-m1">
                <div class="order-head">
                    <h3>Recent Customers</h3>
                    <button onclick="window.location.href='manageCustomer.php'">View All</button>
                </div>
                    <!-- Display data in a table -->
                <div class="container">
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
                        
                        
                            echo '<td><a href="../updateCustomer.php?id=' . $row['id'] . '">Update</a> | <a href="deleteCustomer.php?id=' . $row['id'] . '">Remove</a></td>';
                            echo '</tr>';
                        }
                    ?>
                    </table>
                </div>
            </div>

            <div class="recent-order">           
                <div class="order-head">
                    <h3>Recent orders</h3>
                    <button onclick="window.location.href='orders.php'">View All</button>
                </div>
                        <!-- Display data in a table -->
                <div class="container">
                    <!-- Display data in a table -->
                    <table class="user-table">
                        <tr>
                            <th>Order ID</th>
                            <th>Product ID</th>
                            <th>Customer ID</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Product Name(Quantity)</th>
                            <th>Payment Mode</th>
                            <th>Total Amount</th>
                        </tr>
                        <?php
                        // Fetch data from the orders table
                        $sql = "SELECT * FROM orders LIMIT 2";
                        $result = mysqli_query($conn, $sql);
                        $orders = mysqli_query($conn, "SELECT * FROM orders") or die('query failed'); // for showing total orders

                        if (mysqli_num_rows($result) > 0 ) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                $orderID = $row['order_id'];
                                $productID = $row['product_id'];
                                $customerID = $row['customer_id'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $address = $row['address'];

                                $products = $row['products'];
                                $payment_mode = $row['payment_mode'];
                                $totalAmount = $row['paid_amount'];

                                // Output the data in a table row
                                echo '<tr>';
                                echo '<td>' . $orderID . '</td>';
                                echo '<td>' . $productID . '</td>';
                                echo '<td>' . $customerID . '</td>';
                                echo '<td>' . $email . '</td>';
                                echo '<td>' . $phone . '</td>';
                                echo '<td>' . $address . '</td>';
                                echo '<td>' . $products . '</td>';
                                echo '<td>' . $payment_mode . '</td>';
                                echo '<td>' . $totalAmount . '</td>';
                                echo '</tr>';
                            }

                        } else {
                            echo '<tr><td colspan="4">No orders found.</td></tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>
            <!-- Total Details -->
            <div class="total-details-con">
                <div class="total-details">
                    <?php $totalOrders= mysqli_num_rows($orders);?>
                    <p><?php echo $totalOrders;?></p>
                    <h3>Total Orders</h3>
                </div>
                <div class="total-details">

                <?php
                    // Initialize a variable to store the total earnings
                   // Calculate the total earnings
                    $totalEarnings = 0;
                    $totalEarn = mysqli_query($conn, "SELECT paid_amount FROM orders") or die('query failed');
                    while ($row = mysqli_fetch_assoc($totalEarn)) {
                        $totalEarnings += $row['paid_amount'];
                    }
                ?>
                    <p>Rs.<?php echo $totalEarnings;?></p>
                    <h3>Total Earnings</h3>
                </div>
                <div class="total-details">
                    <?php $totalCustomers= mysqli_num_rows($customer);?>
                    <p><?php echo $totalCustomers;?></p>
                    <h3>Total Customers</h3>
                </div>
            </div>          
        </div>

        <div class="right-dash-sec">
            <div class="sidebar">
                <div class='name'>
                    <span>Username</span>
                    <h3><?php echo $_SESSION['admin_name']; ?></h3>
                </div>
                <nav>
                    <ul>
                        <li><a class="active" href="admin.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li><a href="manageProducts.php"><i class="fas fa-box-open"></i> Product Management</a></li>
                        <li><a href="addProduct.php"><i class="fas fa-tags"></i>Add Products</a></li>
                        <li><a href="orders.php"><i class="fas fa-shopping-cart"></i> Order Management</a></li>
                        <li><a href="#"><i class="fas fa-credit-card"></i> Payment Option Management</a></li>
                        <li><a href="#"><i class="fas fa-file"></i> Page Management</a></li>
                        <li><a href="manageCustomer.php"><i class="fas fa-users"></i> Customer Management</a></li>
                        <li><a href="../contact/contactdata.php"><i class="fas fa-message"></i>Contact Message</a></li>
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
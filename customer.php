<?php 
    $activePage = '';
    include "header.php"; 
    // session_start(); // already in header.php
?>
<?php
    include 'dbconnect.php';

// Fetch the admin's name from the database based on the stored user ID
if(isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];

    $customer_query = mysqli_query($conn, "SELECT * FROM form WHERE id = '$customer_id'");
    $customerData = mysqli_fetch_assoc($customer_query);

    // Store the admin's name in a session variable
    $_SESSION['customer_name'] = $customerData['name'];

} else {
    echo "User ID is not set";
    header('location: login.php');
}
?>


<section id="dashboard">
    <div class="left-dash-sec section-p1">
        <h2>Welcome <?php echo $customerData['name'] ?></h2>
        <div class="recent-order">
                <div class="order-head">
                    <h3>Recent Orders</h3>
                    <button onclick="allOrders.php">View All</button>
                </div>
                    <!-- Display data in a table -->
                <div class="container">
                    <!-- Display data in a table -->
                    <table class="user-table">
                        <tr>
                            <th>Order</th>
                            <th>Product Name(Quantity)</th>
                            
                            <th>Total Amount</th>
                        </tr>
                        <?php
                        

                        // Fetch data from the orders table
                        $sql = "SELECT * FROM orders WHERE customer_id = '$customer_id' LIMIT 5";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            $counter = 1; // Initialize a counter for serial numbers

                            while ($row = mysqli_fetch_assoc($result)) {
                                $products = $row['products'];
                                
                                $totalAmount = $row['paid_amount'];

                                // Output the data in a table row
                                echo '<tr>';
                                echo '<td>' . $counter . '</td>';
                                echo '<td>' . $products . '</td>';
                                echo '<td>' . $totalAmount . '</td>';
                                echo '</tr>';

                                $counter++; // Increment the counter for the next row
                            }
                        } else {
                            echo '<tr><td colspan="4">No recent orders found.</td></tr>';
                        }

                        // Count the number of orders
                        $totalOrders = mysqli_num_rows($result);
                        // Close the database connection when done
                        mysqli_close($conn);
                        ?>
                    </table>
                </div>
            </div>
            <!-- Total Details -->
            <div class="total-details-con">
                <div class="total-details">
                    <p><?php echo "$totalOrders" ?></p>
                    <h3>Total Orders</h3>
                </div>
            </div> 
    </div>
    

    <div class="right-dash-sec-customer">
        <div class="sidebar">
            <div class='name'>
                <span>Username</span>
                <h3><?php echo $customerData['name'] ?></h3>
            </div>
            <nav>
                <ul>
                    <li><a class="active" href="customer.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="#"><i class="fas fa-user-cog"></i> Management Account</a></li>
                    <li><a href="allOrders.php"><i class="fas fa-box-open"></i> Order Product's List</a></li>
                    <li><a href="#"><i class="fas fa-shopping-cart"></i> Return and Cancellation</a></li>
                    <li><a href="#"><i class="fas fa-credit-card"></i> Purchase History</a></li>
                    <li><a href="#"><i class="fas fa-heart"></i> Favourites</a></li>
                    <li><a href="#"><i class="fas fa-truck"></i> Track My Order</a></li>
                </ul>
            </nav>
            <div class="setting">
                <a href="#"><i class="fa-solid fa-gear"></i>Setting</a>
                <a href="customerLogout.php" ><i class="fa-solid fa-right-from-bracket"></i>Log Out</a>
            </div>
        </div>
    </div>
</section>
                        
<!-- Newsletter Section -->
<!-- <section id="newsletter-section" class="section-p1">
    <div class="newstext">
        <h4>Sign Up for Newsletter</h4>
        <p>Get Updates about latest products and <span>Special Offers</span>.</p>
    </div>
    <form action="login.html" class="form">
        <input type="text" placeholder="Your Email Address">
        <button type="submit" class="normal" >Sign Up</button>
    </form>
</section> -->

<!-- footer section -->
<footer class="section-p1">
        <div class="col">
            <a href="index.php"><img class="logo" src="./img/logo.png" alt="logo"></a> 
            <h4>Contact</h4>
            <p> <strong>Address:</strong> Chandragiri - 2, Kathmandu, Nepal, 44600 </p>
            <p> <strong>Phone:</strong> 9863948660</p>
            <p> <strong>Hours:</strong> 10:00 - 17:00, Sun - Fri</p>
            <div class="follow">
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="about.php">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="termsCondtions.php">Terms & Conditions</a>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="login.php">Sign In</a>
            <a href="cart.php">View cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="apple_store">
                <img src="img/pay/play.jpg" alt="googlePlay_store">

            </div>
            <p>Secured Payment Gateways</p>
            <img src="img/pay/pay.png" alt="payment methods">
        </div>

        <div class="copyright">
            <p>Copyright © 2023, Family Supermarket - All Rights Reserved</p>
        </div>
    </footer>

<script src="script.js"></script>

<?php include "footer.php" ?>
<?php 
    require 'dbconnect.php';
    // Check if the 'id' parameter is set and is a valid number
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $product_id = $_GET['id'];
        $sql = "SELECT * FROM product_tbl WHERE `id` = $product_id";
        $result = mysqli_query($conn, $sql);

        // Check if the query was successful and if the product was found
        if ($result && mysqli_num_rows($result) > 0) {
            $productDetails = mysqli_fetch_assoc($result);
        } else {
            // Product not found, handle this case as needed
            $productDetails = null;
        }
    } else {
        // Invalid or missing 'id' parameter, handle this case as needed
        $productDetails = null;
    }
?>

<?php 
    $activePage = 'products';
    include "header.php";
?>

<!-- Product Details Section -->
<section id="pro-details" class="section-p1">
    <?php if ($productDetails): ?>
    <div class="single-pro-image">
        <img src="<?php echo $productDetails['image']; ?>" alt="product" id="main-img">
        
        <!-- Rest of the image group code -->
    </div>

    <div class="single-pro-details">
        <h6><?php echo $productDetails['product_name']; ?></h6>
        <h4><?php echo $productDetails['detail']; ?></h4>
        <h2>Rs. <?php echo $productDetails['price']; ?></h2>
        <select>
            <option>KG</option>
            <option>Gram</option>
            <option>Lbs</option>
        </select>
        <input type="number" value="1" min="1">
        <button onclick="addToCart('<?php echo $productDetails['product_name']; ?>', <?php echo $productDetails['price']; ?>, '<?php echo $productDetails['image']; ?>')">Add To Cart</button>
        <h4>Details</h4>
        <p><?php echo $productDetails['description']; ?></p>
    </div>
    <?php else: ?>
    <div class="single-pro-details">
        <p>Product not found.</p>
    </div>
    <?php endif; ?>
</section>

    <!-- features section same as home -->
    <section id="feature" class="section-p1">
        <div class="feature-box">
                <img src="img/features/f1.png" alt="shopNow">
                <h6>Free Shipping</h6>
        </div>
        <div class="feature-box">
                <img src="img/features/f2.png" alt="shopNow">
                <h6>Discount!</h6>
        </div>
        <div class="feature-box">
                <img src="img/features/f3.png" alt="shopNow">
                <h6>Promotions</h6>
        </div>
        <div class="feature-box">
                <img src="img/features/f4.png" alt="shopNow">
                <h6>Excusive</h6>
        </div>
        <div class="feature-box">
                <img src="img/features/f5.png" alt="shopNow">
                <h6>Happy Sell</h6>
        </div>
        <div class="feature-box">
                <img src="img/features/f6.png" alt="shopNow">
                <h6>F24/7 Support</h6>
        </div>
    </section>
    <!-- Newsletter Section -->
    <section id="newsletter-section" class="section-p1">
        <div class="newstext">
            <h4>Sign Up for Newsletter</h4>
            <p>Get Updates about latest products and <span>Special Offers</span>.</p>
        </div>
        <form action="login.html" class="form">
            <input type="text" placeholder="Your Email Address">
            <button type="submit" class="normal" >Sign Up</button>
        </form>
    </section>
    
    <!-- footer section -->
    <footer class="section-p1">
        <div class="col">
            <a href="index.html"><img class="logo" src="./img/logo.png" alt="logo"></a> 
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
            <a href="about.html">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="termsCondtions.html">Terms & Conditions</a>
            <a href="contact.html">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="login.html">Sign In</a>
            <a href="cart.html">View cart</a>
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
            <p>Copyright © 2023, Samir Wagle - All Rights Reserved</p>
        </div>
    </footer>
    
    <script src="script.js"></script>

    <?php include "footer.php" ?>
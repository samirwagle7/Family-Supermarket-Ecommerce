<?php
$activePage = 'products';
include "header.php";
require 'dbconnect.php';
// session_start();

if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM product_tbl WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $productDetails = mysqli_fetch_assoc($result);
    } else {
        $productDetails = null;
    }
    
} else {
    $productDetails = null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['id'];
    $product_name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $quantity = $_POST['quantity'];
    $total_price = $price * $quantity;

    // Insert data into cart table
    $insert_sql = "INSERT INTO cart (product_id, product_name, product_price, product_image, quantity, total_price)
                   VALUES ('$product_id', '$product_name', $price, '$image', $quantity, $total_price)";


    $insert_result = mysqli_query($conn, $insert_sql);

    if ($insert_result) {
        echo "<script>alert('Item added to cart successfully');</script>";
    } else {
        echo "<script>alert('Error adding item to cart: " . mysqli_error($conn) . "');</script>";
    }
}


?>

<section id="pro-details" class="section-p1">
    <?php if ($productDetails): ?>
    <div class="single-pro-image">
        <img src="admin/uploads/<?php echo $productDetails['image']; ?>" alt="product" id="main-img">
    </div>

    <div class="single-pro-details">
        <h3><?php echo $productDetails['product_name']; ?></h3>
        <h2>Rs. <?php echo $productDetails['price']; ?></h2>
        <select>
            <option>KG</option>
            <option>Gram</option>
            <option>Lbs</option> 
        </select>      
    <form action="" method="post">
        <input type="number" name="quantity" value="1">
        <input type="hidden" name="id" value="<?php echo $productDetails['product_id']; ?>">
        
        <input type="hidden" name="name" value="<?php echo $productDetails['product_name']; ?>">
        <input type="hidden" name="price" value="<?php echo $productDetails['price']; ?>">
        <input type="hidden" name="image" value="<?php echo $productDetails['image']; ?>">
        <button type="submit" name="add_to_cart">Add To Cart</button>
    </form>
    <h4>Details</h4>
        <p><?php echo $productDetails['description']; ?></p>
    </div>
    <?php else: ?>
    <div class="single-pro-details">
        <p>Product not found.</p>
    </div>
    
    <?php endif; ?>
</section>

<!-- feature section -->
<div class="ft-pro home-pg">
        <h2>Features</h2>
</div>
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
        <p>Copyright © 2023, Samir Wagle - All Rights Reserved</p>
    </div>
</footer>
<script src="script.js"></script>
<?php include "footer.php"; ?>
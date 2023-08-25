<?php 
    require 'dbconnect.php';
    $sql = "SELECT * FROM product_tbl";
    $all_product = mysqli_query($conn, $sql);
?>

<?php 
    $activePage = 'products';
    include "header.php";
?>

    <!-- front-headline -->
    <section id="front-page">
        <h2>#Stay Home</h2>
        <p>Get the items you want in Your Home wihtin a click~</p>
    </section>
     
    <!-- Product Section -->
    <section class="products">
        <div class="pro-container section-p1">
            <?php 
                while($row = mysqli_fetch_assoc($all_product)):
            ?>

            <div class="product" onclick="window.location.href='singleProduct.php?product_id=<?php echo $row['product_id']; ?>'"> 
                    <img src="./admin/uploads/<?php echo $row['image']; ?>" alt="pro-image" id="pro-imagedb">
                <div class="description">   
                    <h5><?php echo $row["product_name"]; ?>  </h5> 
                    <div class="star"> 
                        <i class="fa-solid fa-star"></i>    
                        <i class="fa-solid fa-star"></i>    
                        <i class="fa-solid fa-star"></i>    
                        <i class="fa-solid fa-star"></i>    
                        <i class="fa-solid fa-star"></i>    
                    </div>
                    <h4>RS.<?php echo $row["price"]; ?></h4>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <?php endwhile; ?> 
        </div>
                  
</section>
    

    <!-- pagination section -->
    <div id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa-sharp fa-solid fa-long-arrow-right"></i></a>
    </div>

    
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

    <?php include "footer.php" ?>
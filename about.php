<?php 
    $activePage = 'about';
    include "header.php";
?>
    
    <!-- front-headline -->
    <section id="front-page" class="about-page">
        <h2>#About Us</h2>
        <p>Know more... #about the Family Supermarket's Grocery Store</p>
    </section>
    
    <section id="about-front" class="section-p1 section-m1">
        <img src="img/about/gro-ani.jpg" alt="banner">
        <div>
            <h2>Who We are?</h2>
            <p class="section-p1">At Family Supermarket's Grocery Store, we are dedicated to providing the finest selection of fresh and high-quality groceries to our valued customers. With a commitment to excellence, we strive to offer a diverse range of products and ensure a seamless shopping experience. Trust us for all your grocery needs and experience convenience and satisfaction like never before.</p>
            <!-- <abbr title="">We provide you the Best quality with Most valueabe products</abbr> -->
            
        </div>
    </section>

    <!-- feature section -->
    <div class="ft-pro">
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
            <p>Copyright © 2023, Family Supermarket - All Rights Reserved</p>
        </div>
    </footer>


    <script src="script.js"></script>

    <?php include "footer.php" ?>


<?php 
    $activePage = 'cart';
    include "header.php";
?>
    
    <!-- front-headline -->
    <section id="front-page">
        <h2>#Stay Home</h2>
        <p>Get the items you want in Your Home wihtin a click~</p>
    </section>
 
    <!-- cart section -->
    <div id="cart" class="section-p1">
        <table>
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Proudct</td>
                    <td>Pirce</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><a href=""><i class="fa-sharp fa-regular fa-circle-xmark"></i></a></td>
                    <td><img class="cart-img" src="img/products/cauli-flower.jpg" alt=""></td>
                    <td>CauliFlower</td>
                    <td>Rs.1099</td>
                    <td><input type="number" value="2"></td>
                    <td>Rs.2198</td>
                </tr>
                <tr>
                    <td><a href=""><i class="fa-sharp fa-regular fa-circle-xmark"></i></a></td>
                    <td><img class="cart-img" src="img/products/cow-milk.jpg" alt=""></td>
                    <td>Milk</td>
                    <td>Rs.1099</td>
                    <td><input type="number" value="2"></td>
                    <td>Rs.2198</td>
                </tr>
                <tr>
                    <td><a href=""><i class="fa-sharp fa-regular fa-circle-xmark"></i></a></td>
                    <td><img class="cart-img" src="img/products/oreo.jpg" alt=""></td>
                    <td>Chocolate Cookie</td>
                    <td>Rs.1099</td>
                    <td><input type="number" value="2"></td>
                    <td>Rs.2198</td>
                </tr>
            </table>
    </div>

    <?php 

    ?>


    <!-- add and checkout -->
    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Appy Coupons</h3>
            <div class="apply">
                <input type="text" placeholder="Enter your coupon">
                <button class="apply-btn">Apply</button>
            </div>
        </div>

        <div id="sub-total">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>RS. 3099</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>RS. 9099</strong></td>
                </tr>
            </table>
            <a href="checkout.html" class="subtotal-btn">Proceed to Checkout</a>
        </div>
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
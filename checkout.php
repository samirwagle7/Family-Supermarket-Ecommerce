<?php include "header.php"; ?>

    <!-- Checkout Paymennt page -->
    <div class="checkout-container">
        <form action="payment.html" class="checkout-form">
            <h2>Checkout</h2>
            <div class="input-group">
                <input type="text" placeholder="Full Name" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email Address" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Address" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="City" required>
                <input type="text" placeholder="Postal Code" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Phone Number" required>
            </div>
            
            <button type="submit" class="checkout-btn">Checkout</button>
        </form>
    </div>

    <?php include "footer.php" ?>
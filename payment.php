<?php include "header.php"; ?>

    <!-- payment option -->
<div class="pay-container section-m1 section-p1">
    <div class="pay-opt" onclick="selectPaymentOption(this)">
        <img src="./img/pay/esewa.jpg" alt="esewa">
    </div>
    <div class="pay-opt" onclick="selectPaymentOption(this)">
        <img src="./img/pay/khalti.jpg" alt="khalti">
    </div>
    <div class="pay-opt" onclick="selectPaymentOption(this)">
        <img src="./img/pay/ime.jpg" alt="ime-pay">
    </div>
    <div class="pay-opt" onclick="selectPaymentOption(this)">
        <img src="./img/pay/cash.jpg" alt="cash on Delivery">
    </div>
</div>

<div class="order-container">
    <a href="thankyou.html" class="order-btn" onclick="placeOrder()">Place Order</a>
</div>


    <script src="script.js"></script>

<?php include "footer.php" ?>


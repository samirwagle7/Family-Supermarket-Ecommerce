

<?php 
    $activePage = '';
    include "header.php";
?>
    
<!-- front-headline -->
<section id="front-page">
    <h2>#Stay Home</h2>
    <p>Get the items you want in Your Home wihtin a click~</p>
</section>

<!-- cart section -->
<div id="cart">
    <div style="display:<?php if (isset($_SESSION['showAlert'])) {
          echo $_SESSION['showAlert'];
        } else {
          echo 'none';
        } unset($_SESSION['showAlert']); ?>" class="alert">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?php if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
        } unset($_SESSION['showAlert']); ?></strong>
    </div>

    <table>
      <thead>
        <tr>
          <td colspan="7"><h4>Products in your cart!</h4></td>
        </tr>

        <tr> 
          <th>ID</th>
          <th>Image</th>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th><a href="action.php?clear=all" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a></th>
        </tr>

      </thead>
      
      <tbody>
        <?php
          require 'dbconnect.php';
          $stmt = $conn->prepare('SELECT * FROM cart');
          $stmt->execute();
          $result = $stmt->get_result();
          $grand_total = 0;
          while ($row = $result->fetch_assoc()):
        ?>

        <tr>
          <td><?= $row['cart_id'] ?></td>
          <input type="hidden" class="pid" value="<?= $row['cart_id'] ?>">

          <td><img src="<?= $row['product_image'] ?>" width="50"></td>
          <td><?= $row['product_name'] ?></td>
          <td><i class="fa-solid fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2); ?></td>
          <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
          <td><input type="number" class="form-control itemQty" value="<?= $row['quantity'] ?>" style="width:75px;"></td>
          <td><i class="fa-solid fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['total_price'],2); ?></td>
          <td><a href="action.php?remove=<?= $row['cart_id'] ?>" class=" lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a></td>

        </tr>

          <?php $grand_total += $row['total_price']; ?>
          <?php endwhile; ?>

        <tr>
          <td colspan="3"><a href="products.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a></td>
          <td colspan="2"><b>Grand Total</b></td>
          <td><b><i class="fa-solid fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
          <td><a href="checkout.php" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a></td>
        </tr>

      </tbody>
    </table>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script type="text/javascript">

$(document).ready(function() {

  // Change the item quantity
  $(".itemQty").on('change', function() {
    var $el = $(this).closest('tr');

    var pid = $el.find(".pid").val();
    var pprice = $el.find(".pprice").val();
    var qty = $el.find(".itemQty").val();
    location.reload(true);
    $.ajax({
      url: 'action.php',
      method: 'post',
      cache: false,
      data: {
        qty: qty,
        pid: pid,
        pprice: pprice
      },
      success: function(response) {
        console.log(response);
      }
    });
  });

  // Load total no.of items added in the cart and display in the navbar
  load_cart_item_number();

  function load_cart_item_number() {
    $.ajax({
      url: 'action.php',
      method: 'get',
      data: {
        cartItem: "cart_item"
      },
      success: function(response) {
        $("#cart-item").html(response);
      }
    });
  }
});
</script>
  
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
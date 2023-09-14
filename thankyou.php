<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thankyou</title>
    <style>
  .text-center {
  text-align: center;
}

.order-summary {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f7f7f7;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.order-summary h1 {
  font-size: 2.5rem;
  color: #dc3545;
  margin-top: 1rem;
}

.order-summary h2 {
  font-size: 2rem;
  color: #28a745;
  margin-top: 1rem;
}

.order-summary h4 {
  font-size: 1.25rem;
  color: #343a40;
  background-color: #f2f2f2;
  padding: 10px;
  border-radius: 5px;
  margin-top: 1rem;
}

.button-container {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  margin-top: 20px;
}

.button-container a {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border-radius: 5px;
  text-decoration: none;
  font-weight: bold;
  transition: background-color 0.3s;
}

.button-container a:hover {
  background-color: #0056b3;
}

 
</style>
</head>
<body>
<div class="order-summary">
		<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
		<h2 class="text-success">Your Order Placed Successfully!</h2>
		<h4 class="bg-danger text-light rounded p-2">Items Purchased : <?= $products ?></h4>
		<h4>Your Name : <?= $name ?></h4>
		<h4>Your E-mail : <?= $email ?></h4>
		<h4>Your Phone : <?= $phone ?></h4>
		<h4>Total Amount Paid : <?= number_format($grand_total, 2) ?></h4>
		<h4>Payment Mode : <?= $pmode ?></h4>
		<div class="button-container">
		  <a href="products.php"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
		  <a href="customer.php"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Profile</a>
		</div>
	  </div>
</body>
</html>
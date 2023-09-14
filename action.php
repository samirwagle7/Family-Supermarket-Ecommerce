<?php
	session_start();
	require 'dbconnect.php';

	// Add products into the cart table
	if (isset($_POST['pid'])) {
	  $pid = $_POST['pid'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pimage = $_POST['pimage'];
	  $pcode = $_POST['pcode'];
	  $pqty = $_POST['pqty'];
	  $total_price = $pprice * $pqty;

	  $stmt = $conn->prepare('SELECT product_code FROM product_tbl WHERE product_code=?');
	  $stmt->bind_param('s',$pcode);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['product_code'] ?? '';

	  if (!$code) {
	    $query = $conn->prepare('INSERT INTO cart (product_name,product_price,image,quantity,total_price,product_code) VALUES (?,?,?,?,?,?)');
	    $query->bind_param('ssssss',$pname,$pprice,$pimage,$pqty,$total_price,$pcode);
	    $query->execute();

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart </strong>
						</div>';
	  } else {
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
	  }
	}

	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $conn->prepare('SELECT * FROM product_tbl');
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}
 
	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $conn->prepare('DELETE FROM cart WHERE cart_id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:cart.php');
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $conn->prepare('DELETE FROM cart');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:cart.php');
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

	// // Checkout and save customer info in the orders table
	// if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	//   $name = $_POST['name'];
	//   $email = $_POST['email'];
	//   $phone = $_POST['phone'];
	//   $products = $_POST['products'];
	//   $grand_total = $_POST['grand_total'];
	//   $address = $_POST['address'];
	//   $pmode = $_POST['pmode'];

	//   $data = '';

	//   $stmt = $conn->prepare('INSERT INTO orders (username,email,phone,address,payment_mode,products,paid_amount)VALUES(?,?,?,?,?,?,?)');
	//   $stmt->bind_param('sssssss',$name,$email,$phone,$address,$pmode,$products,$grand_total);
	//   $stmt->execute();
	//   $stmt2 = $conn->prepare('DELETE FROM cart');
	//   $stmt2->execute();



	  // Checkout and save customer info in the orders table
if (isset($_POST['action']) && $_POST['action'] == 'order') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $address = $_POST['address'];
    $pmode = $_POST['payment_mode'];

    // Fetch the user ID from the session
    $customer_id = $_SESSION['customer_id'];

    // Fetch product IDs from the cart
    $product_ids = array();
    $stmt = $conn->prepare('SELECT product_id FROM cart');
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $product_ids[] = $row['product_id'];
    }
    $product_ids_str = implode(',', $product_ids);

    // Insert order details into the order table
    $stmt = $conn->prepare('INSERT INTO orders (product_id, customer_id, username, email, phone, address, payment_mode, products, paid_amount) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('iissssssd', $product_ids_str, $customer_id, $name, $email, $phone, $address, $pmode, $products, $grand_total);
    if ($stmt->execute()) {
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Order placed successfully.';
        // Clear the cart after successful order placement
        $stmt2 = $conn->prepare('DELETE FROM cart');
        $stmt2->execute();
		$confirmationMessage = '
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Order Confirmation</title>
			<style>
				/* CSS for the Thank You message */
				.order-success-text {
					height: 80vh; 
                    width: 50vw; 
					text-align: center;
					margin: 0 auto;
					padding: 15px;
					background-color: #f7f7f7;
					border-radius: 10px;
				}
		
				.order-success-text h1 {
					font-size: 2rem;
					color: #dc3545;
				}
		
				.order-success-text h2 {
					font-size: 1.5rem;
					color: #28a745;
				}
		
				.order-success-text h4 {
					font-size: 1rem;
					color: #343a40;
					background-color: #f2f2f2;
					padding: 10px;
					border-radius: 5px;
				}
		
				/* CSS for the Thank You button container */
				.thankyou-button {
					display: flex;
					justify-content: center;
					align-items: center;
					gap: 10px;
					margin-top: 20px;
				}
		
				.thankyou-button a {
					display: inline-block;
					padding: 10px 20px;
					background-color: #1a63b5;
					color: #fff;
					border-radius: 5px;
					text-decoration: none;
					font-weight: bold;
					transition: background-color 0.3s;
				}
		
				.thankyou-button a:hover {
					background-color: #0056b3;
				}
			</style>
		</head>
		<body>
			<div class="order-success-text">
				<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
				<h2 class="text-success">Your Order Placed Successfully!</h2>
				<h4 class="bg-danger text-light rounded p-2">Items Purchased: <?= $products ?></h4>
				<h4>Your Name : ' . $name . '</h4>
				<h4>Your E-mail : ' . $email . '</h4>
				<h4>Your Phone : ' . $phone . '</h4>
				<h4>Total Amount Paid : ' . number_format($grand_total, 2) . '</h4>
				<h4>Payment Mode : ' . $pmode . '</h4>
				<div class="thankyou-button">
					<a href="products.php"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
					<a href="customer.php"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Profile</a>
				</div>
			</div>
		</body>
		</html>
		';
	  echo $confirmationMessage;
        exit();
    } else {
        echo 'Error inserting order: ' . mysqli_error($conn);
    }

}
	  
	
?>

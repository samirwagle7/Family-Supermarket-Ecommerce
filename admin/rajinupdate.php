<?php
require('dbconnection.php'); // Make sure to include your database connection file
session_start();

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productCategory = $_POST['productCategory'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];
    
    // Update the product details in the database
    $sql= "UPDATE products SET name = '$productName', category = '$productCategory', price = '$productPrice', quantity = '$productQuantity', description = '$productDescription' WHERE products.`product_id` = '$product_id'";
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the product list page or show a success message
        header('location:manageProducts.php'); // Change to the appropriate URL
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <!-- Edit Product -->
 <div class="modal" id="edit_product_modal">
                <div class="modal-content">
                    <span class="close" id="close_edit_modal">&times;</span>
                    <h3>Edit Product</h3>
                    <form id="editProductForm" action="#" method="POST" enctype="multipart/form-data">
                        <label for="productName">Product Name:</label>
                        <input type="text" id="productName" name="productName" required>

                        <label for="productDescription">Description:</label>
                        <textarea id="productDescription" name="productDescription" required></textarea>

                        <label for="productCategory">Category:</label>
                        <input type="text" id="productCategory" name="productCategory" required>

                        <label for="productPrice">Pricing:</label>
                        <input type="number" id="productPrice" name="productPrice" step="0.01" required>

                        <label for="productQuantity">Quantity:</label>
                        <input type="number" id="productQuantity" name="productQuantity" min="1" required>

                        <!-- <label for="productImage">Product Image:</label>
                        <input type="file" id="productImage" name="productImage" accept="image/*"> -->
                        <button type="submit">Update Product</button>
                    </form>
                </div>
            </div>
</body>
</html>
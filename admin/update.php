<?php
require "../dbconnect.php";

$p_id = $_GET['product_id'];
$select_product = "SELECT * FROM product_tbl WHERE product_id = '$p_id'";
$select_res = mysqli_query($conn, $select_product);

$statusMsg = "";

if(isset($_POST['submit'])) {
    $product_name = $_POST["product_name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $description = $_POST["description"];
    
    // File upload directory
    $targetDir = "../admin/uploads/";

    if (!empty($_FILES["image"]["name"])) {
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                // Update data in the database
                $sql = "UPDATE product_tbl SET product_name='$product_name', price=$price, quantity=$quantity, image='$fileName', description='$description' WHERE product_id='$p_id'";
                
                if ($conn->query($sql) === TRUE) {
                    $statusMsg = "Product updated successfully";
                } else {
                    $statusMsg = "Error: Failed to update product";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        // Update data in the database without changing the image
        $sql = "UPDATE product_tbl SET product_name='$product_name', price=$price, quantity=$quantity, description='$description' WHERE product_id='$p_id'"; 

        if ($conn->query($sql) === TRUE) {
            $statusMsg = "Product updated successfully";
        } else {
            $statusMsg = "Error: Failed to update product";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<div class="add-pro-container">
    <h3>Update Product</h3>
    <?php if($select_res):
        while($product = mysqli_fetch_assoc($select_res)):
    ?>
    
    <form method="POST" action="#" class="add-pro-form" name="updateProduct" enctype="multipart/form-data">
        <div class="add-pro-group">
            <label class="add-pro-label">Product Name:</label>
            <input type="text" class="add-pro-input" name="product_name" value="<?php echo $product['product_name']; ?>">
        </div>
        
        <div class="add-pro-group">
            <label class="add-pro-label">Price:</label>
            <input type="number" class="add-pro-input" name="price" value="<?php echo $product['price']; ?>">
        </div>
        
        <div class="add-pro-group">
            <label class="add-pro-label">Quantity:</label>
            <input type="number" class="add-pro-input qty" name="quantity" value="<?php echo $product['quantity']; ?>">
        </div>

        <div class="add-pro-group">
            <label class="add-pro-label">Image:</label>
            <input type="file" class="add-pro-input" name="image" accept=".jpg, .jpeg, .png">
        </div>

        <div class="add-pro-group">
            <label class="add-pro-label">Description:</label>
            <textarea class="add-pro-input" name="description"><?php echo $product['description']; ?></textarea>
        </div>
        
        <div class="add-pro-group">
            <input type="submit" class="add-pro-submit" value="Update" name="submit">
            <a href="manageProducts.php" class="add-pro-submit">Go Back</a>
        </div>

        <div class="status-msg">
        <?php echo '<script>alert("' . $statusMsg . '");</script>'; ?>
        </div>
    </form>
    <?php endwhile; 
            endif; ?>
</div>


</body>
</html>

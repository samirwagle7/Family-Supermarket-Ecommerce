<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>All Products</h1>
    <?php 
    require "../dbconnect.php";
    $sql = "SELECT * FROM product_tbl";
    $res =  mysqli_query($conn, $sql);

    if($res): ?>
    <div class="mng-pro">
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; while($product = mysqli_fetch_assoc($res)): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $product['product_id']; ?></td>
                        <td><?php echo $product['product_name']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td><img src="./uploads/<?php echo $product['image']; ?>" alt="pro-image" id="mng-pro-img"></td>
                        <td><?php echo $product['created_at']; ?></td>
                        <td><?php echo $product['updated_at']; ?></td>
                        <td>
                            <a href="update.php?product_id=<?php echo $product['product_id']; ?>" title="Edit">Edit</a>
                            <a href="delete.php?product_id=<?php echo $product['product_id']; ?>" title="Delete">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; endwhile; ?>  
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</body>
</html>



<!-- admin -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://kit.fontawesome.com/18e31dbed1.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Main Dashboard -->
    <section id="dashboard">
        <div class="left-dash-sec section-p1">
            <div class="recent-order">

                <div class="mng-pro-con">
                    <h2>All Products</h2>
                    <?php 
                    require "../dbconnect.php";
                    session_start();
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
                                        <td>
                                            <a href="update.php?product_id=<?php echo $product['product_id']; ?>" title="Edit">Edit</a>
                                            <a href="delete.php?product_id=<?php echo $product['product_id']; ?>" title="Delete" onclick="return confirmDelete();">Delete</a>
                                                <!-- js for aleret msg -->
                                                <script> 
                                                function confirmDelete() {
                                                    return confirm("Are you sure you want to delete this product?");
                                                }
                                                </script>
                                        </td>
                                    </tr>
                                    <?php $i++; endwhile; ?>  
                            </tbody>
                        </table>
                        <button class='generate-pdf' onclick="window.location.href='mngProReport.php'">Generate PDF Report</button>
                    </div>
                    <?php endif; ?>
                </div>
                    
            </div>
        </div>

        <div class="right-dash-sec">
            <div class="sidebar">
                <figure>
                    <img src="./img/people/upw.jpg" alt="admin">
                    <figcaption><?php echo $_SESSION['admin_name']; ?></figcaption>
                </figure>
                <nav>
                    <ul>
                        <li><a href="admin.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li><a class="active" href="manageProducts.php"><i class="fas fa-box-open"></i> Product Management</a></li>
                        <li><a href="addProduct.php"><i class="fas fa-tags"></i>Add Products</a></li>
                        <li><a href="orders.php"><i class="fas fa-shopping-cart"></i> Order Management</a></li>
                        <li><a href="#"><i class="fas fa-credit-card"></i> Payment Option Management</a></li>
                        <li><a href="#"><i class="fas fa-file"></i> Page Management</a></li>
                        <li><a href="manageCustomer.php"><i class="fas fa-users"></i> User Management</a></li>
                        <li><a href="../contact/contactdata.php"><i class="fas fa-message"></i>Contact Message</a></li>
                    </ul>
                </nav>
                <div class="setting">
                    <a><i class="fa-solid fa-gear"></i>Setting</a>
                    <a href="adminLogout.php"><i class="fa-solid fa-right-from-bracket"></i>Log Out</a>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>

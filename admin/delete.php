<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }

  .pro-del-container {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 100%;
    max-width: 400px;
    text-align: center;
  }

  

  .pro-del-container p {
    font-size: 22px;
    margin-top: 20px;
  }

  .pro-del-container button {
    background-color: #3498db;
    border: none;
    color: #ffffff;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
  }

  .pro-del-container button:hover {
    background-color: #2980b9;
  }
</style>
</head>
<body>
  <div class="pro-del-container">
    <?php
    require "../dbconnect.php";

    if(isset($_GET['product_id'])) {
        $p_id = $_GET['product_id'];
        $delete_pro_sql = "DELETE FROM product_tbl WHERE product_id = '$p_id'";
        $delete_res = mysqli_query($conn, $delete_pro_sql);

        if($delete_res) {
            echo '<p>Product Deleted Successfully.</p>';
        } else {
            echo '<p>Product Deletion Failed.</p>';
        }
    }
    $targetPage="manageProducts.php";
    ?>
    <form action="<?php echo $targetPage; ?>" method="get">
      <button type="submit">Go Back</button>
    </form>
  </div>
</body>
</html>

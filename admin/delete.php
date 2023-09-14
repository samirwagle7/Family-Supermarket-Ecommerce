<?php
    require "../dbconnect.php";

    if(isset($_GET['product_id'])) {
        $p_id = $_GET['product_id'];
        $delete_pro_sql = "DELETE FROM product_tbl WHERE product_id = '$p_id'";
        $delete_res = mysqli_query($conn, $delete_pro_sql);

        if($delete_res) {
            echo '<script>alert("Product Deleted Successfully!");</script>';
            header("location: manageProducts.php ");
        } else {
            echo '<script>alert("Product Deletion Failed.!");</script>';
            header("location: manageProducts.php ");
        }
    }
    ?>

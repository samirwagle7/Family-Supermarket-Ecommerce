<?php
include '../dbconnect.php';

if (isset($_POST['update'])) {
   $user_id = $_POST['user_id'];
   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);

   $update_query = "UPDATE `form` SET name = '$update_name', email = '$update_email', phone = '$update_phone' WHERE id = $user_id";
   $update_res = mysqli_query($conn, $update_query);
   if($update_res){
    echo '<script>alert("Customer Update Successfully!");</script>';
    echo '<script>window.location.href = "manageCustomer.php";</script>';
}

else {
    echo '<script>alert("Customer Update Failed!");</script>';
    echo '<script>window.location.href = "manageCustomer.php";</script>';
   }
}

if (isset($_GET['id'])) {
   $user_id = $_GET['id'];
   $select_query = "SELECT * FROM `form` WHERE id = $user_id";
   $result = mysqli_query($conn, $select_query);
   $user_data = mysqli_fetch_assoc($result);
} else {
   header('location: manageCustomer.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Customer</title>
    <link rel="stylesheet" href="../css/customer.css">
   <!-- Head content goehere -->
</head>
<body>
<div class="upd-form-main-container">

    <div class="upd-form-container">
        <h3>Edit User Data</h3>

        <form action="" method="post">
            <div class="input-group">
                <label for="update_name">Name:</label>
                <input type="text" id="update_name" name="update_name" value="<?php echo $user_data['name']; ?>" required>
            </div>
            <div class="input-group">
                <label for="update_email">Email:</label>
                <input type="email" id="update_email" name="update_email" value="<?php echo $user_data['email']; ?>" required>
            </div>
            <div class="input-group">
                <label for="update_phone">Phone:</label>
                <input type="text" id="update_phone" name="update_phone" value="<?php echo $user_data['phone']; ?>" required>
            </div>
            <div class="input-group">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="submit" name="update" value="Update">
            </div>
        </form>

    </div>
</div>
</body>
</html>
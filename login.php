<?php
include 'dbconnect.php';
session_start();

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['customer_id'] = $row['id'];
      header('location: customer.php'); // Redirect to customer profile page
      exit(); // Terminate the script after redirect
   } else {
      $message[] = 'Incorrect email or password!';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="./css/customer.css">
</head>
<body>
<div class="form-main-container">
   <div class="form-container">
      <form action="" method="post" enctype="multipart/form-data">
         <h3>Login Now</h3>
         <?php
            if(isset($message)){
               foreach($message as $message){
                  echo '<div class="message">'.$message.'</div>';
               }
            }
         ?>
         <input type="email" name="email" placeholder="Enter email" class="box" required>
         <input type="password" name="password" placeholder="Enter password" class="box" required>
         <input type="submit" name="submit" value="Login now" class="btn">
         <p>Don't have an account? <a href="register.php">Register now</a></p>
      </form>
   </div>
</div>
</body>
</html>

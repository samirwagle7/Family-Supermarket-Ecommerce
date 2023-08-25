<?php
include '../dbconnect.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $select = mysqli_query($conn, "SELECT * FROM `users_table` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User already exists'; 
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password not matched!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `users_table`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');

         if($insert){
            $message[] = 'Registered successfully!';
            header('location:admin_login.php');
         }else{
            $message[] = 'Registration failed!';
         }
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Register</title>
   <link rel="stylesheet" href="./css/admin.css">
   <link rel="stylesheet" href="../css/customer.css">
</head>
<body>
<div class="form-main-container">

   <div class="form-container">
      <form action="" method="post">
         <h3>Admin Register Now</h3>
         <?php
            if(isset($message)){
               foreach($message as $message){
                  echo '<div class="message">'.$message.'</div>';
               }
            }
         ?>
         
         <input type="text" name="name" placeholder="Enter username" class="box" required>
         <input type="email" name="email" placeholder="Enter email" class="box" required>
         <input type="password" name="password" placeholder="Enter password" class="box" required>
         <input type="password" name="cpassword" placeholder="Confirm password" class="box" required>
         <input type="tel" name="phone" placeholder="Enter your 10-digit phone number" class="box" required>
         <input type="submit" name="submit" value="Register now" class="btn">
         <p>Already have an account? <a href="admin_login.php">Login now</a></p>
      </form>
   </div>
</div>
</body>
</html>

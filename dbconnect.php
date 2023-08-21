<!-- to check the database connection -->
<?php
$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "db_grocery";
$conn = new mysqli($host, $db_user, $db_password, $db_name);
if (!$conn) {
    die("Database Connection failed" . $conn->connect_error);
}
?>
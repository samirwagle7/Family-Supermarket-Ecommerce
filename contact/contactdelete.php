<?php
include '../dbconnect.php'; // Include your database connection

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $contactId = $_GET['id'];
    
    // Delete the contact with the given ID
    $deleteQuery = "DELETE FROM contact_tbl WHERE contact_id = $contactId";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {
        echo '<script>alert("Successfully Deleted Contact!");</script>';
        header("Location: contactdata.php");
        exit();
    } else {
        echo '<script>alert("Error Deleting Contact!");</script>';
    }
} else {
    echo "Invalid contact ID.";
}
?>

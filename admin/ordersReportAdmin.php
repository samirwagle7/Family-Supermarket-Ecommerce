<?php
// Include the FPDF library
require('fpdf/fpdf.php');
// ob_start();
// Function to establish a database connection
function connectToDatabase() {
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'db_grocery';

    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

// Create a new PDF document
$pdf = new FPDF('L');
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 11);

// Add a title to the PDF
$pdf->Cell(0, 20, 'Orders Report', 0, 1, 'C');

// Establish a database connection
$conn = connectToDatabase();

// Fetch data from the orders table
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    // Calculating the left margin to center the table
    $pageWidth = $pdf->GetPageWidth();
    $tableWidth = 267; // Total width of the table
    $leftMargin = ($pageWidth - $tableWidth) / 2;
    $pdf->SetLeftMargin($leftMargin);
// Create a table header
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(20, 20, 'Order ID', 1);
$pdf->Cell(20, 20, 'Product ID', 1);
$pdf->Cell(22, 20, 'Customer ID', 1);
$pdf->Cell(45, 20, 'Email', 1);
$pdf->Cell(20, 20, 'Phone', 1);
$pdf->Cell(30, 20, 'Address', 1);
$pdf->Cell(55, 20, 'Product Name(Quantity)', 1);
$pdf->Cell(30, 20, 'Payment Mode', 1);
$pdf->Cell(25, 20, 'Total Amount', 1);
$pdf->Ln(); // Move to the next row


    while ($row = mysqli_fetch_assoc($result)) {
        
        $orderID = $row['order_id'];
        $productID = $row['product_id'];
        $customerID = $row['customer_id'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];

        $products = $row['products'];
        $payment_mode = $row['payment_mode'];
        $totalAmount = $row['paid_amount'];
        // Output the data in a table row
        $pdf->SetLeftMargin($leftMargin);
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(20, 20,$orderID , 1);
        $pdf->Cell(20, 20,$productID , 1);
        $pdf->Cell(22, 20,$customerID , 1);
        $pdf->Cell(45, 20,$email , 1);
        $pdf->Cell(20, 20,$phone , 1);
        $pdf->Cell(30, 20,$address , 1);
        $pdf->Cell(55, 20,$products , 1);
        $pdf->Cell(30, 20,$payment_mode , 1);
        $pdf->Cell(25, 20,$totalAmount , 1);
        $pdf->Ln(); // Move to the next row
        
    }
} else {
    $pdf->Cell(0, 20, 'No orders found.', 1, 1, 'C');
}

// Output the PDF to the browser or save it to a file
// ob_end_clean();
$pdf->Output('orders_report.pdf', 'D'); // 'D' for download

// Close the database connection
mysqli_close($conn);
?>


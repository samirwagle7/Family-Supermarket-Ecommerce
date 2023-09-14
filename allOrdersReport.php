<?php
require('fpdf/fpdf.php');

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
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 12);

// Add a title to the PDF
$pdf->Cell(0, 10, 'Recent Orders Report', 0, 1, 'C');

$conn = connectToDatabase();

// Fetching data from the table and add it to the PDF
$sql = "SELECT * FROM orders"; 
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    // Calculating the left margin to center the table
    $pageWidth = $pdf->GetPageWidth();
    $tableWidth = 140; // Total width of the table
    $leftMargin = ($pageWidth - $tableWidth) / 2;

    // Set the left margin
    $pdf->SetLeftMargin($leftMargin);

    // To create a table header
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 20, 'Order ID', 1);
    $pdf->Cell(80, 20, 'Product Name(Quantity)', 1);
    $pdf->Cell(30, 20, 'Total Amount', 1);
    $pdf->Ln(); // Move to the next row

    while ($row = mysqli_fetch_assoc($result)) {
        // Seting the left margin
        $pdf->SetLeftMargin($leftMargin);

        // Output the data in a table row
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(30, 20, $row['order_id'], 1);
        $pdf->Cell(80, 20, $row['products'], 1);
        $pdf->Cell(30, 20, $row['paid_amount'], 1);
        $pdf->Ln(); // Move to the next row
    }
} else {
    $pdf->Cell(0, 10, 'No orders found.', 1, 1, 'C');
}

// Output the PDF to the browser or save it to a file
$pdf->Output('customer_orders_report.pdf', 'D'); // 'D' for download

// Close the database connection
mysqli_close($conn);
?>

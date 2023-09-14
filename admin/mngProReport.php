<?php
require('fpdf/fpdf.php');

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
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 12);

// Add a title to the PDF
$pdf->Cell(0, 10, 'All Products Report', 0, 1, 'C');

// Establish a database connection
$conn = connectToDatabase();

// Fetch data from the product_tbl table
$sql = "SELECT * FROM product_tbl";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    // Calculate the X-coordinate to center-align the table
    $pageWidth = $pdf->GetPageWidth();
    $tableWidth = 180; // Adjust the width as needed
    $tableX = ($pageWidth - $tableWidth) / 2;

    // Move to the calculated X-coordinate
    $pdf->SetX($tableX);

    // Create a table header
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 10, 'S.N.', 1);
    $pdf->Cell(30, 10, 'Product ID', 1);
    $pdf->Cell(60, 10, 'Product Name', 1);
    $pdf->Cell(30, 10, 'Price', 1);
    $pdf->Cell(20, 10, 'Quantity', 1);
    $pdf->Ln(); // Move to the next row

    $i = 1;

    while ($product = mysqli_fetch_assoc($result)) {
        $pdf->SetX($tableX);
        // Output the data in a table row
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(20, 10, $i, 1);
        $pdf->Cell(30, 10, $product['product_id'], 1);
        $pdf->Cell(60, 10, $product['product_name'], 1);
        $pdf->Cell(30, 10, $product['price'], 1);
        $pdf->Cell(20, 10, $product['quantity'], 1);
        $pdf->Ln(); // Move to the next row

        $i++;
    }
} else {
    $pdf->Cell(0, 10, 'No products found.', 1, 1, 'C');
}

// Output the PDF to the browser or save it to a file
$pdf->Output('products_report.pdf', 'D'); // 'D' for download

// Close the database connection
mysqli_close($conn);
?>

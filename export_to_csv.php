<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'principal') {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "NaacDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if criteria_id is set
if (isset($_POST['criteria_id'])) {
    $criteria_id = $_POST['criteria_id'];

    // Fetch records for the specified criteria_id
    $sql = "SELECT * FROM MoUs_data WHERE status = 1 AND criteria_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $criteria_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Set headers for CSV download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $criteria_id . '_accepted_mous.csv"');

    // Open output stream
    $output = fopen('php://output', 'w');

    // Output column headings
    fputcsv($output, ['ID', 'Organization', 'Date of MoU Signed', 'Purpose & Activities', 'No of Teachers/Students Participated']);

    // Output data rows
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit();
}
?>
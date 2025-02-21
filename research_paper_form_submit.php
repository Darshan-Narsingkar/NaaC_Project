<?php
// Database connection
include('db_connect.php');

// Establish a database connection
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $academic_year = $_POST['academic_year'];
    $faculty_id = $_POST['faculty_id'];
    $paper_title = $_POST['paper_title'];
    $journal_name = $_POST['journal_name'];
    $journal_type = $_POST['journal_type'];
    $ISSN_number = $_POST['ISSN_number'];
    $impact_factor = $_POST['impact_factor'];
    $publication_date = $_POST['publication_date'];
    
    // Handle file upload
    if (isset($_FILES['proof_document']) && $_FILES['proof_document']['error'] == 0) {
        $proof_document = $_FILES['proof_document']['name'];
        $upload_dir = "uploads/";
        $upload_file = $upload_dir . basename($proof_document);

        // Check if file exists
        if (move_uploaded_file($_FILES['proof_document']['tmp_name'], $upload_file)) {
            // File upload success
        } else {
            // File upload failed
            echo "Error uploading file.";
        }
    } else {
        $proof_document = '';
    }

    // Insert data into the database
    $sql = "INSERT INTO research_paper_publications (academic_year, faculty_id, paper_title, journal_name, journal_type, ISSN_number, impact_factor, publication_date, proof_document) 
            VALUES ('$academic_year', '$faculty_id', '$paper_title', '$journal_name', '$journal_type', '$ISSN_number', '$impact_factor', '$publication_date', '$proof_document')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
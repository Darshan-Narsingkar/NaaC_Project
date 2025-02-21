<?php
// Database connection
$servername = "localhost"; // Replace with your database server
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "NaacDB"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$organization = $_POST['organization'];
$date_of_mou_signed = $_POST['date_of_mou_signed'];
$purpose_activities = $_POST['purpose_activities'];
$teachers_participated = $_POST['teachers_participated'];


// Prepare SQL query to insert data
$sql = "INSERT INTO MoUs_data (organization, date_of_mou_signed, purpose_activities, teachers_participated) 
        VALUES ('$organization', '$date_of_mou_signed', '$purpose_activities', '$teachers_participated')";

// Execute SQL query
if ($conn->query($sql) === TRUE) {
    echo "MoU's details submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
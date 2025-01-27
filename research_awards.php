<?php
// Include the database connection
include('db_connect.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Print the POST data to check if form data is received correctly
    echo "<h3>POST Data:</h3><pre>";
    print_r($_POST);  // To check if POST data is being received
    echo "</pre>";

    // Debugging: Print the FILES data to check if the uploaded file is being received
    echo "<h3>FILES Data:</h3><pre>";
    print_r($_FILES);  // To check if file is being received
    echo "</pre>";

    // Retrieve form data
    $academic_year = $_POST['academic_year'];
    $faculty_id = $_POST['faculty_id'];
    $award_name = $_POST['award_name'];
    $award_organization = $_POST['award_organization'];
    $award_date = $_POST['award_date'];
    
    // Handle file upload
    $proof_document = '';
    if (isset($_FILES['proof_document']) && $_FILES['proof_document']['error'] == 0) {
        $proof_document = $_FILES['proof_document']['name'];
        $upload_dir = "uploads/";
        $upload_file = $upload_dir . basename($proof_document);

        if (move_uploaded_file($_FILES['proof_document']['tmp_name'], $upload_file)) {
            // File uploaded successfully
        } else {
            echo "Error uploading file.";
        }
    }

    // Debugging: Print the SQL query before execution
    $sql = "INSERT INTO research_awards (academic_year, faculty_id, award_name, award_organization, award_date, proof_document) 
            VALUES ('$academic_year', '$faculty_id', '$award_name', '$award_organization', '$award_date', '$proof_document')";
    echo "<h3>SQL Query:</h3><pre>";
    echo $sql;
    echo "</pre>";

    // SQL query to insert data into the database
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Awards Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center" style="color: #2C3E50;">Research Awards Submission</h2>

        <form action="" method="POST" enctype="multipart/form-data" class="mt-4">
            <div class="form-group">
                <label for="academic_year">Academic Year:</label>
                <input type="text" class="form-control" id="academic_year" name="academic_year" required>
            </div>
            <div class="form-group">
                <label for="faculty_id">Faculty ID:</label>
                <select class="form-control" id="faculty_id" name="faculty_id" required>
                    <option value="">Select Faculty</option>
                    <?php
                    // Fetch faculty IDs from the faculty_info table
                    $result = $conn->query("SELECT faculty_id, CONCAT(first_name, ' ', last_name) AS name FROM faculty_info");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['faculty_id']."'>".$row['faculty_id']." - ".$row['name']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="award_name">Award Name:</label>
                <input type="text" class="form-control" id="award_name" name="award_name" required>
            </div>
            <div class="form-group">
                <label for="award_organization">Award Organization:</label>
                <input type="text" class="form-control" id="award_organization" name="award_organization" required>
            </div>
            <div class="form-group">
                <label for="award_date">Award Date:</label>
                <input type="date" class="form-control" id="award_date" name="award_date" required>
            </div>
            <div class="form-group">
                <label for="proof_document">Proof Document:</label>
                <input type="file" class="form-control" id="proof_document" name="proof_document" required>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
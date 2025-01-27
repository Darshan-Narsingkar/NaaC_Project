<?php
// Database connection
include('db_connect.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $academic_year = $_POST['academic_year'];
    $faculty_id = $_POST['faculty_id'];
    $publication_type = $_POST['publication_type'];
    $title = $_POST['title'];
    $publisher_name = $_POST['publisher_name'];
    $ISBN_number = $_POST['ISBN_number'];
    
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
    $sql = "INSERT INTO book_chapter_publications (academic_year, faculty_id, publication_type, title, publisher_name, ISBN_number, proof_document) 
            VALUES ('$academic_year', '$faculty_id', '$publication_type', '$title', '$publisher_name', '$ISBN_number', '$proof_document')";

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
    <title>Book Chapter Publications</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #eef2f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-container {
            max-width: 65%;
            margin: auto;
            margin-top: 50px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            padding: 40px 30px;
        }
        h2 {
            font-size: 24px;
            color: #2C3E50;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: 600;
            color: #34495E;
        }
        .form-control {
            border: 1px solid #d6d9dd;
            border-radius: 5px;
            padding: 8px 12px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #2C3E50;
        }
        .btn-submit {
            background-color: #2C3E50;
            color: white;
            padding: 8px 20px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #34495E;
        }
        .form-row {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Book Chapter Publications</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- Academic Year, Faculty ID, and Publication Type (in one row) -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="academic_year">Academic Year</label>
                    <input type="text" class="form-control" id="academic_year" name="academic_year" maxlength="9" placeholder="e.g., 2024-2025" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="faculty_id">Faculty ID</label>
                    <select class="form-control" id="faculty_id" name="faculty_id" required>
                        <option value="">-- Select Faculty ID --</option>
                        <?php
                        include('db_connect.php');
                        $result = $conn->query("SELECT faculty_id, CONCAT(first_name, ' ', last_name) AS name FROM faculty_info");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['faculty_id'] . "'>" . $row['faculty_id'] . " - " . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="publication_type">Publication Type</label>
                    <select class="form-control" id="publication_type" name="publication_type" required>
                        <option value="">-- Select Type --</option>
                        <option value="Book">Book</option>
                        <option value="Chapter">Chapter</option>
                    </select>
                </div>
            </div>

            <!-- Title, Publisher Name, ISBN Number (in one row) -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" maxlength="255" placeholder="Enter book/chapter title" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="publisher_name">Publisher Name</label>
                    <input type="text" class="form-control" id="publisher_name" name="publisher_name" maxlength="255" placeholder="Enter publisher name" required>
                </div>
            </div>

            <!-- ISBN Number and Proof Document (in one row) -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ISBN_number">ISBN Number</label>
                    <input type="text" class="form-control" id="ISBN_number" name="ISBN_number" maxlength="20" placeholder="e.g., 978-1234567890" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="proof_document">Proof Document</label>
                    <input type="file" class="form-control" id="proof_document" name="proof_document" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
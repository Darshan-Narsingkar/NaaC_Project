<?php
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

// Fetch data from the database
$sql = "SELECT * FROM MoUs_data";
$result = $conn->query($sql);

// Check for success message
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table with Delete</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 0px;
        }

        .container {
            max-width: 100%;
            overflow-x: auto;
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            margin-left: -5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #2c3e50;
            color: white;
            cursor: pointer;
        }

        tbody tr:nth-child(odd) { background: #f4f4f4; }
        tbody tr:nth-child(even) { background: #ffffff; }
        tbody tr:hover { background: #d1e7fd; transition: 0.3s ease-in-out; }

        /* Button styles */
        .action-btn {
            border: none;
            padding: 8px 10px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            margin: 0 5px;
            color: white;
        }

        .accept-btn { background: #2ecc71; }  /* Green */
        .reject-btn { background: #e74c3c; }  /* Red */
        .edit-btn { background: #f39c12; }    /* Orange */

        .action-btn i {
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <?php if ($msg): ?>
        <div style="color: green;"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>
    
    <table id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Organization</th>
                <th>Date of MoU Signed</th>
                <th>Purpose & Activities</th>
                <th>No of Teachers/Students Participated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['organization']}</td>
                            <td>{$row['date_of_mou_signed']}</td>
                            <td>{$row['purpose_activities']}</td>
                            <td>{$row['teachers_participated']}</td>
                            <td>
                                <button class='action-btn accept-btn'><i class='fas fa-check'></i></button>
                                <a href='delete_record.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this record?');\">
                                    <button class='action-btn reject-btn'><i class='fas fa-times'></i></button>
                                </a>
                                <button class='action-btn edit-btn'><i class='fas fa-edit'></i></button>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

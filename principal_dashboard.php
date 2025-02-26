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

// Fetch accepted data grouped by criteria_id
$sql = "SELECT * FROM MoUs_data WHERE status = 1";
$result = $conn->query($sql);

// Prepare an array to hold records by criteria_id
$records_by_criteria = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records_by_criteria[$row['criteria_id']][] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal Dashboard - Accepted MoUs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>


.content {
    width: 100%;
    padding: 30px;
    margin-left: 10px;
    background-color: #ffffff;
    color: #2C3E50;
    height: 100vh;
    overflow-y: auto;
}


body {
    margin: 0;
    font-family: 'Arial', sans-serif;
}

    .navbar {
    margin-left: 0px;
    background-color: #2C3E50;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    color: white;
    padding: 0.75rem 1rem;
   
}

.navbar h4{
    font-size: 16px;
    font-family: "Times New Roman";
}

.nav-bar{
    position: fixed;
    width: 100%;
    margin-left: 0px;

}


.navbar-brand {
    font-size: 24px;
    font-weight: bold;
    color: white;
    text-transform: uppercase;
    margin-left:100px;
}

.navbar-brand:hover {
    color: #f8f9fa;
}

.user-dropdown {
    position: relative;
    display: inline-block;
    margin-right: 1px;
}



.user-dropdown button {
    background: transparent;
    border: none;
    color: white;
    font-size: 18px;
    cursor: pointer;
    outline: none;
}

.user-dropdown-menu {
    display: none;
    position: absolute;
    right: 0;
    background: #2C3E50;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    overflow: hidden;
    z-index: 1000;
}

.user-dropdown-menu a {
    display: block;
    padding: 10px 20px;
    color: #ffffff;
    text-decoration: none;
    font-size: 16px;
}

.user-dropdown-menu a:hover {
    background-color: #00FFFF;
    color: #2C3E50;
}

.user-dropdown-menu .dropdown-divider {
    height: 1px;
    background-color: #ddd;
    margin: 0;
}

.account-icon {
    font-size: 20px;
    margin-right: 8px;
}

.navbar .user-name {
    font-size: 16px;
    margin-right: 10px;
}

#mainContent h3{
    margin-top: 75px;
}
        .print-button {
            margin-bottom: 20px;
        }

    .export-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.export-container h3 {
    margin: 0;
    font-size: 20px;
    font-weight: bold;
}

.export-buttons {
    display: flex;
    gap: 5px;
    margin-top: 70px;
}

.export-buttons button {
    border-radius: 20px;
    padding: 8px 12px;
    color: white;
    border: none;
    font-size: 12px;
    transition: background-color 0.3s ease;
}

.export-buttons .csv-btn { background-color: #007bff; } /* Blue */
.export-buttons .excel-btn { background-color: #ffc107; } /* Yellow */
.export-buttons .print-btn { background-color: #17a2b8; } /* Cyan */
.export-buttons .pdf-btn { background-color: #dc3545; } /* Red */

.export-buttons button:hover {
    opacity: 0.8;
}



    </style>
</head>
<body>

<div class="nav-bar">
 <nav class="navbar d-flex justify-content-between align-items-center">
    <h4><i class="fas fa-university"></i>&nbsp&nbspSIPNA COLLEGE OF ENGINEERING & TECHNOLOGY, AMRAVATI</h4>
        <a href="#" class="navbar-brand"></a>
        <div class="user-dropdown">
            <button id="userDropdownButton">

                <i class="fas fa-user-circle account-icon"></i>
                <span class="user-name">John Doe</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="user-dropdown-menu">
                <a href="#" id="profile"><i class="fas fa-user"></i>&nbsp&nbsp;Profile</a>
                <a href="#" id="changePassword"><i class="fas fa-lock"></i>&nbsp&nbsp;Change Password</a>
                <div class="dropdown-divider"></div>
                <a href="logout.php" id="logout"><i class="fas fa-sign-out-alt"></i>&nbsp&nbsp;Logout</a>
            </div>
        </div>
        
    </nav>
</div>

<div class="content" id="mainContent">
       <?php if (empty($records_by_criteria)): ?>
        <p>No accepted records found.</p>
    <?php else: ?>
        <?php foreach ($records_by_criteria as $criteria_id => $records): ?>
        <div class="export-container">
            <h3>3.5.3 - MoUs Signed During the Year</h3>
            <div class="export-buttons">
                <button class="btn csv-btn" onclick="exportToCSV('<?php echo htmlspecialchars($criteria_id); ?>')">Export to CSV</button>
                <button class="btn excel-btn" onclick="exportToExcel('<?php echo htmlspecialchars($criteria_id); ?>')">Export to Excel</button>
                <button class="btn print-btn" onclick="printTable('<?php echo htmlspecialchars($criteria_id); ?>')">Print</button>
                <button class="btn pdf-btn" onclick="exportToPDF('<?php echo htmlspecialchars($criteria_id); ?>')">Export to PDF</button>
            </div>
        </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Organization</th>
                        <th>Date of MoU Signed</th>
                        <th>Purpose & Activities</th>
                        <th>No of Teachers/Students Participated</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($record['id']); ?></td>
                            <td><?php echo htmlspecialchars($record['organization']); ?></td>
                            <td><?php echo htmlspecialchars($record['date_of_mou_signed']); ?></td>
                            <td><?php echo htmlspecialchars($record['purpose_activities']); ?></td>
                            <td><?php echo htmlspecialchars($record['teachers_participated']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


<script>

function exportToCSV(criteria_id) {
    // Create a form to submit the criteria_id for CSV export
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'export_to_csv.php'; // The PHP file that handles CSV export
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'criteria_id';
    input.value = criteria_id;
    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
}

   function loadUser() {
        fetch('User.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('mainContent').innerHTML = data;
            })
            .catch(error => {
                console.error('Error loading Campus Area form:', error);
                document.getElementById('mainContent').innerHTML = '<p>Unable to load the Campus Area form. Please try again later.</p>';
            });
    }


    
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('show');
            dropdown.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function loadContent(section) {
            document.getElementById('mainContent').innerHTML = `
                <h2>${section}</h2>
                <p>Content for ${section} will be displayed here.</p>
            `;
        }

         document.getElementById('userDropdownButton').addEventListener('click', function () {
            const dropdownMenu = document.querySelector('.user-dropdown-menu');
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        
        
        document.addEventListener('click', function (e) {
            const dropdown = document.querySelector('.user-dropdown');
            const dropdownMenu = document.querySelector('.user-dropdown-menu');
            if (!dropdown.contains(e.target)) {
                dropdownMenu.style.display = 'none';
            }
        });

function exportToExcel(criteria_id) {
    // Implement Excel export functionality here
    alert('Excel export functionality is not implemented yet.');
}

function printTable(criteria_id) {
    // Implement print functionality here
    alert('Print functionality is not implemented yet.');
}

function exportToPDF(criteria_id) {
    // Implement PDF export functionality here
    alert('PDF export functionality is not implemented yet.');
}
</script>

</body>
</html>
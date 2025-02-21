<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Paper Publications</title>
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
        <h2>Research Paper Publications</h2>
        <form action="research_paper_form_submit.php" method="POST" enctype="multipart/form-data">
            <!-- Academic Year, Faculty ID, and Paper Title (in one row) -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="academic_year">Academic Year</label>
                    <input type="text" class="form-control" id="academic_year" name="academic_year" maxlength="9" placeholder="e.g., 2023-24" required>
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
                    <label for="paper_title">Paper Title</label>
                    <input type="text" class="form-control" id="paper_title" name="paper_title" maxlength="255" placeholder="Enter paper title" required>
                </div>
            </div>

            <!-- Journal Name, Journal Type, ISSN Number, and Impact Factor (in one row) -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="journal_name">Journal Name</label>
                    <input type="text" class="form-control" id="journal_name" name="journal_name" maxlength="255" placeholder="Enter journal name" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="journal_type">Journal Type</label>
                    <select class="form-control" id="journal_type" name="journal_type" required>
                        <option value="">-- Select Type --</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="ISSN_number">ISSN Number</label>
                    <input type="text" class="form-control" id="ISSN_number" name="ISSN_number" maxlength="20" placeholder="e.g., 1234-5678" required>
                </div>
            </div>

            <!-- Impact Factor, Publication Date, and Proof Document (in one row) -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="impact_factor">Impact Factor</label>
                    <input type="text" class="form-control" id="impact_factor" name="impact_factor" maxlength="20" placeholder="Enter impact factor" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="publication_date">Publication Date</label>
                    <input type="date" class="form-control" id="publication_date" name="publication_date" required>
                </div>
                <div class="form-group col-md-3">
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

    <script>
        // Function to filter the faculty dropdown options
        document.getElementById('faculty_id').addEventListener('keyup', function() {
            let input = this.value.toLowerCase();
            let options = this.getElementsByTagName('option');
            for (let i = 0; i < options.length; i++) {
                let optionText = options[i].text.toLowerCase();
                options[i].style.display = optionText.includes(input) ? '' : 'none';
            }
        });
    </script>
</body>
</html>
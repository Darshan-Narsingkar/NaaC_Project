<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoUs Signed During the Year</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 75%;
            margin: 100px auto; /* Top margin for spacing above the form */
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            border: 1px solid #dee2e6;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #0d6efd; /* Bootstrap primary blue */
            font-weight: 700;
        }
        label {
            font-weight: 600;
            color: #495057; /* Dark grey for labels */
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .btn-primary {
            background-color:#2C3E50;  /* Bootstrap primary blue */
            border: none;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color:#2C3E50;  /* Slightly darker blue */
        }
        .row {
            margin-bottom: 15px;
        }
        .text-center {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>MoUs Signed During the Year</h2>
        <form action="MoUs_submit.php" method="POST">
            <!-- First Row -->
            <div class="row">
                <div class="col-md-6">
                    <label for="organization" class="form-label">Organization</label>
                    <input type="text" step="0.01" class="form-control" id="organization" name="organization" required>
                </div>
                <div class="col-md-6">
                    <label for="date_of_mou_signed" class="form-label">Date Of MoUs Signed</label>
                    <input type="date" step="0.01" class="form-control" id="date_of_mou_signed" name="date_of_mou_signed" required>
                </div>
    
            </div>
            <!-- Second Row -->
            <div class="row">
                <div class="col-md-6">
                    <label for="purpose_activities" class="form-label">Purpose/Activities</label>
                    <input type="text" step="0.01" class="form-control" id="purpose_activities" name="purpose_activities" required>
                </div>
                <div class="col-md-6">
                    <label for="teachers_participated" class="form-label">No of Teachers/Students Participated under MoUs</label>
                    <input type="number" step="0.01" class="form-control" id="teachers_participated" name="teachers_participated" required>
                </div>
              
            </div>
            
            <!-- Submit Button -->
            <div class="text-center">
            <button type="submit" class="btn btn-primary" style="width: 200px;">Submit</button>
        </div>
        </form>
    </div>
</body>
</html>
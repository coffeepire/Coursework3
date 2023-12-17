<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Department</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Add Department</h2>
                    </div>
                    <div class="card-body">
                        <form action="add_department.php" method="post">
                            <div class="form-group">
                                <label for="departmentId">Department ID:</label>
                                <input type="number" class="form-control" id="departmentId" name="departmentId" required>
                            </div>
                            <div class="form-group">
                                <label for="departmentName">Department Name:</label>
                                <input type="text" class="form-control" id="departmentName" name="departmentName" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Add Department</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

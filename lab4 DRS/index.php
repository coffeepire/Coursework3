<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Document</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Datepicker CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f4f4;
    }
    .container {
      max-width: 500px;
      margin-top: 50px;
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="mb-4">Create Document</h1>
    <form action="process_document.php" method="post">
      <div class="form-group">
        <label for="document_Id">Document ID:</label>
        <input type="text" class="form-control" id="documentId" name="documentId" required>
      </div>
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="content">Content:</label>
        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
      </div>
      <div class="form-group">
        <label for="dateCreated">Date Created:</label>
        <input type="text" class="form-control datepicker" id="dateCreated" name="dateCreated" placeholder="Select date" required>
        <!-- Add a placeholder for the datepicker -->
        <small id="dateHelp" class="form-text text-muted">Please select a date.</small>
      </div>
      <button type="submit" class="btn btn-primary">Create Document</button>
    </form>
    <a href="home.php" class="btn btn-secondary mt-3">Back to Home</a>
  </div>

  <!-- Bootstrap and Bootstrap Datepicker JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
      });
    });
  </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding-top: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .back-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Documents Table</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Document ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date Created</th>
            </tr>
            <!-- PHP code to fetch and display data from 'documents' table -->
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "myappdb";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM documents";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["document_id"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["content"] . "</td>";
                    echo "<td>" . $row["date_created"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>0 results</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <div>
            <button onclick="promptDocumentUpdate()">Update Document</button>
            <button onclick="promptDocumentDelete()">Delete Document</button>
        </div>
       
    </div>

    <div class="container">
        <h2>Routing Rules Table</h2>
        <table>
            <tr>
                <th>RuleID</th>
                <th>RuleName</th>
                <th>Criteria</th>
                <th>Action</th>
            </tr>
            <!-- PHP code to fetch and display data from 'RoutingRules' table -->
            <?php
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM RoutingRules";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["RuleID"] . "</td>";
                    echo "<td>" . $row["RuleName"] . "</td>";
                    echo "<td>" . $row["Criteria"] . "</td>";
                    echo "<td>" . $row["Action"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 results</td></tr>";
            }
            $conn->close();
            ?>
        </table>
         <div>
            <button onclick="promptRoutingRulesUpdate()">Update Routing Rules</button>
            <button onclick="promptRoutingRulesDelete()">Delete Routing Rules</button>
        </div>
       
          <div class="container">
        <h2>Workflow Table</h2>
        <table>
            <tr>
                <th>WorkflowID</th>
                <th>WorkflowName</th>
                <th>CurrentStage</th>
                <th>NextStage</th>
            </tr>
            <!-- PHP code to fetch and display data from 'Workflow' table -->
            <?php
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM Workflow";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["WorkflowID"] . "</td>";
                    echo "<td>" . $row["WorkflowName"] . "</td>";
                    echo "<td>" . $row["CurrentStage"] . "</td>";
                    echo "<td>" . $row["NextStage"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 results</td></tr>";
            }
            $conn->close();
            ?>
            </table>
            <div>
            <button onclick="promptWorkflowUpdate()">Update workflow </button>
            <button onclick="promptWorkflowDelete()">Delete workflow </button>
        </div>

    </div>

     <div class="container">
        <h2>Department Table</h2>
        <table>
            <tr>
                <th>DepartmentID</th>
                <th>DepartmentName</th>
            </tr>
            <!-- PHP code to fetch and display data from 'Department' table -->
            <?php
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM Department";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["DepartmentID"] . "</td>";
                    echo "<td>" . $row["DepartmentName"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>0 results</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <div>
            <button onclick="DepartmentUpdate()">Update Department</button>
            <button onclick="DepartmentDelete()">Delete Department</button>
        </div>
   <script>
        function promptDocumentUpdate() {
    var id = prompt("Enter the ID of the document to update:");
    if (id !== null) {
        var document_id = prompt("Enter the new Document ID:");
        var title = prompt("Enter the new Title:");
        var content = prompt("Enter the new Content:");
        var date_created = prompt("Enter the new Date Created (YYYY-MM-DD):");

        var params = "id=" + id + "&document_id=" + document_id + "&title=" + title + "&content=" + content + "&dateCreated=" + date_created;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
                location.reload(); 
            }
        };
        xhttp.open("POST", "update_document.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
    }
}


        function promptDocumentDelete() {
    var id = prompt("Enter the ID of the document to delete:");
    if (id !== null) {
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
                
                window.location.reload(); 
            }
        };
        xhttp.open("POST", "document_delete.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);
    }
}


       
    </script>

    <script>    
    function promptRoutingRulesUpdate() {
    var id = prompt("Enter the ID of the rule to update:");
    if (id !== null) {
        var ruleName = prompt("Enter the new Rule Name:");
        var criteria = prompt("Enter the new Criteria:");
        var action = prompt("Enter the new Action:");

        var params = "id=" + id + "&ruleName=" + ruleName + "&criteria=" + criteria + "&action=" + action;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
                location.reload(); 
            }
        };
        xhttp.open("POST", "update_rules.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
    }
}
function promptRoutingRulesDelete() {
    var id = prompt("Enter the ID of the rule to delete:");
    if (id !== null) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
                location.reload(); 
            }
        };
        xhttp.open("POST", "delete_rules.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);
    }
}



        
    </script>
    <script>
    function promptWorkflowUpdate() {
        var id = prompt("Enter the ID of the workflow to update:");
        if (id !== null) {
            var workflowName = prompt("Enter the new Workflow Name:");
            var currentStage = prompt("Enter the new Current Stage:");
            var nextStage = prompt("Enter the new Next Stage:");

            var params = "id=" + id + "&workflowName=" + workflowName + "&currentStage=" + currentStage + "&nextStage=" + nextStage;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                    location.reload();
                }
            };
            xhttp.open("POST", "update_workflow.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(params);
        }
    }

    function promptWorkflowDelete() {
        var id = prompt("Enter the ID of the workflow to delete:");
        if (id !== null) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                    location.reload(); 
                }
            };
            xhttp.open("POST", "delete_workflow.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + id);
        }
    }
</script>
<script>
    function DepartmentUpdate() {
        var id = prompt("Enter the Department ID to update:");
        if (id !== null) {
            var departmentName = prompt("Enter the new Department Name:");

            var params = "id=" + id + "&departmentName=" + departmentName;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                    location.reload(); 
                }
            };
            xhttp.open("POST", "update_department.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(params);
        }
    }

    function DepartmentUpdate() {
    var id = prompt("Enter the Department ID to update:");
    if (id !== null) {
        var newDepartmentID = prompt("Enter the new Department ID:");
        var departmentName = prompt("Enter the new Department Name:");

        var params = "id=" + id + "&newDepartmentID=" + newDepartmentID + "&departmentName=" + departmentName;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
                location.reload(); 
            }
        };
        xhttp.open("POST", "update_department.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
    }
}
</script>


 <a href="home.php" class="btn btn-primary back-button">Back to Home</a>

    
</body>
</html>
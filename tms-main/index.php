<?php
require_once('Controller.php');

$taskManager = new TaskManager();
$userManager = new UserManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Task-related actions
    if (isset($_POST['addTask'])) {
        $taskName = $_POST['taskName'];
        $taskManager->addTask($taskName);
    } elseif (isset($_POST['markDone'])) {
        $taskId = $_POST['taskId'];
        $taskManager->markTaskAsDone($taskId);
    } elseif (isset($_POST['deleteTask'])) {
        $taskId = $_POST['taskId'];
        $taskManager->deleteTask($taskId);
    } elseif (isset($_POST['updateTaskUser'])) {
        $taskId = $_POST['taskId'];
        $userId = $_POST['userId'];
        $taskManager->updateTaskUser($taskId, $userId);
    }

    // User-related actions
    if (isset($_POST['addUser'])) {
        $userName = $_POST['userName'];
        $userManager->addUser($userName);
    } elseif (isset($_POST['deleteUser'])) {
        $userId = $_POST['userId'];
        $userManager->deleteUser($userId);
    }
}

$tasks = $taskManager->getTasks();
$users = $userManager->getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- User Management Section -->
        <h3>Users</h3>
        <form method="post">
            <label for="userName" class="form-label">New User</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="userName" name="userName" placeholder="User" aria-label="User" aria-describedby="button-addon3">
                <button type="submit" class="btn btn-primary" name="addUser" id="button-addon3">Add User</button>
            </div>
        </form>
        <ul class="list-group">
            <?php foreach ($users as $user) : ?>
                <li class="list-group-item">
                    <?php echo $user['userName']; ?>
                    <form method="post" class="float-end">
                        <input type="hidden" name="userId" value="<?php echo $user['userId']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm" name="deleteUser">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Task Management Section -->
        <h3>Tasks</h3>
        <form method="post" class="mt-5">
            <label for="taskName" class="form-label">New Task</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="taskName" name="taskName" placeholder="Task" aria-label="Task" aria-describedby="button-addon2">
                <button type="submit" class="btn btn-primary" name="addTask" type="button" id="button-addon2">Add Task</button>
            </div>
        </form>
        <ul class="list-group">
            <?php foreach ($tasks as $task) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="col">
                        <small>ID: <?php echo $task['taskId'] ?></small>
                        <h5 class="mb-1">Task: <?php echo $task['taskName']; ?></h5>
                    </div>
                    <form method="post">
                        <div class="input-group">
                            <select class="form-select" id="userId" name="userId" aria-label="Assign User">
                                <option value="" selected>None</option>
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?php echo $user['userId']; ?>" <?php echo ($user['userId'] == $task['userId']) ? 'selected' : ''; ?>>
                                        <?php echo $user['userName']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="taskId" value="<?php echo $task['taskId']; ?>">
                            <button type="submit" class="btn <?php echo $task['is_done'] ? 'btn-success' : 'btn-danger'; ?> btn-sm" name="markDone">
                                <?php echo $task['is_done'] ? 'Done' : 'Pending'; ?>
                            </button>
                            <button type="submit" class="btn btn-danger btn-sm" name="deleteTask">Delete</button>
                            <button type="submit" class="btn btn-primary btn-sm" name="updateTaskUser">Update User</button>
                        </div>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
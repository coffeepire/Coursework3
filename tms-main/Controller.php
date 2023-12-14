<?php

class Database
{
    private $host = '127.0.0.1';
    private $user = 'root';
    private $pass = '';
    private $name = 'tms';
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function establishConnection()
    {
        return $this->conn;
    }
}

class UserManager
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addUser($userName)
    {
        $conn = $this->db->establishConnection();
        $query = $conn->prepare("INSERT INTO users (userName) VALUES (?)");
        $query->bind_param("s", $userName);
        $query->execute();
        $query->close();
    }

    public function getUsers()
    {
        $conn = $this->db->establishConnection();
        $userQuery = $conn->query("SELECT * FROM users");
        $users = [];
        while ($row = $userQuery->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }

    public function deleteUser($userId)
    {
        $conn = $this->db->establishConnection();
        $query = $conn->prepare("DELETE FROM users WHERE userId = ?");
        $query->bind_param("i", $userId);
        $query->execute();
        $query->close();
    }
}

class TaskManager
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addTask($taskName)
    {
        $conn = $this->db->establishConnection();
        $query = $conn->prepare("INSERT INTO tasks (taskName) VALUES (?)");
        $query->bind_param("s", $taskName);
        $query->execute();
        $query->close();
    }

    public function markTaskAsDone($taskId)
    {
        $conn = $this->db->establishConnection();
        $query = $conn->prepare("UPDATE tasks SET is_done = IF(is_done = 0, 1, 0) WHERE taskId = ?");
        $query->bind_param("i", $taskId);
        $query->execute();
        $query->close();
    }

    public function updateTaskUser($taskId, $userId)
    {
        $conn = $this->db->establishConnection();
        $query = $conn->prepare("UPDATE tasks SET userId = ? WHERE taskId = ?");
        $query->bind_param("ii", $userId, $taskId);
        $query->execute();
        $query->close();
    }

    public function deleteTask($taskId)
    {
        $conn = $this->db->establishConnection();
        $query = $conn->prepare("DELETE FROM tasks WHERE taskId = ?");
        $query->bind_param("i", $taskId);
        $query->execute();
        $query->close();
    }

    public function getTasks()
    {
        $conn = $this->db->establishConnection();
        $taskQuery = $conn->query("SELECT * FROM tasks");
        $tasks = [];
        while ($row = $taskQuery->fetch_assoc()) {
            $tasks[] = $row;
        }
        return $tasks;
    }
}

?>

<?php
// src/Controller/TaskController.php
require_once 'src/Config/Database.php';
require_once 'src/Model/Task.php';

class TaskController {
    private $db;
    private $taskModel;

    public function __construct() {
        $this->db = new Database();
        $this->taskModel = new Task($this->db->getConnection());
    }

    public function createTask($user_id, $title, $description) {
        return $this->taskModel->create($user_id, $title, $description);
    }

    public function getUserTasks($user_id) {
        return $this->taskModel->getAllByUser($user_id);
    }

    public function updateTask($task_id, $status) {
        return $this->taskModel->update($task_id, $status);
    }
}

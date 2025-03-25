<?php
// task-update.php
require_once 'src/Controller/TaskController.php';

if (isset($_POST['complete'])) {
    $taskController = new TaskController();
    $taskController->updateTask($_POST['task_id'], 1); // 1 significa "concluída"
}

header('Location: task-list.php');
exit;

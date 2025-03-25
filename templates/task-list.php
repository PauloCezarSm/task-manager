<?php
// templates/task-list.php
session_start();
require_once 'src/Controller/TaskController.php';

$taskController = new TaskController();
$tasks = $taskController->getUserTasks($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Plataforma de Tarefas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Minhas Tarefas</h1>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?php echo $task['title']; ?> - 
                <?php echo $task['completed'] ? 'Concluída' : 'Pendente'; ?>
                <form method="POST" action="task-update.php">
                    <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                    <button type="submit" name="complete" <?php echo $task['completed'] ? 'disabled' : ''; ?>>Marcar como concluída</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

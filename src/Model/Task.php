<?php
// src/Model/Task.php

class Task {
    private $conn;
    private $table = "tasks";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($user_id, $title, $description) {
        $query = "INSERT INTO " . $this->table . " (user_id, title, description) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $title);
        $stmt->bindParam(3, $description);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getAllByUser($user_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($task_id, $status) {
        $query = "UPDATE " . $this->table . " SET completed = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $status);
        $stmt->bindParam(2, $task_id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

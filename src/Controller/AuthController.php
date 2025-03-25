<?php
// src/Controller/AuthController.php
require_once 'src/Config/Database.php';
require_once 'src/Model/User.php';

class AuthController {
    private $db;
    private $userModel;

    public function __construct() {
        $this->db = new Database();
        $this->userModel = new User($this->db->getConnection());
    }

    public function register($username, $password) {
        // Hash da senha
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $this->userModel->create($username, $hashedPassword);
    }

    public function login($username, $password) {
        $user = $this->userModel->getByUsername($username);
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }
}

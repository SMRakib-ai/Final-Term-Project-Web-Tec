<?php
include_once "DB.php";

class User {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->openConnection();
    }

    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

 
public function updateUser($id, $name, $email, $password = null) {
    if ($password) {
        
        $stmt = $this->conn->prepare("UPDATE users SET name=?, email=?, password=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $email, $password, $id);
    } else {
        $stmt = $this->conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $email, $id);
    }

    return $stmt->execute();
}

}

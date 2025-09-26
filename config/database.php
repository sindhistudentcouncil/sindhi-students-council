<?php
class Database {
    private $host = "localhost";
    private $db_name = "sindhi_council";
    private $username = "secure_user";
    private $password = "encrypted_password_here";
    public $conn;
    
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                                $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            error_log("Connection error: " . $exception->getMessage());
            // Don't expose detailed errors in production
            throw new Exception("Database connection failed.");
        }
        return $this->conn;
    }
}
?>

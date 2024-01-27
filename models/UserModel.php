<?php
require_once 'config/Database.php';
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function registerUser($username, $password, $full_name,$course_name) {
        try {
            $conn = $this->db->getConnection();

            // Perform user registration logic, such as inserting data into the database
            // You should use prepared statements to prevent SQL injection in a real-world scenario
            // For simplicity, we're not including those details here
            // Return true on success, false on failure

            // Hash the password for security
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user details into the database
            $stmt = $conn->prepare("INSERT INTO users (username, password, studentName, courseName, enrollmentDate) VALUES (:username, :password, :full_name, :course_name, 'now()'')");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':studentName', $full_name);
            $stmt->bindParam(':courseName', $course_name);

            // Execute the statement
            $stmt->execute();

            // Return true on success
            return true;
        } catch (PDOException $e) {
            // Handle database connection errors
            die("Database error: " . $e->getMessage());
        }
    }
}

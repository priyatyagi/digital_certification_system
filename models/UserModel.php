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

    public function generateCertificate($studentId) {
        // Fetch student details from the database
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->bindParam(':id', $studentId);
        $stmt->execute();
        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        // Generate a unique hash for the certificate (can be a combination of student details)
        $certificateHash = md5(serialize($student));

        // Update the database with the certificate hash
        $updateStmt = $this->db->getConnection()->prepare("UPDATE students SET certificate_hash = :hash WHERE id = :id");
        $updateStmt->bindParam(':hash', $certificateHash);
        $updateStmt->bindParam(':id', $studentId);
        $updateStmt->execute();

        return $certificateHash;
    }

    public function verifyCertificate($studentId, $certificateHash) {
        // Fetch the stored hash from the database
        $stmt = $this->db->getConnection()->prepare("SELECT certificate_hash FROM students WHERE id = :id");
        $stmt->bindParam(':id', $studentId);
        $stmt->execute();
        $storedHash = $stmt->fetchColumn();

        // Compare the stored hash with the provided hash
        return ($storedHash === $certificateHash);
    }
}

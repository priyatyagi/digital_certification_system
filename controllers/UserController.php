<?php

require_once 'models/UserModel.php';
class UserController {
    public function showRegistrationForm() {
        // Include the registration view
        include('../views/registration.php');
    }

    public function register() {
        // Get user input from the registration form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Create an instance of the UserModel
        $userModel = new UserModel();

        // Call the registerUser method to handle registration
        $registrationResult = $userModel->registerUser($username, $password);

        // Check the result and redirect accordingly
        if ($registrationResult) {
            header('Location: index.php?registration=success');
        } else {
            header('Location: index.php?registration=failure');
        }
    }
    public function generateCertificate($studentId) {
        $userModel = new UserModel();
        $certificateHash = $userModel->generateCertificate($studentId);

        // Load the certificate view
        include('certificate_view.php');
    }

    public function verifyCertificate($studentId, $certificateHash) {
        $userModel = new UserModel();
        $isValid = $userModel->verifyCertificate($studentId, $certificateHash);

        if ($isValid) {
            echo "Certificate is valid!";
        } else {
            echo "Certificate is not valid!";
        }
    }
}
?>
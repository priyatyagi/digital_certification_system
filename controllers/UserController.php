<?php

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
}
?>
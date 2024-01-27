<?php

// Get the action from the URL
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Create an instance of the UserController
$userController = new UserController();

// Route the request based on the action
switch ($action) {
    case 'register':
        $userController->register();
        break;
    default:
        $userController->showRegistrationForm();
}

?>
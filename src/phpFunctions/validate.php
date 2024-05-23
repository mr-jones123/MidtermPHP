<?php
session_start();

// Initialize users array in session
$_SESSION['users'] = []; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect login details
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $isValidUser = false;

    // Loop through $_SESSION['users'] instead of $users
    foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $email && $user['password'] === $password) { 
            $isValidUser = true;
            $_SESSION['user'] = $user;
            header('Location: index.php'); 
            exit;
        }
    }

    if (!$isValidUser) {
        echo "Invalid login credentials";
    }
}
?>
<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $isValidUser = false;
        foreach($_SESSION['users'] as $user){
            if ($user['email'] == $email && $user['password'] == $password){
                 $isValidUser = true;
                 header('Location: home.php');
                 exit;
            } else {
                echo "invalid account";
            }
        }
    }
?>
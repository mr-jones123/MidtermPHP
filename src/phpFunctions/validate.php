<?php
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = array();
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $isValidUser = false;

        foreach($_SESSION['users'] as $user){
            if ($user['email'] == $email && $user['password'] == $password){
                 $isValidUser = true;
                 unset($_SESSION['users']);
                 header('Location: search.php');
                 exit;
            }  
        }
        //isValidUser doesn't turn true
        echo '<script>alert("Invalid Account")</script>'; 
    }
?>

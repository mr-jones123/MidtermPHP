<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    function addUser($firstname, $middlename, $lastname, $street, $brgy, $region, $zcode, $phone, $email, $password) {
        $new_id = count($_SESSION['users']) + 1;
        $_SESSION['users'][] = [
            'id' => $new_id,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'lastname' => $lastname,
            'street' => $street,
            'brgy' => $brgy,
            'region' => $region,
            'zcode' => $zcode,
            'phone' => $phone,
            'email' => $email,
            'password' => $password
        ];
    }

    function checkPasswords() {
        $password = $_POST['password'];
        $confirmPassword = $_POST['cpw'];

        if (strlen($password) < 8) {
            echo '<span style="color: red;">Password should have at least 8 characters</span>';
            return false;
        } elseif ($password !== $confirmPassword) {
            echo '<span style="color: red;">Passwords do not match</span>';
            return false;
        } else {
            return true;
        }
    }
?>
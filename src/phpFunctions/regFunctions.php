<?php
require_once 'welcomeEmail.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function addUser($firstname, $middlename, $lastname, $street, $brgy, $region, $zcode, $phone, $email, $password)
{
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


function checkPasswords()
{
    $password = $_POST['password'];
    $confirmPassword = $_POST['cpw'];

    if (strlen($password) < 8) {
        echo '<script>alert("Password must be at least 8 letters")</script>';
        return false;
    } elseif ($password !== $confirmPassword) {
        echo '<script>alert("Passwords do not match")</script>';
        return false;
    } else {
        echo '<script>alert("Successfuly made an account! Now Log In!")</script>';

    }
}

?>
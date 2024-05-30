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


function checkPasswords($password, $confirmPassword)
{
    if ($password == $confirmPassword) {
        return true;
    } elseif ($password !== $confirmPassword) {
        return false;
    }
}

?>
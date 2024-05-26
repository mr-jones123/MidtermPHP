<?php
session_start();
include __DIR__ . '/phpFunctions/regFunctions.php';
require  __DIR__ .'/phpFunctions/welcomeEmail.php';
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = array();
}
// if the variables are not set, it returns an empty value/space
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'] ?? '';
    $middlename = $_POST['middlename'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $street = $_POST['street'] ?? '';
    $brgy = $_POST['brgy'] ?? '';
    $region = $_POST['region'] ?? '';
    $zcode = $_POST['zcode'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (checkPasswords() == true && $firstname && $middlename && $lastname && $street && $brgy && $region && $zcode && $phone && $email && $password) {
        addUser($firstname, $middlename, $lastname, $street, $brgy, $region, $zcode, $phone, $email, $password);
        welcomeEmail($email);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
<h1 class="website-title"><span style="color:#826C7F;"> Xy's</span> Video Store</h1>
    <div class="background-images">
        <img src="/img/walkman3.png">
    </div>
    <div class="regwrapper">
        <form method="post" onsubmit=return checkPasswords()>
            <h1>Register</h1>
            <label><h2>Name</h2></label>
            <div class="input-box">
                <input type="text" placeholder="First Name" name="firstname" required />
            </div>
            <div class="input-box">
                <input type="text" placeholder="Last Name" name="lastname" required />
            </div>
            <div class="input-box">
                <input type="text" placeholder="Middle Name" name="middlename" required />
            </div>
            <label><h2>Address</h2></label>
            <div class="wrapcontainer">
                <div class="input-box">
                    <input type="text" placeholder="Street" name="street" required />
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Barangay" name="brgy" required />
                </div>
            </div>
            <div class="wrapcontainer">
                <div class="input-box">
                    <input type="text" placeholder="Municipality/City" name="city" required />
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Region" name="region" required />
                </div>
                <div class="input-box">
                    <input type="text" pattern=[0-9]{4} placeholder="ZIP Code" name="zcode" required />
                </div>
            </div>

            <label><h2>Phone Number</h2></label>
            <div class="input-box">
                <input type="tel" placeholder="09xxxxxxxxx" name="phone" pattern="[0-9]{11}" required />
            </div>

            <label><h2>Email</h2></label>
            <div class="input-box">
                <input type="email" placeholder="Email" id="email" name="email" required />
            </div>

            <label><h2>Password</h2></label>
            <div class="wrapcontainer">
                <div class="input-box">
                    <input type="password" placeholder="Enter password" id="password" name="password" required />
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Confirm password" id="cpw" name="cpw" required />
                </div>
            </div>
            <span id="message"></span>

            <div class="wrapcontainer">
            <div class="login-register-container">
                    <button type="submit" class="btn" value="Submit"><a href="index.php">BACK</a></button>
                </div>
                <div class="login-register-container">
                    <button type="reset" class="btn" value="Reset">RESET VALUES</button>
                </div>
                <div class="login-register-container">
                    <button type="submit" class="btn" value="Register">REGISTER</button>
                </div>
            </div>
            <br>
            <p id="register-text" style="margin-left:8vw;">Already have an account? <a href="INDEX.php"><u>login
                    here</u></a></p>
        </form>
    </div>


    <script>

        function checkPasswords() {
            var password = document.getElementById('pw').value;
            var confirmPassword = document.getElementById('cpw').value;
            var message = document.getElementById('message');
            if (password.length < 8) {
                message.style.color = 'red';
                message.innerHTML = 'Password should have at least 8 characters';
                return false;
            } else if (password !== confirmPassword) {
                message.style.color = 'red';
                message.innerHTML = 'Password do not match';
                return false;
            } else {
                message.style.color = 'green';
                message.innerHTML = 'Password match';
                return true;
            }
        }

        document.getElementById('pw').addEventListener('input', checkPasswords);
        document.getElementById('cpw').addEventListener('input', checkPasswords);
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("pw");
            var confirmPasswordInput = document.getElementById("cpw");
            var showPasswordIcon = document.getElementById("showPassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                confirmPasswordInput.type = "text";
                showPasswordIcon.classList.remove("fa-eye");
                showPasswordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                confirmPasswordInput.type = "password";
                showPasswordIcon.classList.remove("fa-eye-slash");
                showPasswordIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>
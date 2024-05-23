<?php
   include __DIR__ . '/php/validate.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xy's Video Store</title>
    <link rel="stylesheet" href="style.css">

<body> 
    <h1 class ="website-title"><span style="color:#826C7F;"> Xy's</span> Video Store</h1>
 <div class="wrapper">
    <h1>Login</h1>
    <div class="input-box">
        <input type="email" placeholder="Email" required>
    </div>
    <div class="input-box">
        <input type="password" placeholder="Password" required>
    </div>
    <div class="forget-password">
        <a href="#">Forgot Password?</a>
    </div>
    <div class="login-register-container">
        <button type="submit" class="btn">Login</button>
        <p id="register-text">Don't have an account? <a href="#"><u>Register here</u></a></p>
    </div>    
 </div>
</body>

</html>
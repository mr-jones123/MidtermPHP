<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xy's Video Store</title>
    <link rel="stylesheet" href="style.css">

<body>
    <div class="admin-pop" id="myForm">
        
        <form action="/action_page/php"class="wrapper">
            <h1>Admin Login</h1>
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="forget-password">
                <a href="#">Forgot Password?</a>
            </div>
            <div class="login-register-container">
                <a href="vidmanage.php" class="btn" value="Log In">LOGIN</a>
            </div>
        </form>
       
    </div>
    
    <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
</script>
</body>

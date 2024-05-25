<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css" />
    <style>
        div.regwrapper {
            max-width: fit-content;
            margin-top: 3vh;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            border: 2px solid var(--mountbatten-pink);
            padding: 40px;
            height: auto;
            width: 35vw;
        }

        .regwrapper h1 {
            text-align: center;
            margin-bottom: 3vw;
            color: var(--mountbatten-pink);
            font-size: 2.7rem;
        }
        .wrapcontainer {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .wrapcontainer .input-box {
            flex: 1;
        }

        .eye {
            display: flex;
            justify-content: center;
            align-items: center; 
            padding-bottom: 10px;
            opacity: 0.4;
        }

        label {
            font-family: var(--secondaryfont-family);
            font-size: 12px;
            color: var(--mountbatten-pink);
        }

    </style>
</head>
<body>
    <div class="regwrapper">
    <form method="post" onsubmit="return checkPasswords()">
    <h1>Register</h1>
        <label>Name</label>
        <div class="input-box">
            <input type="text" placeholder="First Name" name="firstname" required />
        </div>
        <div class="input-box">
            <input type="text" placeholder="Last Name" name="lastname" required />
        </div>
        <label>Address</label>
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

        <label>Phone Number</label>
        <div class="input-box">
            <input type="tel" placeholder ="09xxxxxxxxx"name="phone" pattern="[0-9]{11}" required />
        </div>

        <label>Email</label>
        <div class="input-box">
            <input type="email" placeholder="Email" id="email" name="email" required />
        </div>

        <label>Password</label>
        <div class="wrapcontainer">
            <div class="input-box">
                <input type="password" placeholder="Enter password" id="pw" name="pw" required />
            </div>
            <div class="input-box">
                <input type="password" placeholder="Confirm password" id="cpw" name="cpw" required />
            </div><div class="eye"><i class="fas fa-eye" id="showPassword" onclick="togglePasswordVisibility()"></i></div>
        </div>
        <span id="message"></span>

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

        <div class="wrapcontainer">
            <div class="login-register-container">
                <button type="reset" class="btn" value="Reset">Cancel</button>
            </div>
            <div class="login-register-container">
                <button type="submit" class="btn" value="Register" formaction="index.php">Register</button>
            </div>
        </div>
    </div>
    </form>
   
</body>
</html>





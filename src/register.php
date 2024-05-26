<?php
    include __DIR__ .'/phpFunctions/regFunctions.php';
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = array();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = $_POST['firstname'] ??'';
        $middlename = $_POST['middlename'] ??'';
        $lastname = $_POST['lastname'] ??'';
        $street = $_POST['street'] ??'';
        $brgy = $_POST['brgy'] ??'';
        $region = $_POST['region'] ??'';
        $zcode = $_POST['zcode'] ??'';
        $phone = $_POST['phone'] ??'';
        $email = $_POST['email'] ??'';
        $password = $_POST['password'] ??'';
        
        if (checkPasswords() == true && $firstname && $middlename && $lastname && $street && $brgy && $region && $zcode && $phone && $email && $password) {
            addUser($firstname, $middlename, $lastname, $street, $brgy, $region, $zcode, $phone, $email, $password);
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
    <link rel="stylesheet" href="style.css"/>
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
    <form method="post" onsubmit=return checkPasswords()>
    <h1>Register</h1>
        <label>Name</label>
        <div class="input-box">
            <input type="text" placeholder="First Name" name="firstname" required />
        </div>
        <div class="input-box">
            <input type="text" placeholder="Last Name" name="lastname" required />
        </div>
        <div class="input-box">
            <input type="text" placeholder="Middle Name" name="middlename" required />
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
                <input type="password" placeholder="Enter password" id="password" name="password" required />
            </div>
            <div class="input-box">
                <input type="password" placeholder="Confirm password" id="cpw" name="cpw" required />
            </div>
        </div>
        <span id="message"></span>

        <div class="wrapcontainer">
            <div class="login-register-container">
                <button type="reset" class="btn" value="Reset">Cancel</button>
            </div>
            <div class="login-register-container">
                <button type="submit" class="btn" value="Register">Register</button>
            </div>
        </div>
    </div>
    </form>
</body>
</html>
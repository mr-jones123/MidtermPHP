<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xy's Video Store</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<h1 class="website-title">
        <span style="color:#826C7F; font-size:30px;cursor:pointer" onclick="showSideBar()">&#9776; Xy's</span> Video Store
    </h1>
    <div id="Sidenav" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="hideSideBar()">&times;</a>
        <div class="searchcontainer">
            <form action="search.php" method="post">
                <input type="text" placeholder="Search.." name="searchTerm">
            <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </form>
        </div>
        <button class="collapsible">Categories</button>
        <div id="categoriesContent" class="content">
            <a href="#">Action</a>
            <a href="#">Comedy</a>
            <a href="#">Drama</a>
            <a href="#">Horror</a>
        </div>
        <button class="collapsible">Video Management</button>
            <div class="content">
                <button class="open-button" onclick="openForm()">Admin Login</button>
            </div>
        <div class="pop" id="admin">
        
            <form action="vidmanage.php"class="wrapper">
                <h1>Admin Login</h1>
                <div class="input-box">
                    <input type="email" placeholder="Email" name="adminemail" required>
                </div>
                <div class="input-box">
                    <<input type="password" placeholder="Password" name="adminpassword" required >
                </div>
                <div class="forget-password">
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="login-register-container">
                    <button type="submit" class="btn" value="Log In">LOGIN</a>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                </div>
            </form>

        </div>
        </div>
    <script src="script.js"></script>
</body>
</html>
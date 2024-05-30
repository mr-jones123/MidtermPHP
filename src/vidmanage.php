<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['videos'])) {
    $_SESSION['videos'] = array(); 
}
require 'vidfunctions.php';

$lastAddedVideo = null;
$videoAdded = false; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    addVideo($_POST['title'], $_POST['genre'], $_POST['releaseYear'], $_POST['description'], $_POST['quantity'], $_POST['price'], $_POST['format']);
    
    $videos = getVideos();
    if (!empty($videos)) {
        $lastAddedVideo = $videos[count($videos) - 1];
        $videoAdded = true; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NXK Video Store</title>
    <link rel="stylesheet" href="style.css">
    <?php include 'header.php'; ?>
</head>

<body>
    <button class="collapsible">Add Movie</button>
    <div class="content">
        <form action="" method="post">
            <h2>Add Movie</h2>
            <div class="input-box">
                <input type="text" placeholder="Title" name="title" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Genre" name="genre" required>
            </div>
            <div class="input-box">
                <input type="number" placeholder="Release Year" name="releaseYear" required>
            </div>
            <div class="input-box">
                <input type="number" placeholder="Price" name="price" required>
            </div>
            <div class="input-box">
                <input type="number" placeholder="Quantity" name="quantity" required>
            </div>
            <div class="input-box">
                <select name="format" required>
                    <option value="">Select Video Format</option>
                    <option value="DVD">DVD</option>
                    <option value="Blu-ray">Blu-ray</option>
                    <option value="Digital">Digital</option>
                </select>
            </div>
            <div class="input-box">
                <textarea placeholder="Description" name="description" rows="4" required></textarea>
            </div>
            <div class="login-register-container">
                <button type="submit" class="btn">Add Movie</button>
            </div>
        </form>
        <button class="collapsible">Update</button>
    <div class="content"></div>
    <button class="collapsible">Delete</button>
    <div class="content"></div>
    </div>
        <?php if ($videoAdded) : ?>
        <script>
            alert("Video added successfully!");
        </script>
        <?php endif; ?>
    
    

    <script src="script.js"></script>

</body>

</html>

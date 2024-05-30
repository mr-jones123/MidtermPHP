<?php
session_start();
require 'vidfunctions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];
    $searchResults = searchVideos($searchTerm);
}
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Search</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
 <?php if (isset($searchResults)): ?>
        <h2>Search Results</h2>
        <ul>
            <?php foreach ($searchResults as $video): ?>
                <li>
                    <strong>Title:</strong> <?php echo htmlspecialchars($video['title']); ?><br>
                    <strong>Genre:</strong> <?php echo htmlspecialchars($video['genre']); ?><br>
                    <strong>Release Year:</strong> <?php echo htmlspecialchars($video['releaseYear']); ?><br>
                    <strong>Description:</strong> <?php echo htmlspecialchars($video['description']); ?><br>
                    <strong>Quantity:</strong> <?php echo htmlspecialchars($video['quantity']); ?><br>
                    <strong>Price:</strong> <?php echo htmlspecialchars($video['price']); ?><br>
                    <strong>Format:</strong> <?php echo htmlspecialchars($video['format']); ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No search results found.</p>
    <?php endif; ?>
</body>

</html>

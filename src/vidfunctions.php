<?php
function searchVideos($searchTerm) {
    // Fetch all videos
    $videos = getVideos(); // Make sure this function returns an array of videos

    // Array to store search results
    $searchResults = [];

    // Loop through videos and check if any field contains the search term
    foreach ($videos as $video) {
        if (stripos($video['title'], $searchTerm) !== false ||
            stripos($video['genre'], $searchTerm) !== false ||
            stripos($video['releaseYear'], $searchTerm) !== false ||
            stripos($video['description'], $searchTerm) !== false ||
            stripos($video['quantity'], $searchTerm) !== false ||
            stripos($video['price'], $searchTerm) !== false ||
            stripos($video['format'], $searchTerm) !== false) {
            $searchResults[] = $video;
        }
    }

    return $searchResults;
}

function addVideo($title, $genre, $releaseYear, $description, $quantity, $price, $format) {
 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $videos = isset($_SESSION['videos']) ? $_SESSION['videos'] : [];

    $new_video = [
        'id' => count($videos) + 1, 
        'title' => $title,
        'genre' => $genre,
        'releaseYear' => $releaseYear,
        'description' => $description,
        'quantity' => $quantity,
        'price' => $price,
        'format' => $format
    ];

    $videos[] = $new_video;

    $_SESSION['videos'] = $videos;

    $_SESSION['video_added'] = true;
}

function getVideos() {

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION['videos']) ? $_SESSION['videos'] : [];
}
?>
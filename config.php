<?php
session_start();


$servername = "localhost"; 
$username = "id22186937_mozilista24";
$password = "Mozilista2024.";
$database = "id22186937_mozilista";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);


$menuItems = [
    'home' => ['file' => 'home.php', 'label' => 'home'],
    'login' => ['file' => 'login.php', 'label' => 'Log In'],
    'register' => ['file' => 'register.php', 'label' => 'Register'],
    'logout' => ['file' => 'logout.php', 'label' => 'Log Out'],
    'add_movie' => ['file' => 'add_movie.php', 'label' => 'Add Movie'],
    'movie_list' => ['file' => 'movie_list.php', 'label' => 'Movie List'],
    'gallery' => ['file' => 'gallery.php', 'label' => 'Image Gallery'],
    'upload_image' => ['file' => 'upload_image.php', 'label' => 'Upload Image'],
    'contact' => ['file' => 'contact.php', 'label' => 'Contact'],
    'view_message' => ['file' => 'view_message.php', 'label' => 'View Messages']
];
?>

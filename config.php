<?php
session_start();

$serverName = "(localdb)\mssqllocaldb"; 
$connectionOptions = array(
    "Database" => "mozilista",
    "Authentication" => "ActiveDirectoryIntegrated" // Integrated Security
);


$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    echo "Unable to connect to database.<br>";
    die(print_r(sqlsrv_errors(), true));
}

$menuItems = [
    'home' => ['file' => 'home.php', 'label' => 'Home'],
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

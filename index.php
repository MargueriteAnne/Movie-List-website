<?php
// Load configuration
$config = include('config.php');

// Get requested page
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Include requested page
include("$page.php");
?>

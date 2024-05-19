<?php
require_once 'config.php';

$menu = $_GET['menu'] ?? 'home';

if (!array_key_exists($menu, $menuItems)) {
    $menu = 'home';
}

require_once $menuItems[$menu]['file'];
?>

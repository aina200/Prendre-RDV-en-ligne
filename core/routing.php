<?php

$pages = [
    'homepage' => './controllers/homepage_controller.php',
    'link' => './controllers/link_controller.php',
];

$page = $pages['homepage'];

if (isset($_GET['page']) && in_array($_GET['page'], array_keys($pages))) {
    $page = $pages[$_GET['page']];
}

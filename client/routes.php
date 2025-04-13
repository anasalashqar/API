<?php
session_start();

// ROUTING ARRAY FOR `?page=...` ROUTES
$routes = [
    "/" => "admin/views/dashboard/index.php",
    "dashboard/index" => "admin/views/dashboard/index.php",

    // Cars section
    "cars/index" => "admin/views/cars/index.php",
    "cars/create" => "admin/views/cars/create.php",
    "cars/edit" => "admin/views/cars/edit.php",
    "cars/show" => "admin/views/cars/show.php",

    "login" => "admin/views/auth/login.php",
];

// If ?page= is set → Use VIEW ROUTING
$page = $_GET['page'] ?? '/'; // default to '/' if not set

if (array_key_exists($page, $routes)) {
    $view_path = $routes[$page];
    include_once __DIR__ . '/admin/components/layout.php';
    exit();
} else {
    include_once __DIR__ . '/admin/views/404.php';
    exit();
}

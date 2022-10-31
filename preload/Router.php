<?php
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($_SERVER['REQUEST_URI'])['path'];

if(array_key_exists($path, $_SESSION['routes'])) {
    $file = $_SESSION['routes'][$path]['file'];
    $method = $_SESSION['routes'][$path]['method'];
    $name = $_SESSION['routes'][$path]['name'];
    $function = $_SESSION['routes'][$path]['function'];
    $middlewares = $_SESSION['routes'][$path]['middleware'];

    foreach($middlewares as $middleware => $value) {
        if($value !== $_SESSION['middleware'][$middleware]) {
            echo 'Middleware `'. $middleware .'` has an incorrect value';
            die;
        }
    }

    if($_SERVER['REQUEST_METHOD'] !==  $method) {
        echo 'Method '. $_SERVER['REQUEST_METHOD'] .' not allowed for route name `'. $name .'` (Has to be '. $method .')';
        die;
    }

    if(file_exists('controllers/'. $file .'.php')) {
        require('controllers/'. $file .'.php');
        $file::$function();
    } else {
        echo 'Controller '. $file .'.php does not exists.';
        die;
    }
} else {
    header("HTTP/1.0 404 Not Found");
    echo 'Not found';
}
<?php
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($_SERVER['REQUEST_URI'])['path'];

if(array_key_exists($path, $_SESSION['routes'])) {
    $file = $_SESSION['routes'][$path]['file'];
    $method = $_SESSION['routes'][$path]['method'];
    $name = $_SESSION['routes'][$path]['name'];
    $function = $_SESSION['routes'][$path]['function'];
    $middlewares = $_SESSION['routes'][$path]['middleware'];
    $controller = 'controllers/'. $file .'.php';

    foreach($middlewares as $middleware => $value) {
        if($value !== $_SESSION['middleware'][$middleware]) {
            abort(Response::FORBIDDEN, 'Middleware `'. $middleware .'` has an incorrect value');
        }
    }

    if($_SERVER['REQUEST_METHOD'] !==  $method) {
        abort(Response::FORBIDDEN, 'Method '. $_SERVER['REQUEST_METHOD'] .' not allowed for route name `'. $name .'` (Has to be '. $method .')');
    }

    if(file_exists($controller)) {
        require($controller);
        $file::$function();
    } else {
        abort(Response::NOT_FOUND, 'Controller '. $file .'.php does not exists.');
    }
} else {
    abort(Response::NOT_FOUND);
}
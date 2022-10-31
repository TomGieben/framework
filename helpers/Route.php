<?php

class Route {
    public static function add(string $method, string $path, string $file, string $function, string $name, array $middleware = []): array {
        if(!isset($_SESSION['routes'])) {
            $_SESSION['routes'] = [];
        }

        $_SESSION['routes'][$path] = [
            'method' => $method,
            'name' => $name,
            'path' => $path,
            'function' => $function,
            'file' => $file,
            'middleware' => [],
        ];

        if(!empty($middleware)) {
            foreach($middleware as $middleware => $value) {
                $_SESSION['routes'][$path]['middleware'][$middleware] = $value;
            }
        }

        return $_SESSION['routes'];
    }

    public static function get(string $name): string {
        foreach($_SESSION['routes'] as $route) {
            if($route['name'] == $name) {
                $route = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $route['path'];

                return $route;
            }
        }

        return 'Route not found';
    }
}
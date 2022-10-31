<?php

if (!function_exists('dd')) {
    function dd() {
        echo '<pre>';
        array_map(function($x) {var_dump($x);}, func_get_args());
        die;
    }
}

if (!function_exists('config')) {
    function config(string $file) {
        if(file_exists('configs/' . $file . '.php')) {
            return include('configs/' . $file . '.php');
        } else {
            echo 'Config '. $file .'.php does not exists.';
            die;
        }
    }
}

if (!function_exists('view')) {
    function view(string $path, array $parameters = []) {
        $view = 'views/' . $path . '.view.php';
        if(!empty($parameters)) {
            foreach($parameters as $name => $value) {
                $$name = $value;
            }
        }

        if(file_exists($view)) {
            require($view);
        } else {
            echo 'View '. $path .'.php does not exists.';
            die;
        }
    }
}
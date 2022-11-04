<?php
$functions = scandir("preload/functions");

foreach($functions as $function) {
    if(strpos($function, '.php') !== false) {
        $name = explode('.', $function)[0];

        if (!function_exists($name)) {
            include('preload/functions/' . $function);
        }
    }
}


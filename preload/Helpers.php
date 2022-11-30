<?php
$functions = scandir("helpers");

foreach($functions as $function) {
    if(strpos($function, '.php') !== false) {
        $name = explode('.', $function)[0];

        if (!function_exists($name)) {
            require('helpers/' . $function);
        }
    }
}


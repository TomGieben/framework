<?php
$helpers = scandir("helpers");

foreach($helpers as $helper) {
    if(strpos($helper, '.php') !== false) {
        $name = explode('.', $helper)[0];

        if (!function_exists($name)) {
            require('helpers/' . $helper);
        }
    }
}


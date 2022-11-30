<?php

function config(string $file): array {
    if(file_exists('configs/' . $file . '.php')) {
        return include('configs/' . $file . '.php');
    } else {
        echo 'Config '. $file .'.php does not exists.';
        die;
    }
}
<?php

function config(string $file): array {
    if(file_exists('configs/' . $file . '.php')) {
        return include('configs/' . $file . '.php');
    } else {
        abort(Response::NOT_FOUND, 'Config '. $path .'.php does not exists.');
    }
}
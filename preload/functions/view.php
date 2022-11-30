<?php

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
        abort(Response::NOT_FOUND, 'View '. $path .'.php does not exists.');
    }
}
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
        echo 'View '. $path .'.php does not exists.';
        die;
    }
}
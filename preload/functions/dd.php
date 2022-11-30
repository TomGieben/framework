<?php

function dd(): array {
    echo '<pre>';
    array_map(function($x) {var_dump($x);}, func_get_args());
    die;
}
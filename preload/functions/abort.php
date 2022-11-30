<?php

function abort(int $errorcode, string $message = null) {
    $response = config('response');

    http_response_code($errorcode);
    echo ($message ? $message : $response[$errorcode]);
    die;
}
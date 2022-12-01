<?php

$config = config('database');
$database = new Database;

$database->connection = $config['DB_CONNECTION'];
$database->host = $config['DB_HOST'];
$database->port = $config['DB_PORT'];
$database->database = $config['DB_DATABASE'];
$database->username = $config['DB_USERNAME'];
$database->password = $config['DB_PASSWORD'];

$database->connect();

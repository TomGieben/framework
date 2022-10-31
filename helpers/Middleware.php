<?php
class Middleware {
    public static function add(string $name, bool $value = false): array {
        if(!isset($_SESSION['middleware'])) {
            $_SESSION['middleware'] = [];
        }

        $_SESSION['middleware'][$name] = $value;

        return $_SESSION['middleware'];
    }
}
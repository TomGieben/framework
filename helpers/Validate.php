<?php

class Validate {
    private static $errors = [];

    public static function request(array $validation = []): array {
        $return = [];

        foreach($validation as $field => $functions) {
            $return[$field] = $_REQUEST[$field] ?? null;

            foreach($functions as $function => $value) {
                $function = !is_int($function) ? $function : $value;
                $value = !is_int($function) ? $value : null;
                $content = $return[$field];
                
                self::$function($field, $content, $value);
            }
        }

        if(!empty(self::$errors)) {
            foreach(self::$errors as $error) {
                echo $error . '<br/>';
                // header("location:javascript://history.go(-1)");
                die;
            }
        }

        return $return;
    }

    private static function required(string $name, string $content, $value) {
        if(!$content) {
            self::$errors[] = $name . ' is required';
        }
    }

    private static function min(string $name, string $content, $value) {
        if(strlen($content) < $value) {
            self::$errors[] = $name . ' must be '. $value .' characters long.';
        }
    }

    private static function max(string $name, string $content, $value) {
        if(strlen($content) > $value) {
            self::$errors[] = $name . ' can only be '. $value .' characters long.';
        }
    }
}
<?php
require('helpers/Language.php');

function __(string $translatable): string {
    $base = 'configs/lang/';
    $pieces = explode('.', $translatable);
    $dir = $base . Language::getLocale() . '/';
    $extension = '.php';

    if(!is_dir($dir)) {
        $dir = $base . Language::getFallback() . '/';
        
        if(!is_dir($dir)) {
            return $translatable;
        }
    }

    foreach($pieces as $key => $piece) {
        if(array_key_last($pieces) == $key) {
            $item = $piece;
        } elseif(array_key_last($pieces)-1 == $key) {
            $file = $piece;
        } else {
            if(is_dir($dir . $piece)) {
                $dir = $dir . $piece;
            } else {
                return $translatable;
            }
        }
    }

    if(isset($file)) {
        if(file_exists($dir . $file . $extension)) {
            $array = require($dir . $file . $extension);
            $translatable = (isset($array[$item])) ? $array[$item] : $translatable;
        }
    }

    return $translatable;
}
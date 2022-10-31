<?php

$class = $argv[1];
$fileName = $class . '.php';
$dir = '..\models\\';
$path = $dir . $fileName;
$tablename = $class . 's';
$content = 
'
<?php
    class '. $class .'
    {
        public static function index() {

        }
    
        public static function create() {
    
        }
    
        public static function store() {
    
        }
    
        public static function edit() {
    
        }
    
        public static function update() {
    
        }
    
        public static function delete() {
    
        }
    }
';

if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

if (!file_exists($path)) {
   if($file = fopen($path, "w")) {
        fwrite($file, $content);
        fclose($file);
   } else {
        echo 'Unable to open ' . $fileName;
   }
} else {
    echo 'Controller ' . $fileName . ' already exists.';
}
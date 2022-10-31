<?php

$class = $argv[1];
$fileName = $class . '.php';
$dir = '..\models\\';
$path = $dir . $fileName;
$tablename = $class . 's';
$content = 
'<?php
    namespace App\Model;

    use App\Model;
    include("models/Model.php");

    class '. $class .' extends Model
    {
        public function table() {
            return [
                "tablename" => "'. $tablename .'",
            ];
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
    echo 'Model ' . $fileName . ' already exists.';
}
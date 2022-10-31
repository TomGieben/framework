<?php
namespace App\Model;

use App\Model;
include('models/Model.php');

class Product extends Model
{
    public function table() {
        return [
            'tablename' => 'blocks',
        ];
    }
}

<?php

use App\Model\Product;
include('models/Product.php');

class WelcomeController {
    public static function index() {  
        // $_REQUEST['title'] = 'Dit is een test title';
        // $_REQUEST['text'] = 'Dit is een test text';

        // $test = Validate::request([
        //     'title' => [
        //         'required',
        //     ],
        //     'text' => [
        //         'min' => 10,
        //         'max' => 20,
        //     ],
        // ]);

        // dd($test);

        view('welcome', [
            'title' => __('home.title'),
        ]);
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
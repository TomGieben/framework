<?php

use App\Model\Product;
include('models/Product.php');

class WelcomeController {
    public static function index() {
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
<?php

require('helpers/Route.php');
require('routes/middleware.php');

Route::add('GET', '/home', 'HomeController', 'index', 'home');


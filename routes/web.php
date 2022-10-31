<?php

require('helpers/Route.php');
require('routes/middleware.php');

Route::add('GET', '/', 'WelcomeController', 'index', 'welcome');


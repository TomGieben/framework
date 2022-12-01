<?php

session_start();
session_destroy();

require('preload/Functions.php');
require('preload/Connection.php');
require('routes/web.php');
require('preload/Router.php');

if(!config('website')['APP_DEBUG']) {
    error_reporting(0);
}

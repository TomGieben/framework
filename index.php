<?php

session_start();
session_destroy();

require('preload/Helpers.php');
require('preload/Functions.php');
require('preload/Connection.php');
require('routes/web.php');
require('preload/Router.php');



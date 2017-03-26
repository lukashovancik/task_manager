<?php

require '../vendor/autoload.php';
require '../app/core/bootstrap.php';

$router = Router::load('routes.php');

$router->direct(App::get('request')->uri(),App::get('request')->method());








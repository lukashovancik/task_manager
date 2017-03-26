
<?php

$router->get('','HomeController@index');

$router->get('about-me','HomeController@aboutMe');
$router->get('history','HomeController@history');

$router->get('add-task','TaskController@create');
$router->get('edit-task','TaskController@edit');
$router->get('delete','TaskController@destroy');
$router->get('done-task','TaskController@done');

//post
$router->post('add-task','TaskController@store');
$router->post('edit-task','TaskController@update');

<?php

include "../app/core/functions.php";


//Dependency injection container
App::bind('config', require "../config.php");
App::bind('elequent', loadElequent());
App::bind('htmlBuilder',new HtmlPageBuilder());
App::bind('request',new Request());

//Observer
TaskRepository::getInstance()->attach(new TaskStore());
TaskRepository::getInstance()->attach(new TaskUpdate());
TaskRepository::getInstance()->attach(new TaskDestroy());
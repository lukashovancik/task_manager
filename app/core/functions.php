<?php
use Illuminate\Database\Capsule\Manager as Capsule;


function view($name = 'base', $data = [])
{

    extract($data);

    return require "../app/views/{$name}.view.php";
}

function piece_html($name, $data = [])
{
    return ['view' => "../app/views/{$name}.view.php", 'data' => $data];
}

function redirect($path)
{
    header("Location: /{$path}");
}

function lg($log)
{
    echo "<pre>";
    var_dump($log);
    echo "</pre>";
    die();
}

function priority($priority)
{
    switch ($priority){
        case 1:
            return 'nízka';
        case 2:
            return "stredná";
        case 3:
            return "vysoká";
    }
}


function loadElequent()
{

    $capsule = new Capsule;

    $capsule->addConnection((App::get('config')['database']));

    // Make this Capsule instance available globally via static methods
    $capsule->setAsGlobal();

    // Setup the Eloquent ORM
    $capsule->bootEloquent();

    return $capsule;
}

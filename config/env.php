<?php

$env = $_SERVER['SERVER_NAME'];
$env = 'localhost';
if ($env == 'localhost') {
    $env = 'development';
}


return [
    'name' => $env,
    'host'=>'http://'.$_SERVER['SERVER_NAME']

];
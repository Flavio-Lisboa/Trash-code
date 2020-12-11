<?php

function load($class) {
    //$dir = dirname(__FILE__);
    $file = "class/$class.php";
    if(file_exists($file)) {
        require_once($file);
    }
}

$spl_autoload_register('load');
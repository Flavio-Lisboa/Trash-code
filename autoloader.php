<?php

function load($class) {
    $file = "./Class/$class.php";
    if(file_exists($file)) {
        require_once($file);
    }
}

spl_autoload_register('load');
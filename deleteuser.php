<?php 

require_once "autoloader.php";

$delete = new userDB('Localhost', 'trashcode', 'root', '');

$delete->deleteUser(1);
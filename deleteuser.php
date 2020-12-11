<?php 

require_once "Class/userDB.php";

$delete = new userDB('Localhost', 'trashcode', 'root', '');

$delete->deleteUser(1);
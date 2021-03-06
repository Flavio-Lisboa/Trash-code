<?php 

require_once "autoloader.php";

$edit_del = new CodeDB('Localhost', 'trashcode', 'root', '');

session_start();

$bt_del = filter_var($_POST['btdel'], FILTER_SANITIZE_STRING);
$btedit = filter_var($_POST['btedit'], FILTER_SANITIZE_STRING);

if($bt_del) {
    $edit_del->deleteCode($bt_del);
    header('location: ./frontend/mycode.php');
} 

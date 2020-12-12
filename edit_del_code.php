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

// if(!empty($btedit)) {
    
//     $_SESSION['idcode'] =  $btedit;
//     header('location: ./frontend/mycode.php');
// } 

// $edit_del->updateCode('php2', 'oi', date('Y/m/d H:i:s'), 2);
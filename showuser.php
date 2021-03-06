<?php

require_once "autoloader.php";

$show = new UserDB('Localhost', 'trashcode', 'root', '');

session_start();

$button = filter_var($_POST['clickbutton'], FILTER_SANITIZE_STRING);

if($button) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    if((!empty($email)) and (!empty($password))) { 
        $shows = $show->getUser($email);
        foreach($shows as $show) {
            $id = $show->id_user;
            $useremail = $show->email;
            $pass = $show->user_password;
        }
        if($useremail === $email) {
            $encrypted_password = md5($password);
            if($encrypted_password === $pass) {
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $useremail;
                $_SESSION['pass'] = $pass;
                header('location: ./frontend/code.php');
            } else {
                $_SESSION['msg'] = "Senha incorreta!";
                header('location: ./frontend/login.php');
            }
        } else {
            $_SESSION['msg'] = "Esse usuário não existe!";
            header('location: ./frontend/login.php');
        }
    } else {
        $_SESSION['msg'] = "Todos os campos devem estar preenchidos!";
        header('location: ./frontend/login.php');
    }
} else {
    $_SESSION['msg'] = "Página não encontrada";
    header('location: ./frontend/login.php');
}

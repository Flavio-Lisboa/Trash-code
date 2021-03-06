<?php

require_once "autoloader.php";

$user = new UserDB('Localhost', 'trashcode', 'root', '');

session_start();

$reg_button = filter_var($_POST['clickbutton'], FILTER_SANITIZE_STRING);

if($reg_button) {
    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $user_email =  $data['email'];
    $password = $data['password'];
    if((!empty($user_email)) and (!empty($password))) {
        if(filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $shows = $user->getUser($user_email);
            foreach($shows as $user) {
                $id = $user->id_user;
                $email = $user->email;
                $pass = $user->user_password;
            }        
            if($user_email != $email) {
                if(mb_strlen($password) > 7) {
                    $encrypted_password = md5($data['password']);
                    $user->insert($user_email, $encrypted_password);
                    header('location: ./frontend/code.php');
                }else {
                    $_SESSION['msg'] = "A senha deve conter no mínimo 8 caracteres";
                    header('location: ./frontend/register.php');
                }            
            } else {
                $_SESSION['msg'] = "Já existe um usuário com esse email, escolha outro";
                header('location: ./frontend/register.php');
            }        
        } else {
            $_SESSION['msg'] = "Email inválido!";
            header('location: ./frontend/register.php');
        }
    } else {
        $_SESSION['msg'] = "Todos os campos devem estar preenchidos!";
        header('location: ./frontend/register.php');
    }
} else {
    $_SESSION['msg'] = "Página não encontrada";
    header('location: ./frontend/register.php');
}













   





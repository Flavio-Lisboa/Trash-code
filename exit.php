<?php

session_start();
unset($_SESSION['id'], $_SESSION['email'], $_SESSION['pass']);

$_SESSION['msg'] = "Deslogado com sucesso!";
header('location: ./frontend/login.php');
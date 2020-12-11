<?php

require_once "Class/userDB.php";

$client = new UserDB('Localhost', 'trashcode', 'root', '');

$client->updateUser(1, 'aaasssvvv@gmail.com', '123');


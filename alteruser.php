<?php

require_once "autoloader.php";

$client = new UserDB('Localhost', 'trashcode', 'root', '');

$client->updateUser(1, 'aaasssvvv@gmail.com', '123');


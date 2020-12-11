<?php

require_once "user.php";

class UserDB {

    private $connection;

    public function __construct($host, $dbname, $user, $password) {
        $this->connection = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);
    }

    public function insert($email, $user_password) {
        $insert = $this->connection->prepare("insert into users(email, user_password) values(?, ?)");
        return $insert->execute([$email, $user_password]);
    }

    public function getUser($email) {
        $read = $this->connection->prepare("select * from users where email = ?");
        $read->execute([$email]);
        return $read->fetchAll(PDO::FETCH_OBJ);
        }

    public function deleteUser($id_user) {
        $delete = $this->connection->prepare("delete from users where id_user = :id");
        $delete->bindValue(":id", $id_user, PDO::PARAM_INT);
        $delete->execute();
    }
    
    public function updateUser($id_user, $email, $user_password){
        $update = $this->connection->prepare("update users set email = :email, user_password = :password where id_user = :id");
        $update->bindValue(":email", $email, PDO::PARAM_STR);
        $update->bindValue(":password", $user_password, PDO::PARAM_STR);
        $update->bindValue(":id", $id_user, PDO::PARAM_INT);
        $update->execute();
      }

}

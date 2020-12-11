<?php 

class CodeDB {

    private $connection;

    public function __construct($host, $dbname, $user, $password) {
        $this->connection = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);
    }

    public function insert($title, $content, $id_user, $code_date) {
        $insert = $this->connection->prepare("insert into codes(title, content, id_user, code_date) values(?, ?, ?, ?)");
        return $insert->execute([$title, $content, $id_user, $code_date]);
    }

    public function getCode($id_user) {
    $read = $this->connection->prepare("select * from codes where id_user= ?");
    $read->execute([$id_user]);
    return $read->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateCode($title, $content, $code_date, $id_code) {
    $update = $this->connection->prepare("update codes set title = :title, content = :content, code_date = :code_date where id_code = :id");
    $update->bindValue(":title", $title, PDO::PARAM_STR);
    $update->bindValue(":content", $content, PDO::PARAM_STR);
    $update->bindValue(":code_date", $code_date, PDO::PARAM_STR);
    $update->bindValue(":id", $id_code, PDO::PARAM_INT);
    $update->execute();
    }

    public function deleteCode($id_code) {
    $delete = $this->connection->prepare("delete from codes where id_code = :id");
    $delete->bindValue(":id", $id_code, PDO::PARAM_INT);
    $delete->execute();
    }
    
}





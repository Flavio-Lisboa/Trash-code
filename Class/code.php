<?php

class Code{
  private $title;
  private $content;
  private $id_user;
  private $code_date;

  public function __construct($title=null, $content, $id_user)
  {
    $this->setTitle($title);
    $this->setContent($content);
    $this->setIdUser($id_user);
    $this->code_date = setCodeDate();
  }

  public function getTitle(){
    return $this->title;
  }

  public function setTitle($title){
    $this->title = $title;
  }

  public function getContent(){
    return $this->content;
  }

  public function setContent($content){
    $this->content = $content;
  }

  public function getIdUser(){
    return $this->id_user;
  }

  public function setIdUser($id_user){
    $this->id_user = $id_user;
  }

  public function getCodeDate(){
    return $this->note_date;
  }

  public function setCodeDate(){
    $this->code_date = date("Y/m/d h:i:s");
  }

}
<?php
require_once("../../database/dbservice.php");

class Social{
  public $id;
  public $name;
  public $link;

  public function __construct ($id, $name, $link)
  {
    $this->id = $id;
    $this->name = $name;
    $this->link = $link;
  }

  public function insert_social(){
    $db = new Db();
    $sql = "INSERT INTO Social (SocialId, SocialName, Link) VALUES
    ('$this->id','$this->name','$this->link')";

    $result = $db->query_execute($sql);
    return $result;
  }

  public function list_social()
  {
    $db = new Db();
    $sql = "SELECT * FROM Social";
    $result = $db->select_to_array($sql);
    return $result;
  }

  public function delete_social()
  {
    $db = new Db();
    $sql = "DELETE from Social where SocialId = '$this->id'" ;
    $result =  $db->query_execute($sql);
    return $result;
  }

  public function update_social (){
      $sql = "UPDATE Social SET Link = '$this->link'
        where SocialId = '$this->id'";
    $db = new Db();
    $result = $db->query_execute($sql);
    return $result;
  }
}
 ?>

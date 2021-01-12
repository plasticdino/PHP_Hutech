<?php
require_once("../../database/dbservice.php");

class Image{
  public $id;
  public $link;
  public $proid;

public function __construct ($link, $proid)
{
  $this->link = $link;
  $this->proid = $proid;
}

public function insert_image(){

  $db = new Db();
  $sql = "INSERT INTO Image (ImageLink, ProductId) VALUES
  ('$this->link', '$this->proid')";

  $result = $db->query_execute($sql);
  return $result;
}

// delete imagearc
public function delete_image($id)
{
  $db = new Db();
  $sql = "DELETE from Image where ImageId = '$id'" ;
  $result =  $db->query_execute($sql);
  return $result;
}
}
 ?>

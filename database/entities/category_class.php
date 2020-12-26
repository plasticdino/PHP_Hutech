<?php
require_once("../../database/dbservice.php");

class Category{
  public $id;
  public $name;
  public $img;
  public $desc;

  public function __construct ($name, $img, $desc)
  {
    $this->name = $name;
    $this->img = $img;
    $this->desc = $desc;
  }

  public function insert_category(){
    $file_temp = $this->img['tmp_name'];
    $user_file = $this->img['name'];
    $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
    $filepath = "../../media/image/".$timestamp.$user_file;
    if(move_uploaded_file($file_temp, $filepath) == false)
    {
      return false;
    }

    $db = new Db();
    $sql = "INSERT INTO Category (CategoryName, CategoryImage, CategoryDescription) VALUES
    ('$this->name','$filepath','$this->desc')";

    $result = $db->query_execute($sql);
    return $result;
  }

  public static function list_category()
  {
    $db = new Db();
    $sql = "SELECT * FROM Category";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public static function delete_category($id)
  {
    $db = new Db();
    $sql = "DELETE from Category where CategoryId = $id" ;
    $result =  $db->query_execute($sql);
    return $result;
  }
}
 ?>

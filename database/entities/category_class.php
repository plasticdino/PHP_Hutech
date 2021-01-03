<?php
require_once("../../database/dbservice.php");

class Category{
  public $id;
  public $name;
  public $img;
  public $desc;

  public function __construct ($id, $name, $img, $desc)
  {
    $this->id = $id;
    $this->name = $name;
    $this->img = $img;
    $this->desc = $desc;
  }

  public function insert_category(){
    $file_temp = $this->img['tmp_name'];
    $user_file = $this->img['name'];
    $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
    $filepath = "../../media/image/category/".$timestamp.$user_file;
    if(move_uploaded_file($file_temp, $filepath) == false)
    {
      return false;
    }

    $db = new Db();
    $sql = "INSERT INTO Category (CategoryId, CategoryName, CategoryImage, CategoryDescription) VALUES
    ('$this->id','$this->name','$filepath','$this->desc')";

    $result = $db->query_execute($sql);
    return $result;
  }

  public function list_category()
  {
    $db = new Db();
    $sql = "SELECT * FROM Category";
    $result = $db->select_to_array($sql);
    return $result;
  }

  public function delete_category()
  {
    $db = new Db();
    $sql = "DELETE from Category where CategoryId = '$this->id'" ;
    $result =  $db->query_execute($sql);
    return $result;
  }

  public function update_category ($haveImage){
    if ($haveImage == true)
    {
      $file_temp = $this->img['tmp_name'];
      $user_file = $this->img['name'];
      $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
      $filepath = "../../media/image/category/".$timestamp.$user_file;
      if(move_uploaded_file($file_temp, $filepath) == false)
      {
        return false;
      }
      $sql = "UPDATE Category SET CategoryName = '$this->name', CategoryImage = '$filepath',CategoryDescription='$this->desc' where CategoryId = '$this->id'";
    }
    else
    {
      $sql = "UPDATE Category SET CategoryName = '$this->name',CategoryDescription='$this->desc' where CategoryId = '$this->id'";
    }
    $db = new Db();
    $result = $db->query_execute($sql);
    return $result;
  }
  public function id_exist()
  {
    $db = new Db();
    $sql = "SELECT CategoryId FROM Category WHERE CategoryId ='$this->id'";
    $result = $db->query_execute($sql);

    if (!empty($result))
    {
      return true;
    }
    return false;
  }
}
 ?>

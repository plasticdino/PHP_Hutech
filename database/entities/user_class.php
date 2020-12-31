<?php
require_once("../../database/dbservice.php");

class Category{
  public $id;
  public $name;
  public $email;
  public $phone;
  public $img;
  public $role;

  public function __construct ($id, $name, $email, $phone, $img, $role)
  {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->phone = $phone;
    $this->img = $img;
    $this->role = $role;
  }

  public function insert_user(){
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

  public function list_user()
  {
    $db = new Db();
    $sql = "SELECT * FROM Category";
    $result = $db->select_to_array($sql);
    return $result;
  }

  public function delete_user()
  {
    $db = new Db();
    $sql = "DELETE from Category where CategoryId = '$this->id'" ;
    $result =  $db->query_execute($sql);
    return $result;
  }

  public function update_user ($haveImage){
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
}
 ?>

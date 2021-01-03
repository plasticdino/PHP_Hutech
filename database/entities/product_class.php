<?php
require_once("../../database/dbservice.php");

class Product{
  public $id;
  public $name;
  public $price;
  public $desc;
  public $storage;
  public $cateid;
  public $img;

  public function __construct ($id, $name, $price, $desc, $storage, $cateid, $img)
  {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->desc = $desc;
    $this->storage = $storage;
    $this->cateid = $cateid;
    $this->img = $img;
  }

  public function insert_product(){
    $file_temp = $this->img['tmp_name'];
    $user_file = $this->img['name'];
    $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
    $filepath = "../../media/image/product/".$timestamp.$user_file;
    if(move_uploaded_file($file_temp, $filepath) == false)
    {
      return false;
    }

    $db = new Db();
    $sql = "INSERT INTO Product (ProductId, ProductName,ProductPrice, ProductDescription, Storage, CategoryId, ProductImage) VALUES
    ('$this->id','$this->name','$this->price','$this->desc', '$this->storage','$this->cateid', '$filepath')";

    $result = $db->query_execute($sql);
    return $result;
  }

  public function list_product()
  {
    $db = new Db();
    $sql = "SELECT * FROM Product";
    $result = $db->select_to_array($sql);
    return $result;
  }

  public function delete_product()
  {
    $db = new Db();
    $sql = "DELETE from Product where ProductId = '$this->id'" ;
    $result =  $db->query_execute($sql);
    return $result;
  }

  public function update_product ($haveImage){
    if ($haveImage == true)
    {
      $file_temp = $this->img['tmp_name'];
      $user_file = $this->img['name'];
      $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
      $filepath = "../../media/image/product/".$timestamp.$user_file;
      if(move_uploaded_file($file_temp, $filepath) == false)
      {
        return false;
      }
      $sql = "UPDATE Product SET ProductName = '$this->name', ProductPrice = '$this->price',
        ProductDescription='$this->desc', Storage = '$this->storage', CategoryId = '$this->cateid', ProductImage = '$filepath'
        where ProductId = '$this->id'";
    }
    else
    {
      $sql = "UPDATE Product SET ProductName = '$this->name', ProductPrice = '$this->price',
        ProductDescription='$this->desc', Storage = '$this->storage', CategoryId = '$this->cateid'
        where ProductId = '$this->id'";
    }
    $db = new Db();
    $result = $db->query_execute($sql);
    return $result;
  }
  public function id_exist()
  {
    $db = new Db();
    $sql = "SELECT ProductId FROM Product WHERE ProductId='$this->id'";
    $result = $db->query_execute($sql);

    if (!empty($result))
    {
      return true;
    }
    return false;
  }
}
 ?>
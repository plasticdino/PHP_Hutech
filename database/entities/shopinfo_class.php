<?php
require_once("../../database/dbservice.php");

class ShopInfo{
  public $id;
  public $phone;
  public $address;

  public function __construct ($phone, $address)
  {
    $this->phone = $phone;
    $this->address = $address;
  }

  public function insert_info(){
    $db = new Db();
    $sql = "INSERT INTO ShopInfo (Phone, Address) VALUES
    ('$this->phone','$this->address')";

    $result = $db->query_execute($sql);
    return $result;
  }

  public function list_info()
  {
    $db = new Db();
    $sql = "SELECT * FROM ShopInfo";
    $result = $db->select_to_array($sql);
    return $result;
  }

  public function delete_info($id)
  {
    $db = new Db();
    $sql = "DELETE from ShopInfo where ShopInfoId = '$id'" ;
    $result =  $db->query_execute($sql);
    return $result;
  }

  public function update_info ($id){
      $sql = "UPDATE ShopInfo SET Phone = '$this->phone', Address = '$this->address'
        where ShopInfoId = '$id'";
    $db = new Db();
    $result = $db->query_execute($sql);
    return $result;
  }
}
 ?>

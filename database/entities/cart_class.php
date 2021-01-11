<?php
require_once("../../database/dbsevice.php");

class Cart{
  public $id;
  public $proid;
  public $userid;
  public $quantity;

  public function __construct ($pro, $user, $quan)
  {
    $this->proid = $pro;
    $this->userid = $user ;
    $this->quantity = $quan;
  }

  public function insert_cart(){
    $db = new Db();
    $sql = "INSERT INTO Cart (UserId, ProductId, Quantity)
    VALUES ('$this->userid', '$this->proid', '$this->quantity')";

    $result = $db->query_execute($sql);
    return $result;
  }
  public function list_cart (){
    $db = new Db();
    $sql = "SELECT * FROM Cart";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public function delete_cart($id){
    $db = new Db();
    $sql = "DELETE from Cart where CartId = '$id'";
    $result = $db->query_execute($sql);
    return $result;
  }
}
 ?>

<?php
require_once("../../database/dbservice.php");

class Orderitem{
  public $id;
  public $orderingid;
  public $quantity;
  public $totalprice;
  public $productid;

  public function __construct ($orderingid, $quantity, $totalprice, $productid)
  {
    $this->orderingid = $orderingid;
    $this->quantity = $quantity;
    $this->totalprice = $totalprice;
    $this->productid = $productid;
  }

  public function insert_orderitem(){
    $db = new Db();
    $sql = "INSERT INTO orderitem (OrderingId, Quantity, TotalPrice, ProductId) VALUES (
            '$this->orderingid',
            '$this->quantity',
            '$this->totalprice',
            '$this->productid')";
    $result = $db->query_execute($sql);
    return $result;
  }
}
?>
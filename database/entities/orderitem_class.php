<?php
require_once("../../database/dbservice.php");

class Orderitem{
  public $id;
  public $orderingid;
  public $quantity;
  public $totalprice;

  public function __construct ($orderingid, $quantity, $totalprice)
  {
    $this->orderingid = $orderingid;
    $this->quantity = $quantity;
    $this->totalprice = $totalprice;
  }

  public function insert_orderitem(){
    $db = new Db();
    $sql = "INSERT INTO orderitem (OrderingId, Quantity, TotalPrice) VALUES (
            '$this->orderingid',
            '$this->quantity',
            '$this->totalprice')";
    $result = $db->query_execute($sql);
    return $result;
  }
}
?>
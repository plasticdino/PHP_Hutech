<?php
require_once("../../database/dbservice.php");

class Ordering{
  public $orderingid;
  public $userid;
  public $state;

  public function __construct ($userid, $state)
  {
    $this->userid = $userid;
    $this->state = $state;
  }

  public function insert_order(){
    $db = new Db();
    $get_id = "SELECT OrderingId FROM ordering where UserId =".$this->userid." ORDER BY OrderingId DESC LIMIT 1";
    $id = $db->select_to_array($get_id);
    if (empty($id)){
        $idx = 0;
    }else{
        $idx = intval(explode("_",$id[0]['OrderingId'])[0])+1;
    }
    $prikey = $idx."_".$this->userid;
    $sql = "INSERT INTO ordering (OrderingId, UserId, OrderDate, State) VALUES (
            '$prikey',
            '$this->userid', 
            now(),
            '$this->state')";
    $result = $db->query_execute($sql);
    return array($result,$prikey);
  }
  public function list_order()
  {
    $db = new Db();
    $sql = "SELECT * FROM ordering";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public function update_order($orderingid,$state){
    $db = new Db();
    $sql = "UPDATE ordering SET State = ".$state." WHERE OrderingId = '".$orderingid."'";
    // print_r($sql);
    // exit(0);
    $result = $db->query_execute($sql);
    return $result;
  }
  public function delete_order($orderingid){
    $db = new Db();
    $sql = "DELETE FROM ordering WHERE OrderingId = '".$orderingid."'";
    $result = $db->query_execute($sql);
    return $result;
  }
}
 ?>

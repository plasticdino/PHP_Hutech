<?php
require_once("../../database/dbservice.php");

class Ordering{
  public $id;
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
  public function checkUserExists($username){
    $db = new Db();
    $sql = "SELECT * FROM User WHERE Username = '$username'";
    $result = $db->select_to_array($sql);
    return empty($result);
  }
  public function checkLogin($username, $password){
    $db = new Db();
    $pw = md5($password);
    $sql = "SELECT * FROM user WHERE Username = '$username' AND Password = '$pw'";
    $result = $db->select_to_array($sql);
    return $result[0];
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

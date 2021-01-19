<?php
require_once("../../database/dbservice.php");

class User{
  public $id;
  public $username;
  public $email;
  public $phone;
  public $role;
  public $address;
  public $password;

  public function __construct ($username, $email, $phone, $role, $address, $password)
  {
    $this->username = $username;
    $this->email = $email;
    $this->phone = $phone;
    $this->address = $address;
    $this->role = $role;
    $this->password = $password;
  }

  public function insert_user(){
    $db = new Db();
    $email = !empty($this->email) ? $this->email : NULL;
    $phone = !empty($this->phone) ? $this->phone : NULL;
    $address = !empty($this->address) ? $this->address : NULL;
    // $sql = "INSERT INTO user (Name, Email, Phone, Role, Address, Password) 
    // VALUES ('$this->name','$this->email','$this->phone','$this->role','$this->address','".md5(mysqli_real_escape_string($db->connect(), $this->password))."')";
    // $sql = "INSERT INTO user (Name, Email, Phone, Role, Address, Password) 
    // VALUES ('$this->name','$this->email','$this->phone','$this->role','$this->address','$this->password')";
    $sql = "INSERT INTO user (Username, Email, Phone, Role, Address, Password) VALUES (
            '".mysqli_real_escape_string($db->connect(),$this->username)."',
            '$email',
            '$phone',
            '$this->role',
            '$address',
            '".md5(mysqli_real_escape_string($db->connect(), $this->password))."')";
    print_r($sql);
    // exit(0);
    $result = $db->query_execute($sql);
    return $result;
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

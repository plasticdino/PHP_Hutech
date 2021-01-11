<?php
require_once("../../database/dbservice.php");

class Banner{
  public $id;
  public $image;
  public $content;

  public function __construct ($image, $content)
  {
    $this->image = $image;
    $this->content = $content;
  }

  public function insert_banner(){
    $file_temp = $this->image['tmp_name'];
    $user_file = $this->image['name'];
    $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
    $filepath = "../../media/image/shop/banner/".$timestamp.$user_file;
    if(move_uploaded_file($file_temp, $filepath) == false)
    {
      return false;
    }

    $db = new Db();
    $sql = "INSERT INTO Banner (BannerImage, BannerContent) VALUES
    ('$filepath','$this->content')";

    $result = $db->query_execute($sql);
    return $result;
  }

  public function list_banner()
  {
    $db = new Db();
    $sql = "SELECT * FROM Banner";
    $result = $db->select_to_array($sql);
    return $result;
  }

  public function delete_banner($id)
  {
    $db = new Db();
    $sql = "DELETE from Banner where BannerId = '$id'" ;
    $result =  $db->query_execute($sql);
    return $result;
  }

  public function update_banner ($id, $haveImage){
    if ($haveImage == true)
    {
      $file_temp = $this->image['tmp_name'];
      $user_file = $this->image['name'];
      $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
      $filepath = "../../media/image/shop/banner/".$timestamp.$user_file;
      if(move_uploaded_file($file_temp, $filepath) == false)
      {
        return false;
      }
      $sql = "UPDATE Banner SET BannerImage = '$filepath', BannerContent = '$this->content'
      where BannerId = '$id'";
    }
    else
    {
      $sql = "UPDATE Banner SET BannerContent = '$this->content'
      where BannerId = '$id'";
    }
    $db = new Db();
    $result = $db->query_execute($sql);
    return $result;
  }
  public function clear_banner ($id)
  {
    $sql = "UPDATE Banner SET BannerImage = '', BannerContent = '' where BannerId = '$id'";

    $db = new Db();
    $result = $db->query_execute($sql);
    return $result;
  }
}
 ?>

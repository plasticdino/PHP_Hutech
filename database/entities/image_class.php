<?php
require_once("../../database/dbservice.php");

class Image{
  public $id;
  public $link;
  public $proid;
}

public function __construct ($id, $link, $proid)
{
  $this->id = $id;
  $this->link = $link;
  $this->proid = $proid;
}

public function insert_image(){
  
}
 ?>

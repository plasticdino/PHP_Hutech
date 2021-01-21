<!DOCTYPE html>
<html lang="vi"><?php
  $title = "Order List";
  include_once("partials/header.php");
  if(isset($_POST["update_order"])){
    $orderingid = $_POST["orderingid"];
    $state = $_POST["state"];

    $result = Ordering::update_order($orderingid,$state);
    if(!$result)
    {
      header("Location:order_list.php?failure");
    }
    else
    {
      header("Location:order_list.php?updated");
    }
  }
  if(isset($_POST["delete_order"])){
    $orderingid = $_POST["orderingid"];

    $result = Ordering::delete_order($orderingid);

    if(!$result)
    {
      header("Location:order_list.php?failure");
    }
    else
    {
      header("Location:order_list.php?deleted");
    }
  }
?><body>
    <div class="container-scroller"><?php
      include_once("partials/navbar.php");
      ?><div class="container-fluid page-body-wrapper"><?php
        include_once("partials/sidebar.php");
        ?><div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-body"><?php
                    if(isset($_GET["updated"])){
                      $notification = "Update order successfully !!!";
                      include_once("partials/notify.php");
                    }
                    else if(isset($_GET["deleted"])){
                      $notification = "Delete order successfully !!!";
                      include_once("partials/notify.php");
                    }
                   ?><h4 class="card-title">order List</h4>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th width:"10%">
                          Order ID
                        </th>
                        <th width:"10%">
                          User ID
                        </th>
                        <th width:"40%">
                          Order Date
                        </th>
                        <th width:"30%">
                          State
                        </th>
                        <th width:"5%">
                          Edit
                        </th>
                        <th width:"5%">
                          Delete
                        </th>
                      </tr>
                    </thead>

                    <tbody><?php
                      foreach ($orders as $item){
                       ?><tr>
                        <td ><?php echo $item["OrderingId"]; ?></td>
                        <td ><?php echo $item["UserId"]; ?></td>
                        <td><?php
                          $string = $item["OrderDate"];
                          if (strlen($string) <= 30)
                          {
                            echo $string;
                          }
                          else
                          {
                            echo (substr($string, 0, 30). "...");
                          }
                          ?></td>
                        <td><?php
                            $intstate = $item["State"];
                            if ($intstate == 0)
                            {
                              echo "<font color='blue'>Processing</font>";
                            }
                            else
                            {
                              echo "<font color='green'>Done</font>";
                            }
                           ?></td>
                        <td>
                          <button type="edit" class="btn btn-primary mr-2 btn-sm btnedit">EDIT</button>
                        </td>
                        <td>
                          <button type="delete" class="btn btn-primary mr-2 btn-sm btndelete">DELETE</button>
                        </td>
                      </tr><?php }
                      ?></tbody>
                  </table>
                </div>
              </div>
            </div><?php
             include_once("partials/footer.php");
             include_once("order_edit.php");
             include_once("order_delete.php");
             ?></div>
        </div>
      </div>
    </div>

    <?php include_once("partials/scripts.php") ?>

    <script>
      $(document).ready(function (){
        var content = new Array();
        content =<?php echo json_encode($orders); ?>;
        //console.log(content);
        btnedit = document.querySelectorAll('.btnedit');
        for(let i = 0; i < content.length; i++){
          btnedit[i].onclick = function(){
            $('#editmodal').modal('show');
            $('#txtedit_orderingid').val(content[i].OrderingId);
            $('#txtedit_userid').val(content[i].UserId);
            $('#txtedit_orderdate').val(content[i].OrderDate);
            if (content[i].State == 0){
              $('#rdbedit_processing').prop("checked",true);  
            }else{
              $('#rdbedit_done').prop("checked",true);  
            }
          }
        }
        btndelete = document.querySelectorAll('.btndelete');
        for(let i = 0; i < content.length; i++){
          btndelete[i].onclick = function(){
            $('#deletemodal').modal('show');
            $('#txtdelete_orderingid').val(content[i].OrderingId);
            $('#txtdelete_userid').val(content[i].UserId);
            $('#txtdelete_orderdate').val(content[i].OrderDate);
            if (content[i].State == 0){
              $('#rdbdelete_processing').prop("checked",true);  
            }else{
              $('#rdbdelete_done').prop("checked",true);  
            }

            //show image fro database
            var _img = document.getElementById('show_delete_order_image');
            var newImg = new Image;
            newImg.onload = function()
            {
                _img.src = this.src;
            }
            newImg.src = content[i].orderImage;
          }
        }
      });
    </script>
  </body>
</html>

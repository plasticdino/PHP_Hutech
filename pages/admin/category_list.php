<!DOCTYPE html>
<html lang="vi"><?php
  $title = "Category Add";
  include_once("partials/header.php");

  if(isset($_POST["update_category"])){
    $cateId = $_POST["category_id"];
    $cateName = $_POST["category_name"];
    $getImage = $_POST["category_image"];
    $cateImage = $_FILES["category_image"];
    $cateDesc = $_POST["category_description"];

    $newCategory = new Category($cateId,$cateName, $cateImage, $cateDesc);

    if ($cateImage['name'] == '' || $cateImage['size'] == 0)
    {
      $result = $newCategory->update_category(false);
    }
    else
    {
      $result = $newCategory->update_category(true);
    }
    if(!$result)
    {
      header("Location:category_list.php?failure");
    }
    else
    {
      header("Location:category_list.php?updated");
    }
  }
  if(isset($_POST["delete_category"])){
    $cateId = $_POST["delete_category_id"];

    $newCategory = new Category($cateId,'', '', '');
    $result = $newCategory->delete_category();

    if(!$result)
    {
      header("Location:category_list.php?failure");
    }
    else
    {
      header("Location:category_list.php?deleted");
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
                      $notification = "Update category successfully !!!";
                      include_once("partials/notify.php");
                    }
                    else if(isset($_GET["deleted"])){
                      $notification = "Delete category successfully !!!";
                      include_once("partials/notify.php");
                    }
                   ?><h4 class="card-title">Category List</h4>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th width:"10%">
                          Id
                        </th>
                        <th width:"10%">
                          Image
                        </th>
                        <th width:"40%">
                          Name
                        </th>
                        <th width:"30%">
                          Description
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
                      foreach ($cates as $item){
                       ?><tr>
                        <td ><?php echo $item["CategoryId"]; ?></td>
                        <td class="py-1">
                          <img src="<?php echo $item["CategoryImage"];?>" class="img-responsive" alt="Image">
                        </td>
                        <td><?php
                          $string = $item["CategoryName"];
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
                            $string = $item["CategoryDescription"];
                            if (strlen($string) <= 30)
                            {
                              echo $string;
                            }
                            else
                            {
                              echo (substr($string, 0, 30). "...");
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
             include_once("category_edit.php");
             include_once("category_delete.php");
             ?></div>
        </div>
      </div>
    </div>

    <?php include_once("partials/scripts.php") ?>

    <script>
      $(document).ready(function (){
        var content = new Array();
        content =<?php echo json_encode($cates); ?>;
        //console.log(content);
        btnedit = document.querySelectorAll('.btnedit');
        for(let i = 0; i < content.length; i++){
          btnedit[i].onclick = function(){
            $('#editmodal').modal('show');
            $('#category_id').val(content[i].CategoryId);
            $('#category_name').val(content[i].CategoryName);
            $('#category_description').val(content[i].CategoryDescription);

            //show image fro database
            var _img = document.getElementById('show_category_image');
            var newImg = new Image;
            newImg.onload = function()
            {
                _img.src = this.src;
            }
            newImg.src = content[i].CategoryImage;
          }
        }
        btndelete = document.querySelectorAll('.btndelete');
        for(let i = 0; i < content.length; i++){
          btndelete[i].onclick = function(){
            $('#deletemodal').modal('show');
            $('#delete_category_id').val(content[i].CategoryId);
            $('#delete_category_name').val(content[i].CategoryName);
            $('#delete_category_description').val(content[i].CategoryDescription);

            //show image fro database
            var _img = document.getElementById('show_delete_category_image');
            var newImg = new Image;
            newImg.onload = function()
            {
                _img.src = this.src;
            }
            newImg.src = content[i].CategoryImage;
          }
        }
      });
      //load image when user choose new files
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#show_category_image')
                      .attr('src', e.target.result);
              };

              reader.readAsDataURL(input.files[0]);
          }
      }
    </script>
  </body>
</html>

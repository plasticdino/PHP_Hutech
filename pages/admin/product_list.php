<!DOCTYPE html>
<html lang="vi"><?php
  $title = "Product Add";
  include_once("partials/header.php");
  require_once("../../database/entities/product_class.php");
  $pros = Product::list_product();

  if(isset($_POST["delete_product"])){
    $proId = $_POST["delete_product_id"];
    $newProduct = new Product($proId,'', '', '','', '', '','');
    $result = $newProduct->delete_product();

    if(!$result)
    {
      header("Location:product_list.php?failure");
    }
    else
    {
      header("Location:product_list.php?deleted");
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
                   ?><h4 class="card-title">Product List</h4>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th width:"5%">
                          Id
                        </th>
                        <th width:"10%">
                          Image
                        </th>
                        <th width:"10%">
                          Name
                        </th>
                        <th width:"10%">
                          Category type
                        </th>
                        <th width:"25%">
                          Description
                        </th>
                        <th width:"15%">
                          Price
                        </th>
                        <th width:"15%">
                          Storage
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
                      foreach ($pros as $item){
                       ?><tr>
                        <td><?php echo $item["ProductId"]; ?></td>
                        <td class="py-1">
                          <img src="<?php echo $item["ProductImage"];?>" class="img-responsive" alt="Image">
                        </td>
                        <td><?php
                          $string = $item["ProductName"];
                          if (strlen($string) <= 30)
                          {
                            echo $string;
                          }
                          else
                          {
                            echo (substr($string, 0, 30). "...");
                          }
                          ?></td>
                        <td ><?php echo $item["CategoryId"]; ?></td>
                        <td><?php
                            $string = $item["ProductDescription"];
                            if (strlen($string) <= 30)
                            {
                              echo $string;
                            }
                            else
                            {
                              echo (substr($string, 0, 30). "...");
                            }
                           ?></td>
                        <td ><?php echo $item["ProductPrice"]; ?></td>
                        <td ><?php echo $item["Storage"]; ?></td>
                        <td>
                          <button type="button" onclick="location.href='product_edit.php?id=<?php echo $item["ProductId"]; ?>'"
                            class="btn btn-primary mr-2 btn-sm btnedit">EDIT</button>
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
             include_once("product_delete.php");
             ?></div>
        </div>
      </div>
    </div>

    <?php include_once("partials/scripts.php") ?>

    <script>
      $(document).ready(function (){
        var content = new Array();
        content =<?php echo json_encode($pros); ?>;

        btndelete = document.querySelectorAll('.btndelete');
        for(let i = 0; i < content.length; i++){
          btndelete[i].onclick = function(){
            $('#deletemodal').modal('show');
            $('#delete_product_id').val(content[i].ProductId);
            $('#delete_product_name').val(content[i].ProductName);
            $('#delete_product_description').val(content[i].ProductDescription);
            $('#delete_product_price').val(content[i].ProductPrice);
            $('#delete_product_storage').val(content[i].Storage);
            $('#delete_category_id').val(content[i].CategoryId);

            //show image fro database
            var _img = document.getElementById('show_delete_product_image');
            var newImg = new Image;
            newImg.onload = function()
            {
                _img.src = this.src;
            }
            newImg.src = content[i].ProductImage;
          }
        }
      });
      //load image when user choose new files
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#show_product_image')
                      .attr('src', e.target.result);
              };

              reader.readAsDataURL(input.files[0]);
          }
      }
    </script>
  </body>
</html>

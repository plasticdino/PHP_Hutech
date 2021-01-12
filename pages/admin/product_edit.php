<!DOCTYPE html>
<html lang="vi"><?php
  $title = "Product Add";
  include_once("partials/header.php");
  require_once("../../database/entities/product_class.php");

  //lấy giá trị id từ url
  if (isset($_GET["id"]))
  {
    $pro_id = $_GET["id"];
    $pro = reset(Product::get_product($pro_id));

    if(isset($_POST["edit_product"])){
      $proId = $_POST["product_id"];
      $proName = $_POST["product_name"];
      $proPrice = $_POST["product_price"];
      $proDesc = $_POST["product_description"];
      $proStorage = $_POST["product_storage"];
      $cateId = $_POST["category_id"];
      $getImage = $_POST["product_image"];
      $proImage = $_FILES["product_image"];
      $proSale = $_POST["product_sale"];

      $newProduct = new Product ($proId, $proName, $proPrice, $proDesc, $proStorage,$cateId, $proImage,'');

      if ($proImage['name'] == '' || $proImage['size'] == 0)
      {
        $result = $newProduct->update_product(false);
      }
      else
      {
        $result = $newProduct->update_product(true);
      }
      if(!$result)
      {
        header("Location: ?failure");
      }
      else
      {
        header("Location: ?updated");
      }
    }
    if(isset($_POST["delete_product"])){
      $newProduct = new Product($pro_id,'', '', '','', '', '','');
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
  }
  else
  {
    header ("Location: product_list.php");
  }
?><body>
    <div class="container-scroller"><?php
      include_once("partials/navbar.php");
      ?><div class="container-fluid page-body-wrapper"><?php
        include_once("partials/sidebar.php");
        ?><div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-body">
                   <h4 class="card-title">EDIT PRODUCT</h4>
                   <?php
                         if(isset($_GET["updated"])){
                           $notification = "Update category successfully !!!";
                           include_once("partials/notify.php");
                         }
                        ?>
                   <form class="forms-sample" method="post" enctype="multipart/form-data">
                     <div class="row">
                       <div class="col-md-6">

                         <!-- ID -->
                         <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Product Id</label>
                           <div class="col-sm-9">
                             <input type="text" readonly="true" class="form-control" name="product_id" value="<?php echo $pro["ProductId"]; ?>">
                           </div>
                         </div>

                         <!-- Name -->
                         <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Product Name</label>
                           <div class="col-sm-9">
                             <input name="product_name" class="form-control" value="<?php echo $pro["ProductName"]; ?>">
                           </div>
                         </div>

                         <!-- Description -->
                         <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Description</label>
                           <div class="col-sm-9">
                             <textarea name="product_description" rows="8" class="form-control"><?php echo $pro["ProductDescription"]; ?></textarea>
                           </div>
                         </div>

                         <!-- Storage -->
                         <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Storage</label>
                           <div class="col-sm-9">
                             <div class="product-details">
                               <div class="quantity">
                                 <div class="pro-qty">
                                   <span class="inc qtybtn" type="button" onclick="decrease()" >-</span>
                                   <input type="text" class="btn-quantity" id="text" value="1">
                                   <span class="inc qtybtn" type="button" onclick="increase()" >+</span>
                                 </div>
                              </div>
                             </div>
                           </div>
                         </div>


                       </div>

                       <div class="col-md-6">
                         <div class="form-group row">
                           <div class="">
                             <label>Image review</label>

                               <img src="<?php echo $pro["ProductImage"]; ?>" style="padding-bottom: 10px;" class="img-responsive cus_img" alt="Image" id="<?php echo "show_banner_image".$i; ?>">

                               <input type="file" onchange="readURL(this);" name="" accept=".PNG, .GIF, .JPG">

                           </div>
                          </div>
                         <div class="form-group row">
                           <div class="col-sm-3">
                             <img src="<?php echo $pro["ProductImage"]; ?>" style="padding-bottom: 10px;" class="img-responsive prod-imgs" alt="Image" id="<?php echo "show_banner_image".$i; ?>">
<button type="button" name="button"></button>
                           </div>
                           <div class="col-sm-3">
                             <div class="">
                               <img src="..\..\media\image\product\2021010408205051+W6NcUJtL.jpg" style="padding-bottom: 10px;" class="img-responsive prod-imgs" alt="Image" id="<?php echo "show_banner_image".$i; ?>">
                             </div>
<button type="button" name="button"></button>

                           </div>
                           <div class="col-sm-3">
                             <img src="..\..\media\image\product\20210104082008z2093505129688_2a3ee6c78bff038ca22b33d02dbd7feb.jpg" style="padding-bottom: 10px;" class="img-responsive prod-imgs" alt="Image" id="<?php echo "show_banner_image".$i; ?>">

                           </div>
                           <div class="col-sm-3">
                             <img src="..\..\media\image\category\72284160_373822990230201_2131402178047246336_n.jpg" style="padding-bottom: 10px;" class="img-responsive prod-imgs" alt="Image" id="<?php echo "show_banner_image".$i; ?>">

                           </div>
                           <div class="col-sm-3">
                             <img src="..\..\media\image\product\2021010408205051+W6NcUJtL.jpg" style="padding-bottom: 10px;" class="img-responsive prod-imgs" alt="Image" id="<?php echo "show_banner_image".$i; ?>">

                           </div>
                           <div class="col-sm-3">
                             <img src="..\..\media\image\product\20210104082008z2093505129688_2a3ee6c78bff038ca22b33d02dbd7feb.jpg" style="padding-bottom: 10px;" class="img-responsive prod-imgs" alt="Image" id="<?php echo "show_banner_image".$i; ?>">

                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="form-group row button-align">
                       <button type="update" name="" class="btn btn-primary btn-sm cus_button">UPDATE</button>
                       <button type="delete" name="" class="btn btn-primary btn-sm cus_button">DELETE</button>
                       <button type="cancel" name="" class="btn btn-primary btn-sm cus_button">CANCEL</button>
                     </div>
                    </form>
              </div>
            </div><?php
             include_once("partials/footer.php");
             include_once("product_edit.php");
             include_once("product_delete.php");
             ?></div>
        </div>
      </div>
    </div>

    <?php include_once("partials/scripts.php") ?>

    <script>

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


      // quantity button
      function increase()
      {
        var a = 1;
        var textBox = document.getElementById("text");
        textBox.value++;
      }
      function decrease()
      {
        if (textBox.value < 0)
        {

        }
        else
        {
          var textBox = document.getElementById("text");
          textBox.value--;
        }
      }
    </script>
  </body>
</html>

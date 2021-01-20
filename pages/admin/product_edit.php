<!DOCTYPE html>
<html lang="vi"><?php
  $title = "Product Add";
  include_once("partials/header.php");
  //lấy giá trị id từ url
  if (isset($_GET["id"]))
  {
    //lấy ra sản phẩm từ id
    $pro_id = $_GET["id"];
    $list = Product::get_product($pro_id);
    $pro = $list;

    $mul_img = Image::list_image_by_pro($pro_id);

    //khi nút update được kích hoạt
    if(isset($_POST["btnupdate"]))
    {
      $proId = $_POST["product_id"];
      $proName = $_POST["product_name"];
      $proPrice = $_POST["product_price"];
      $proDesc = $_POST["product_description"];
      $proStorage = $_POST["product_storage"];
      $cateId = $_POST["category_id"];
      $proImage = $_FILES["product_image"];
      $proSale = $_POST["product_sale"];

      $newProduct = new Product ($proId, $proName, $proPrice, $proDesc, $proStorage,$cateId, $proImage,$proSale);

      //xem xét có cập nhât ảnh bìa của sản phẩm hay không
      if ($proImage['name'] == '' || $proImage['size'] == 0)
      {
        //nếu không cập nhật ảnh
        $result = $newProduct->update_product(false);
      }
      else
      {
        //nếu cập nhật ảnh
        $result = $newProduct->update_product(true);
      }

      // thông báo khi thực thi xong
      if(!$result)
      {
        header("Location: product_edit.php?id=".$pro_id."&failure");
      }
      else
      {
        header("Location: product_edit.php?id=".$pro_id."&updated");
      }
    }

    ////xoá sản phẩm
    if(isset($_POST["btndelete"])){
      $newProduct = new Product($pro_id,'', '', '','', '', '','');
      $result = $newProduct->delete_product();

      if(!$result)
      {
        header("Location: product_list.php?failure");
      }
      else
      {
        header("Location: product_list.php?deleted");
      }
    }

    ///xoá side image
    foreach ($mul_img as $img){
      $mul_id = $img["ImageId"];
      if(isset($_POST["delete_side".$mul_id]))
      {
        $newSide = new Image('','');
        $result_side = $newSide->delete_image($mul_id);

        if($result_side)
        {
          header("Location: product_edit.php?id=".$pro_id."&deleteside#sideimage_page");
        }
        else
        {
          header("Location: product_edit.php?id=".$pro_id."&failside#sideimage_page");
        }
      }
    }

    ////upload side image
    if (isset($_POST["btnupload"]))
    {
      if(!empty(array_filter($_FILES['files']['name']))) {
          // Loop through each file in files[] array
          foreach ($_FILES['files']['tmp_name'] as $key => $value)
          {
            $file_tmpname = $_FILES['files']['tmp_name'][$key];
            $file_name = $_FILES['files']['name'][$key];
            // Set upload file path
            $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
            $filepath = "../../media/image/sideimage/".$timestamp.$file_name;
            if( move_uploaded_file($file_tmpname, $filepath)) {
                $newImage = new Image($filepath,$pro_id);
                $result_upload = $newImage->insert_image();
            }
            else {
                echo "Error uploading {$file_name} <br />";
            }
          }
      }
      ///notification
      if(!$result_upload)
      {
        header("Location: product_edit.php?id=".$pro_id."&failside#sideimage_page");
      }
      else
      {
        header("Location: product_edit.php?id=".$pro_id."&update_side#sideimage_page");
      }
    }

    ///CANCEL
    if(isset($_POST["btncancel"]))
    {
        header("Location: product_list.php");
    }

  }

  ///nếu không tìm thấy sản phẩm
  else
  {
    header ("Location: product_list.php?not_found");
  }
?><body>
    <div class="container-scroller"><?php
      include_once("partials/navbar.php");
      ?><div class="container-fluid page-body-wrapper"><?php
        include_once("partials/sidebar.php");
        ?><div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                       <h4 class="card-title">EDIT PRODUCT</h4>
                       <?php
                             if(isset($_GET["updated"])){
                               $notification = "Update product successfully !!!";
                               include_once("partials/notify.php");
                             }
                             if(isset($_GET["failure"])){
                               $notification = "This item is cursed !!!";
                               include_once("partials/notify.php");
                             }
                            ?>
                       <form method="post" enctype="multipart/form-data">
                         <div class="row">
                           <div class="col-md-6">

                             <!-- ID -->
                             <div class="form-group row">
                               <label class="col-sm-3 col-form-label">Product Id</label>
                               <div class="col-sm-9">
                                 <input type="text" readonly="true" class="form-control" name="product_id" value="<?php echo $pro["ProductId"]; ?>">
                               </div>
                             </div>

                             <!-- Category Id -->
                             <div class="form-group row">
                               <label class="col-sm-3 col-form-label" for="CategoryId">Category Type</label>
                               <div class="col-sm-9">
                               <select class="form-control form-control-lg" name="category_id">
                                 <?php
                                 foreach ($cates as $item)
                                 {
                                   if ($pro["CategoryId"] == $item["CategoryId"])
                                   { ?>
                                   <option value ="<?php echo $item["CategoryId"]; ?>" selected><?php echo $item["CategoryName"]; ?></option>
                                 <?php
                                   }
                                   else
                                   { ?>
                                     <option value ="<?php echo $item["CategoryId"]; ?>"><?php echo $item["CategoryName"]; ?></option>
                            <?php  }
                                 } ?>
                               </select>
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

                             <!-- Price -->
                             <div class="form-group row">
                               <label class="col-sm-3 col-form-label">Price</label>
                               <div class="col-sm-9">
                                 <input type="number" name="product_price" class="form-control" value="<?php echo $pro["ProductPrice"]; ?>">
                               </div>
                             </div>

                             <!-- Sale price -->
                             <div class="form-group row">
                               <label class="col-sm-3 col-form-label">Sale Price</label>
                               <div class="col-sm-9">
                                 <input type="number" name="product_sale" class="form-control" value="<?php if($pro["SalePrice"] == null) echo ''; else echo $pro["SalePrice"]; ?>">
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
                                       <input type="text" name="product_storage" class="btn-quantity" id="text" value="<?php echo $pro["Storage"]; ?>">
                                       <span class="inc qtybtn" type="button" onclick="increase()" >+</span>
                                     </div>
                                  </div>
                                 </div>
                               </div>
                             </div>


                           </div>

                           <div class="col-md-6">
                             <!-- product cover image -->
                             <div class="form-group row">
                               <div>
                                 <label>Image review</label>
                                   <img src="<?php echo $pro["ProductImage"]; ?>" style="padding-bottom: 10px;" class="img-responsive cus_img" alt="Image" id="show_product_image">
                                   <input type="file" name="product_image" onchange="readURL(this);" accept=".PNG, .GIF, .JPG">
                               </div>
                              </div>
                           </div>
                         </div>
                         <div class="form-group row button-align">
                           <button type="update" name="btnupdate" class="btn btn-primary btn-sm cus_button">UPDATE</button>
                           <button type="delete" name="btndelete" class="btn btn-primary btn-sm cus_button">DELETE</button>
                           <button type="cancel" name="btncancel" class="btn btn-primary btn-sm cus_button">CANCEL</button>
                         </div>
                        </form>
                  </div>
                </div>
              </div>
            </div>

            <?php include_once("product_edit_sideimage.php"); ?>

            <?php
             include_once("partials/footer.php");
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

      ////delete product side images
      function deleteSide(id)
      {
        // var result = confirm("Are you sure to delete?");
        // if(result)
        // {
        //     $.post( "product_edit.php", {action_type:"delete_img",id:id}, function(resp) {
        //         if(resp == 'ok'){
                    $('#side_image'+id).remove();
                    alert('The image has been removed from the gallery');
            //     }else{
            //         alert('Some problem occurred, please try again.');
            //     }
            // });
        // }
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

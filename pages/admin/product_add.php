<!DOCTYPE html>
<html lang="vi"><?php
  $title = "Product Add";
  include_once("partials/header.php");
  require_once("../../database/entities/product_class.php");
  require_once("../../database/entities/category_class.php");
  require_once("../../database/entities/image_class.php");

  if(isset($_POST["btnsubmit"])){
    $proId = $_POST["txtProId"];
    $proName = $_POST["txtProName"];
    $proPrice = $_POST["txtProPrice"];
    $proSale = $_POST["txtProSale"];
    $proDesc = $_POST["txtProDesc"];
    $proStorage = $_POST["txtProStorage"];
    $cateId = $_POST["txtCateID"];
    $proImage = $_FILES["txtProImage"];

    $newProduct = new Product ($proId, $proName, $proPrice, $proDesc, $proStorage,$cateId, $proImage,$proSale);

    $id_exist = $newProduct->id_exist();
    if (!$id_exist)
    {
      header("Location: product_add.php?exist");
    }
    else
    {
      $result = $newProduct->insert_product();

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
                $newImage = new Image($filepath,$proId);
                $result = $newImage->insert_image();
            }
            else {
                echo "Error uploading {$file_name} <br />";
            }
          }
      }
      ///notification
      if(!$result)
      {
        header("Location: product_add.php?failure");
      }
      else
      {
        header("Location: product_add.php?inserted");
      }
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
                  if(isset($_GET["inserted"])){
                    $notification = "Insert product successfully !!!";
                    include_once("partials/notify.php");
                  }
                  else if(isset($_GET["exist"])){
                    $notification = "Product Id exists !!!";
                    include_once("partials/notify.php");
                  }
                  if(isset($_GET["failure"])){
                    $notification = "Insert product fail !!!";
                    include_once("partials/notify.php");
                  }
                 ?><h4 class="card-title">Add product</h4>
                <form class="forms-sample" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="ProductName">Product Id</label>
                      <input type="text" class="form-control" required="true"
                      name="txtProId" placeholder="Product Id"
                      value="<?php echo isset($_POST["txtProId"])?$_POST["txtProId"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="CategoryId">Category Type</label>
                    <div class="lblinput">
                    <select class="form-control form-control-lg" name="txtCateID">
                    <?php
                    $cates = Category::list_category();
                    foreach ($cates as $item)
                    {
                      echo "<option value =".$item["CategoryId"].">".$item["CategoryName"]."</option>";
                    }
                    ?>
                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ProductName">Product Name</label>
                    <input type="text" class="form-control" required="true"
                    name="txtProName" placeholder="Product Name"
                    value="<?php echo isset($_POST["txtProName"])?$_POST["txtProName"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="ProductPrice">Product Price</label>
                    <input type="number" class="form-control" required ="true"
                    name="txtProPrice" placeholder="Product Price"
                    value="<?php echo isset($_POST["txtProPrice"])?$_POST["txtProPrice"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="ProductPrice">Product Sale Price</label>
                    <input type="number" class="form-control"
                    name="txtProSale" placeholder="Product Sale Price"
                    value="<?php echo isset($_POST["txtProSale"])?$_POST["txtProSale"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="ProductDescription">Product Description</label>
                    <input type="text" class="form-control" required ="true"
                    name="txtProDesc" placeholder="Product Description"
                    value="<?php echo isset($_POST["txtProDesc"])?$_POST["txtProDesc"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="ProductStorage">Product Storage</label>
                    <input type="number" class="form-control" required ="true"
                    name="txtProStorage" placeholder="Product Storage"
                    value="<?php echo isset($_POST["txtProStorage"])?$_POST["txtProStorage"]:""; ?>"/>
                  </div>

                  <!-- product cove image in product table column image -->
                  <div class="form-group">
                    <label for="ProductImage">Product Cover Image</label>
                    <input type="file" class="form-control" name="txtProImage" required ="true"
                    accept=".PNG, .GIF, .JPG">
                  </div>

                  <!-- images -->
                  <div class="form-group">
                    <label for="ProductImage">Product Image</label>
                    <input type="file" class="form-control" name="files[]"
                    accept=".PNG, .GIF, .JPG" multiple>
                  </div>

                  <button type="submit" class="btn btn-primary mr-2" name="btnsubmit">SAVE</button>
                  <button class="btn btn-light" onclick="location.href='index.php'">CANCEL</button>
                </form>
              </div>
            </div><?php
            include_once("partials/footer.php");
            ?></div>
        </div>

      </div>

    </div>
    <?php include_once("partials/scripts.php") ?>

  </body>

</html>

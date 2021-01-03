<!DOCTYPE html>
<html lang="vi"><?php
  $title = "Product Add";
  include_once("partials/header.php");
  require_once("../../database/entities/product_class.php");
  require_once("../../database/entities/category_class.php");

  if(isset($_POST["btnsubmit"])){
    $proId = $_POST["txtProId"];
    $proName = $_POST["txtProName"];
    $proPrice = $_POST["txtProPrice"];
    $proDesc = $_POST["txtProDesc"];
    $proStorage = $_POST["txtProStorage"];
    $cateId = $_POST["txtCateID"];
    $proImage = $_FILES["txtProImage"];

    $newProduct = new Product ($proId, $proName, $proPrice, $proDesc, $proStorage,$cateId, $proImage);

    $result = $newProduct->insert_product();
    if(!$result)
    {
      header("Location: product_add.php?failure");
    }
    else
    {
      header("Location: product_add.php?inserted");
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
                 ?><h4 class="card-title">Add product</h4>
                <form class="forms-sample" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="ProductName">Product Id</label>
                      <input type="text" class="form-control" id="ProductId"
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
                    <input type="text" class="form-control" id="ProductName"
                    name="txtProName" placeholder="Product Name"
                    value="<?php echo isset($_POST["txtProName"])?$_POST["txtProName"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="ProductPrice">Product Price</label>
                    <input type="number" class="form-control" id="ProductPrice"
                    name="txtProPrice" placeholder="Product Price"
                    value="<?php echo isset($_POST["txtProPrice"])?$_POST["txtProPrice"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="ProductDescription">Product Description</label>
                    <input type="text" class="form-control" id="ProductDescription"
                    name="txtProDesc" placeholder="Product Description"
                    value="<?php echo isset($_POST["txtProDesc"])?$_POST["txtProDesc"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="ProductStorage">Product Storage</label>
                    <input type="number" class="form-control" id="ProductStorage"
                    name="txtProStorage" placeholder="Product Storage"
                    value="<?php echo isset($_POST["txtProStorage"])?$_POST["txtProStorage"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="ProductImage">Product Image</label>
                    <input type="file" class="form-control" id="ProductImage" name="txtProImage"
                    accept=".PNG, .GIF, .JPG">
                  </div>

                  <button type="submit" class="btn btn-primary mr-2" name="btnsubmit">SAVE</button>
                  <button class="btn btn-light">CANCEL</button>
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

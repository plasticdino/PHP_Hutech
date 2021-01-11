<!DOCTYPE html>
<html lang="vi">

<?php
  $title = "SHOP";
  include_once("partials/header.php");
  require_once("../../database/entities/product_class.php");
  require_once("../../database/entities/category_class.php");

  if (!isset($_GET["cateid"])){
      $prods = Product::list_product();
    }
    else {
      $cateid = $_GET["cateid"];
      $prods = Product::list_product_by_cateid($cateid);
    }
?>
<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->
    <?php include_once("partials/navbar.php"); ?>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  <div class="boder-bottom border-warning breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                  </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <?php include_once("shop_sidebar.php"); ?>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">

                          <?php  foreach($prods as $item) { ?>
                          <!-- Product list in shop -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="<?php echo $item["ProductImage"]; ?>" alt="">
                                        <div class="sale pp-sale">Sale</div>
                                        <ul>
                                          <li class="w-icon active">
                                            <a href="#">
                                              <i class="icon_bag_alt"></i>
                                            </a>
                                          </li>
                                          <!-- <li class="w-icon active">
                                            <a href="#">
                                              <i class="icon_heart_alt"></i>
                                            </a>
                                          </li> -->
                                          <li class="w-icon active">
                                            <a href="#quickview" class="quickview" data-toggle="modal" data-id="<?php echo $item["ProductId"]; ?>">
                                              <i class="icon_zoom-in_alt"></i>
                                            </a>
                                          </li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"><?php foreach ($cates as $get_name) {
                                          if ($item["CategoryId"] == $get_name["CategoryId"])
                                          {
                                            echo $get_name["CategoryName"];
                                            break;
                                          }
                                        } ?></div>
                                        <a href="#">
                                            <h5><?php echo $item["ProductName"]; ?></h5>
                                        </a>
                                        <div class="product-price">
                                            <?php echo $item["ProductPrice"]." VND"; ?>
                                            <!-- <span>$35.00</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a data-toggle="modal" href="#" id="">
                            Loading More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section Begin -->

    <?php
    include_once("partials/footer.php");
    include_once("product_quickview.php");
    ?>
    <!-- Footer Section End -->
    <?php include_once("partials/scripts.php"); ?>

    <script>

    ///show pop up quickview
    $(document).ready(function (){
      var cate_list = new Array();
      cate_list = <?php echo json_encode($cates); ?>;

      var content = new Array();
      content =<?php echo json_encode($prods); ?>;

      btn_quickview = document.querySelectorAll('.quickview');
      for(let i = 0; i < content.length; i++){
        btn_quickview[i].onclick = function(){
          document.getElementById('s_product_name').innerHTML = content[i].ProductName;
          document.getElementById('s_product_description').innerHTML = content[i].ProductDescription;
          document.getElementById('s_product_storage').innerHTML = content[i].Storage + " in stock";
          document.getElementById('s_product_price').innerHTML = content[i].ProductPrice.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + " VND";

          for(let j = 0; j < cate_list.length; j++){
            if (content[i].CategoryId == cate_list[j].CategoryId)
            {
              document.getElementById('s_product_cateid').innerHTML = cate_list[j].CategoryName;
              break;
            }

          }

          //show image fro database
          var _img = document.getElementById('show_s_product_image');
          var newImg = new Image;
          newImg.onload = function()
          {
              _img.src = this.src;
          }
          newImg.src = content[i].ProductImage;
        }
      }
    });
    </script>
</body>

</html>

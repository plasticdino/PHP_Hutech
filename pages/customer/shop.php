<!DOCTYPE html>
<html lang="vi">

<?php
  $title = "SHOP";
  include_once("partials/header.php");
  require_once("../../database/entities/product_class.php");
  require_once("../../database/entities/category_class.php");
  require_once("../../database/entities/image_class.php");


  if (!isset($_GET["cateid"])){
      $prods = Product::list_product();
    }
  else {
      $cateid = $_GET["cateid"];
      $prods = Product::list_product_by_cateid($cateid);
    }
  $image_list = Image::list_image();

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
                    <div class="product-list">
                        <div class="row">
                          <?php  foreach($prods as $item) { ?>
                          <!-- Product list in shop -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img onclick="location.href='product_detail.php?proid=<?php echo $item["ProductId"]; ?>'" src="<?php echo $item["ProductImage"]; ?>" alt="">
                                        <?php
                                        if ($item["SalePrice"] != 0)
                                        { echo "<div class='sale'>Sale</div>"; }
                                          ?>
                                        <ul>
                                          <li class="w-icon active">
                                            <a href="#">
                                              <i class="icon_bag_alt"></i>
                                            </a>
                                          </li>
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
                                        <a href='product_detail.php?proid=<?php echo $item["ProductId"]; ?>'>
                                            <h5><?php echo $item["ProductName"]; ?></h5>
                                        </a>
                                        <div class="product-price">
                                          <h4 style="color: #e7ab3c; font-size: 20px; font-weight: 700;">
                                            <?php
                                            if ($item["SalePrice"] == 0) {
                                              echo number_format($item['ProductPrice'])." VND</h4>";
                                            }
                                            else {
                                              echo number_format($item["SalePrice"])." VNĐ";
                                              echo "</br><span>".number_format($item['ProductPrice'])."VNĐ</span></h4>";
                                            }?>
                                          </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
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

      var img_list = new Array();
      img_list =<?php echo json_encode($image_list); ?>;

      var proid;
      var proimg;

      btn_quickview = document.querySelectorAll('.quickview');
      for(let i = 0; i < content.length; i++)
      {
        btn_quickview[i].onclick = function()
        {
          proid = content[i].ProductId;
          proimg = content[i].ProductImage;

          document.getElementById('s_product_name').innerHTML = content[i].ProductName;
          document.getElementById('s_product_description').innerHTML = content[i].ProductDescription;
          document.getElementById('s_product_storage').innerHTML = content[i].Storage + " in stock";
          document.getElementById('s_product_price').innerHTML = content[i].ProductPrice.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + " VND";
        if ((content[i].SalePrice == null) || (content[i].SalePrice == 0))
        {
          document.getElementById('s_product_sale').innerHTML = content[i].ProductPrice.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + " VND";
        }
        else {
          document.getElementById('s_product_sale').innerHTML = content[i].SalePrice.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + " VND";
        }
          for(let j = 0; j < cate_list.length; j++){
            if (content[i].CategoryId == cate_list[j].CategoryId)
            {
              document.getElementById('s_product_cateid').innerHTML = cate_list[j].CategoryName;
              break;
            }
          }
          $(document).ready(function()
          {
            $('<div class="carousel-item"><div class="parent d-flex justify-content-center"><img src="'+proimg+'"></div></div>')
            .appendTo('.carousel-inner');
            $('<li data-target="#myCarousel" data-slide-to="'+0+'"></li>').appendTo('.carousel-indicators')
            for(let i=1 ; i<= img_list.length ; i++) {
              if  (img_list[i].ProductId == proid)
              {
                $('<div class="carousel-item"><div class="parent d-flex justify-content-center"><img src="'+img_list[i].ImageLink+'"></div></div>')
                .appendTo('.carousel-inner');
                $('<li data-target="#myCarousel" data-slide-to="'+i+'"></li>').appendTo('.carousel-indicators')

              }
              $('.carousel-item').first().addClass('active');
              $('.carousel-indicators > li').first().addClass('active');
              $('#myCarousel').carousel();
              }
          });

          $('<a href="product_detail.php?proid='+ proid +'" class="primary-btn">CHECK DETAIL</a>')
          .appendTo('.quick-button');
          
        $('<a href="shopping-cart.php?productid='+ proid +'" class="primary-btn">Add to cart</a> ')
        .appendTo('.quick-button');
        }

      }
    });

    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="vi">
<?php
  $title = "HOMEPAGE";
  include_once("partials/header.php");
  require_once("../../database/entities/banner_class.php");
  require_once("../../database/entities/category_class.php");
  require_once("../../database/entities/product_class.php");
  require_once("../../database/entities/image_class.php");

  $cates = Category::list_category();
  $banner = Banner::list_banner();
  $quick_prods = [];

  $image_list = Image::list_image();

?>
<body>

  <?php include_once("partials/navbar.php"); ?>

    <!-- Hero Section Begin -->
    <?php include_once("index_herosection.php"); ?>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <?php include_once("index_bannersection.php"); ?>
    <!-- Banner Section End -->

    <!-- Sale Banner Section Begin -->
    <?php include_once("index_salesection.php"); ?>
    <!-- Women Banner Section End -->

    <!-- Footer Section Begin -->
    <?php
      include_once("product_quickview.php");
      include_once("partials/footer.php"); ?>
    <!-- Footer Section End -->
    <?php include_once("partials/scripts.php"); ?>
    <!-- Js Plugins -->
    <script>

    var content = new Array();
    content =<?php echo json_encode($quick_prods); ?>;

    var cate_list = new Array();
    cate_list = <?php echo json_encode($cates); ?>;

    var img_list = new Array();
    img_list =<?php echo json_encode($image_list); ?>;


    ///show pop up quickview
    function clickProduct(id, catename){
    for (let i = 0; i < content.length; i++)
    {
      if (content[i].ProductId == id)
      {
        proid = content[i].ProductId;
        proimg = content[i].ProductImage;

        document.getElementById('s_product_name').innerHTML = content[i].ProductName;
        document.getElementById('s_product_description').innerHTML = content[i].ProductDescription;
        document.getElementById('s_product_storage').innerHTML = " " + content[i].Storage + " in stock";
        document.getElementById('s_product_price').innerHTML = content[i].ProductPrice.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + " VND";
        if ((content[i].SalePrice == null) || (content[i].SalePrice == 0))
        {
          document.getElementById('s_product_sale').innerHTML = content[i].ProductPrice.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + " VND";
        }
        else {
          document.getElementById('s_product_sale').innerHTML = content[i].SalePrice.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + " VND";
        }

        ///get category name
        document.getElementById('s_product_cateid').innerHTML = catename;


        //show image fro database
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

        $('<a href="product_detail.php?proid='+ proid +'" class="primary-btn">check detail</a> ')
        .appendTo('.quick-button');
        $('<a href="shopping-cart.php?productid='+ proid +'" class="primary-btn">Add to cart</a> ')
        .appendTo('.quick-button');

        break;
      }
    }

  }
    </script>
  </body>
</html>

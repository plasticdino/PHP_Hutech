<!DOCTYPE html>
<html lang="vi">
<?php
  $title = "HOMEPAGE";
  $brehome = "Shop";
  $brepage = "Product Detail";
  include_once("partials/header.php");
  require_once("../../database/entities/category_class.php");
  require_once("../../database/entities/product_class.php");
  require_once("../../database/entities/image_class.php");

  $cates = Category::list_category();
  $image_list = Image::list_image();

  if (isset($_GET["proid"]))
  {
    $proid = $_GET["proid"];
    $list = Product::get_product($proid);
    $prods_relate = Product::list_product_relate($list["CategoryId"], $proid);
    $pro_img = Image::list_image_by_pro($proid);

    foreach ($cates as $c_loop) {
      if ($c_loop["CategoryId"] == $list["CategoryId"])
      {
        $c_item = $c_loop;
        break;
      }
    }
  }
  ///nếu không tìm thấy sản phẩm
  else
  {
    header ("Location: product_list.php?not_found");
  }
?>
<body>

    <?php include_once("partials/navbar.php"); ?>
    <?php include_once("partials/breacrumb.php"); ?>
    <!-- PRODUCT SECTION  -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <?php include_once("shop_sidebar.php"); ?>
                <div class="col-lg-9 order-1 order-lg-2" style="padding-left: 30px;">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="product-pic-zoom" style="position: relative; overflow: hidden;">
                            <img class="product-big-img" src="<?php echo $list["ProductImage"]; ?>" alt="" />
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                            <img
                                role="presentation"
                                alt=""
                                src="<?php echo $list["ProductImage"]; ?>"
                                class="zoomImg"
                                style="position: absolute; top: -34.2569px; left: -15.2778px; opacity: 0; border: none; max-width: none; max-height: none; width: 440px; height: 520px;"
                            />
                        </div>

                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage" style="transform: translate3d(-139px, 0px, 0px); transition: all 1.2s ease 0s; width: 559px;">
                                        <div class="owl-item" style="width: 129.583px; margin-right: 10px;">
                                            <div class="pt" data-imgbigurl="<?php echo $list["ProductImage"]; ?>"><img src="<?php echo $list["ProductImage"]; ?>" alt="" /></div>
                                        </div>
                                        <?php foreach ($pro_img as $img_p) { ?>
                                        <div class="owl-item active" style="width: 129.583px; margin-right: 10px;">
                                            <div class="pt active" data-imgbigurl="<?php echo $img_p["ImageLink"]; ?>"><img src="<?php echo $img_p["ImageLink"]; ?>" alt="" /></div>
                                        </div>

                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="owl-nav">
                                    <button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left"></i></button><button type="button" role="presentation" class="owl-next disabled"><i class="fa fa-angle-right"></i></button>
                                </div>
                                <div class="owl-dots disabled"></div>
                            </div>
                        </div>
                      </div>

                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <h3><?php echo $list["ProductName"]; ?></h3>
                                </div>
                            </div>
                            <div class="quickview-ratting-review">
                                <div class="quickview-stock">
                                    <h6 class="fa fa-check-circle-o"> <?php echo $list["Storage"]; ?> in stock </h6>
                                </div>
                            </div>
                            <div class="product-details">
                              <div class="pd-desc">
                                <h4> <?php
                                if (($list["SalePrice"] != 0))
                                {
                                    echo number_format($list["SalePrice"])." VNĐ";
                                    echo "</br><span>".number_format($list['ProductPrice'])."VNĐ</span>";
                                }
                                else
                                {
                                  echo number_format($list["ProductPrice"])." VNĐ";
                                } ?>
                              </h4>


                              </div>
                            </div>
                            <div class="product-details">
                              <p><?php echo $list["ProductDescription"]; ?></p>
                            </div>
                            <div class="product-details">
                              <ul class="pd-tags">
                                  <li><span>CATEGORIES</span>: <?php echo $c_item["CategoryName"]; ?></li>
                              </ul>
                            </div>
                            <div class="product-details">
                                <div class="add-to-cart">
                                    Quantity
                                </div>
                                <!-- end col -->
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="quans" value="1" />
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <a href="shopping-cart.php?productid=<?php echo $list["ProductId"]; ?>" class="primary-btn pd-cart">Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- RELATIVE PRODUCT SECTION -->
    <?php include_once("product_relative.php"); ?>
    <!-- Footer Section Begin -->
    <?php
      include_once("product_quickview.php");
      include_once("partials/footer.php"); ?>
    <!-- Footer Section End -->
    <?php include_once("partials/scripts.php"); ?>
    <!-- Js Plugins -->

    <script>

    var content = new Array();
    content =<?php echo json_encode($prods_relate); ?>;

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

        document.getElementById('s_product_name').innerHTML = content[i].ProductName;;
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

        break;
      }
    }

  }
    </script>
  </body>
</html>

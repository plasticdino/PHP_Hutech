<?php foreach ($cates as $c_item) {
  $prods = Product::list_product_by_cateid($c_item["CategoryId"]);
  $quick_prods = array_merge($quick_prods, $prods);

 ?>
<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="<?php echo $c_item["CategoryImage"]; ?>">
                    <h2></h2>
                    <a href="#">Discover More</a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                  <div class="filter-control">
                      <h3><?php echo $c_item["CategoryName"]; ?></h3>
                  </div>
                </div>

                <div class="product-slider owl-carousel">
                  <?php foreach ($prods as $p_item) { ?>
                    <form method="post">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="<?php echo $p_item["ProductImage"]; ?>" alt="<?php echo $p_item["ProductName"]; ?>">
                            <?php
                            if ($p_item["SalePrice"] != 0)
                            { echo "<div class='sale'>Sale</div>"; }
                              ?>
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
                                <a href="#quickview"
                                onclick="clickProduct('<?php echo $p_item["ProductId"]; ?>','<?php echo $c_item["CategoryName"]; ?>')"
                                 class="quickview" data-toggle="modal">
                                  <i class="icon_zoom-in_alt" ></i>
                                </a>
                              </li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name"><?php echo $c_item["CategoryName"]; ?></div>
                            <a href="#">
                                <h5><?php echo $p_item["ProductName"]; ?></h5>
                            </a>
                            <div class="product-price">
                                  <?php
                                    if ($p_item["SalePrice"] != 0)
                                    {
                                      echo number_format($p_item["SalePrice"])." VNĐ";
                                  ?>
                                <span></br><?php echo number_format($p_item["ProductPrice"])." VNĐ"; ?></span>
                              <?php } else {
                                echo number_format($p_item["ProductPrice"])." VNĐ";
                              } ?>
                            </div>
                        </div>
                    </div>
                  </form>
                  <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

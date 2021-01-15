<div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
              <?php
                foreach ($prods_relate as $p_item) { ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img onclick="location.href='product_detail.php?proid=<?php echo $p_item["ProductId"]; ?>'" src="<?php echo $p_item["ProductImage"]; ?>" alt="">
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
                          <a href='product_detail.php?proid=<?php echo $p_item["ProductId"]; ?>'>
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
                </div>
              <?php } ?>
            </div>
        </div>
    </div>

<?php
require_once("../../database/entities/product_class.php");
require_once("../../database/entities/category_class.php");
  $cates = Category::list_category();

?>
<!-- <div id="preloder">
    <div class="loader"></div>
</div> -->
<!-- Header Section Begin -->
<header class="header-section">
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="index.php">
                            <img src="..\..\media\image\shop\logo\banner.png" style="width:30px; height:30px;"alt="">
                             ARY STATION
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <select class="category-btn"  onchange="location = this.value;">
									<option selected="selected">All Category</option>
                  <?php foreach($cates as $item) {
                    echo "<option value=shop.php?cateid=".$item["CategoryId"].">".$item["CategoryName"].
                    "<a href='shop.php?cateid='".$item["CategoryId"]."></a>
                    </option>";
                  } ?>

								</select>
                        <div class="input-group">
                            <input type="text" placeholder="What do you need?">
                            <button type="button"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="cart-icon">
                          <a href=".\login.php" class="login-panel">
                            <?php 
                                if(isset($_SESSION["username"])){
                                    echo $_SESSION["username"];
                                }else{
                                    echo 'Login';
                                }
                            ?>
                            <i class="fa fa-user"></i>
                          </a>
                          <?php 
                                if(isset($_SESSION["username"])){
                                    echo '<ul class="dropdown">';
                                    if ((isset($_SESSION['role'])) && ($_SESSION['role'] == 1)){
                                        echo "<li><a href='../admin/index.php'>Manage</a></li>";
                                    }
                                        echo '<li><a href="logout.php">Log Out</a></li>';
                                    echo '</ul>';
                                }
                            ?>
                        </li>
                        <li class="cart-icon">
                            <a href="#">
                                <i class="icon_bag_alt"></i>
                                <span>3</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="si-pic"><img src="img/select-product-1.jpg" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>$60.00 x 1</p>
                                                        <h6>Kabino Bedside Table</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="si-pic"><img src="img/select-product-2.jpg" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>$60.00 x 1</p>
                                                        <h6>Kabino Bedside Table</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5>$120.00</h5>
                                </div>
                                <div class="select-button">
                                    <a href="./shopping-cart.php" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price">$150.00</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container ">
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a>
                      <ul class="dropdown">
                        <?php foreach($cates as $item) { ?>
                          <li>
                            <a href="shop.php?cateid=<?php echo $item["CategoryId"]; ?>"><?php echo $item["CategoryName"]; ?></a>
                          </li>
                        <?php } ?>
                      </ul>
                    </li>
                    <li><a href="colection.php">Collection</a></li>
                    <li><a href="blog_list.php">Blog</a></li>
                    <li><a href="about_us.php">About us</a>
                      <ul class="dropdown">
                          <li><a href="contact.php">Contact</a></li>
                          <li><a href="shipping_detail">Shipping Detail</a></li>
                          <li><a href="">Team Information</a></li>
                      </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>

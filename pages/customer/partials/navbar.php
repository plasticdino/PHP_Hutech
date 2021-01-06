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
                        <a href="./index.html">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <select class="category-btn">
									<option selected="selected">All Category</option>
                  <?php foreach($cates as $item) {
                    echo "<option value=".$item["CategoryId"].">".$item["CategoryName"]."</option>";
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
                          <a href="#" class="login-panel">
                            <i class="fa fa-user"></i>
                          </a>
                        </li>
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
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
                                    <a href="#" class="primary-btn view-card">VIEW CARD</a>
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
                    <li class="active"><a href="index.php">Home</a></li>
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
                    <li><a href="#">Account</a>
                        <ul class="dropdown">
                            <li><a href="./shopping-cart.html">Product you've liked</a></li>
                            <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                            <li><a href="./check-out.html">Checkout</a></li>
                            <li><a href="./register.html">Register</a></li>
                            <li><a href="./login.html">Login</a></li>
                            <li><a href="./login.html">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>

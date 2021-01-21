<!-- <div id="preloder">
    <div class="loader"></div>
</div> -->
<!-- Header Section Begin -->
<?php
    if (isset($_REQUEST["btn-search"]) && !empty($_GET["search"])){
        $search = addslashes($_GET['search']);
        header("Location: shop.php?search=".$search);
    }
?>
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
                                <form method="get">
                                    <input type="text" name="search" placeholder="What do you need?">
                                    <button type="submit" name="btn-search"><i class="ti-search"></i></button>
                                </form>
                            </div>

                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="cart-icon" >
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
                                        echo "<div class='cart-hover' style='width:150px; right:0px; top:30px'>";
                                        echo '<div class="select-items">';
                                        if ((isset($_SESSION['role'])) && ($_SESSION['role'] == 1)){
                                            echo "<tr><a class='hover-item' href='../admin/index.php'>Admin</a></tr>";
                                        }
                                        echo '<tr><a href="logout.php">Log Out</a></tr>';
                                        echo '</div></div>';
                                    }
                                ?>
                        </li>
                        <li class="cart-icon">
                            <a href="#">
                                <i class="icon_bag_alt"></i>
                                <?php
                                    if (isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"])>0){
                                        echo "<span>".count($_SESSION["cart_items"])."</span>";
                                    }
                                ?>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                        <?php
                                            $total_money = 0;
                                            if (isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"]) > 0) {
                                                foreach ($_SESSION["cart_items"] as $item){
                                                    $id = $item["pro_id"];
                                                    $prod = Product::get_product($id);
                                                    $total_money += $item["quantity"]*$prod["ProductPrice"];
                                                    echo "<tr class='price'>
                                                        <td class='si-pic'><img style='width=90px; height:80px' alt='' src='".$prod["ProductImage"]."'/></td>

                                                        <td class='si-text'>
                                                            <div class='product-selected'>
                                                                <p id='txtprice'>".$prod["ProductPrice"]."VNĐ x ".$item["quantity"]."</p>
                                                                <h6>".$prod["ProductName"]."</h6>
                                                            </div>
                                                        </td>
                                                        <td class='si-close'>
                                                            <i class='ti-close'></i>
                                                        </td>
                                                    </tr>";
                                                }
                                            }
                                            else{
                                                echo "Nothing in your cart";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5><?php echo number_format($total_money); ?> VNĐ</h5>
                                </div>
                                <div class="select-button">
                                    <a href="./shopping-cart.php" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="./check-out.php" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price"><?php echo number_format($total_money); ?> VNĐ</li>
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
                    <!-- <li><a href="about_us.php">About us</a>
                      <ul class="dropdown">
                          <li><a href="contact.php">Contact</a></li>
                          <li><a href="shipping_detail">Shipping Detail</a></li>
                          <li><a href="">Team Information</a></li>
                      </ul>
                    </li> -->
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>

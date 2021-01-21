<!DOCTYPE html>
<html lang="vi">

<?php
    $title = "Shopping Cart";
    include_once("partials/header.php");
    include_once("partials/navbar.php");
    error_reporting(E_ALL);
    ini_set('display_errors','1');
    if (isset($_GET["productid"])){
        $pro_id = $_GET["productid"];
        $was_found = false;
        $i = 0;
        if (!isset($_SESSION["cart_items"]) || count($_SESSION["cart_items"])<1){
            $_SESSION["cart_items"] = array(0 => array("pro_id" => $pro_id, "quantity" => 1));
        }
        else{
            foreach($_SESSION["cart_items"] as $item){
                $i++;
                foreach($item as $key=>$value){
                    if ($key == "pro_id" && $value == $pro_id){
                        array_splice($_SESSION["cart_items"],$i-1,1,array(array("pro_id" => $pro_id,"quantity" => $item["quantity"]+1)));
                        $was_found = true;
                    }
                }
            }
            if($was_found == false){
                array_push($_SESSION["cart_items"],array("pro_id" => $pro_id, "quantity" => 1));
            }
        }
        // header("location: shopping-cart.php");
    }

    if(isset($_GET["clearitem"]))
    {
      $id = $_GET["clearitem"];
      unset($_SESSION["cart_items"][$id]);
    }
?>

<body>
    <!-- Page Preloder -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <form method="post">
                              <tbody>
                                  <?php
                                      $total_money = 0;
                                      if (isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"]) > 0) {
                                          foreach ($_SESSION["cart_items"] as $key => $value){
                                              $id = $value["pro_id"];
                                              $prod = Product::get_product($id);
                                              $total_money += $value["quantity"]*$prod["ProductPrice"];
                                              ?>
                                              <tr class="price">
                                                <td class="cart-pic first-row"><img style="width:90px; height:80px" src="<?php echo $prod["ProductImage"]; ?>"/></td>
                                                <td class="cart-title">
                                                  <?php echo $prod["ProductName"]; ?>
                                                </td>
                                                <td class="p-price">
                                                  <span id='txtprice'><?php echo $prod["ProductPrice"]; ?></span>
                                                </td>
                                              <td class="qua-col">
                                                  <div class="quantity">
                                                      <div class="pro-qty">
                                                          <input type="number" id="txtquantity" name="btnquantity" value="<?php echo $value["quantity"]; ?>">
                                                      </div>
                                                  </div>
                                              </td>
                                              <td class="total-price">
                                                  <span id="total-price"><?php echo $value["quantity"]*$prod["ProductPrice"]; ?></span>
                                              </td>
                                              <td>
                                                <a href='shopping-cart.php?clearitem=<?php echo $key;?>'>
                                                  <i class="ti-close"></i>
                                                </a>
                                              </td>
                                            </tr>
                                <?php
                                        }
                                      }
                                      else{
                                          echo "Nothing in your cart";
                                      }
                                  ?>
                              </tbody>
                            </form>

                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="index.php" class="primary-btn continue-shop">Continue shopping</a>
                                <!-- <a href="#" class="primary-btn up-cart">Update cart</a> -->
                            </div>
                            <!-- <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div> -->
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span><?php echo $total_money ?></span></li>
                                    <li class="cart-total">Total <span><?php echo $total_money ?></span></li>
                                </ul>
                                <a href="check-out.php" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php
    include_once("partials/footer.php");
    include_once("partials/scripts.php");
     ?>
<script>
    function clear_pro(id)
    {

    }
</script>

</body>
</html>

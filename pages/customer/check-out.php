<!DOCTYPE html>
<html lang="vi">

<?php
    $title = "Shopping Cart";
    include_once("partials/header.php");
    include_once("partials/navbar.php");
    if (isset($_SESSION)){
        $address = $_SESSION["address"];
        $phone = $_SESSION["phone"];
        $email = $_SESSION["email"];
    }
    
?>
<body>
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- <div class="checkout-content">
                            <a href="#" class="content-btn">Click Here To Login</a>
                        </div> -->
                        <h4>Biiling Details</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="txtname">Name<span>*</span></label>
                                <input type="text" id="txtname">
                            </div>
                            <div class="col-lg-12">
                                <label for="txtaddress">Address<span>*</span></label>
                                <input type="text" id="txtaddress" value="<?php echo isset($address)?$address:'';?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="txtphone">Phone<span>*</span></label>
                                <input type="number" id="txtphone" value="<?php echo isset($phone)?$phone:'';?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="txtemail">Email<span>*</span></label>
                                <input type="text" id="txtemail" value="<?php echo isset($email)?$email:'';?>">
                            </div>
                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Create an account?
                                        <input type="checkbox" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    <?php 
                                        $total_money = 0;
                                        if (isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"]) > 0) {
                                            foreach ($_SESSION["cart_items"] as $item){
                                                $id = $item["pro_id"];
                                                $prod = Product::get_product($id);
                                                $total_money += $item["quantity"]*$prod["ProductPrice"];
                                                echo "<li class='fw-normal'>".$prod["ProductName"]." x ".$item["quantity"]." <span>".$item["quantity"]*$prod["ProductPrice"]."VND</span></td>";
                                            }
                                        }
                                        else{
                                            echo "Nothing in your cart";
                                        }
                                    ?>
                                    <li class="fw-normal">Subtotal <span><?php echo $total_money ?></span></li>
                                    <li class="total-price">Total <span><?php echo $total_money ?></span></li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cheque Payment
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
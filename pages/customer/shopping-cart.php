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
                            <tbody>
                                <?php 
                                    $total_money = 0;
                                    if (isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"]) > 0) {
                                        foreach ($_SESSION["cart_items"] as $item){
                                            $id = $item["pro_id"];
                                            $prod = Product::get_product($id);
                                            $total_money += $item["quantity"]*$prod["ProductPrice"];
                                            echo "<tr class='price'>
                                            <td class='cart-pic'><img style='width=90px; height:80px' src='".$prod["ProductImage"]."'/></td>
                                            <td class='cart-title'>".$prod["ProductName"]."</td>
                                            <td class='p-price'>
                                                <span id='txtprice'>".$prod["ProductPrice"]."</span>
                                            </td>
                                            <td class='qua-col'>
                                                <div class='quantity'>
                                                    <div class='pro-qty'>
                                                        <input type='number'  id='txtquantity' value=".$item["quantity"].">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class='total-price'>
                                                <span id='total-price'>".$item["quantity"]*$prod["ProductPrice"]."</span>
                                            </td>
                                            <td><i class='ti-close'></i></td>
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

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello.colorlib@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
    // const elements = document.querySelectorAll('.price');
    // Array.from(elements).forEach((element, index) => {
    //     alert(element);
    // });
    // $(".price").each(function() {
    //     $('.qua-col',this).find("#txtquantity").onchange = function(){
    //         $("#total-price").text(this.value);
    //     }
    // });
        // .onchange = function(){
        //     $("#total-price").text(this.value);
        // }
    // });
    // function calc() 
    // {
    //     var price = document.getElementById("txtprice").innerHTML;
    //     var noTickets = document.getElementById("txtquantity").value;
    //     var total = parseFloat(price) * noTickets;
    //     if (!isNaN(total))
    //         // document.getElementById("total-price").innerHTML = total;
    //         $("#total-price").text(total);
    // }
</script>
<!-- <script>
    $('#quantity').on('change', function(){
        var tot = this.value;
    })
    document.getElementById("total-price").innerHTML = tot;
</script> -->
</html>
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-left">
                    <ul>
                      <?php foreach ($shopinfo as $item) { ?>
                        <li>Address: <?php echo $item["Address"]; ?></li>
                        <li>Phone: <?php echo $item["Address"]; ?></li>
                      <?php } ?>
                    </ul>
                    <div class="footer-social">
                        <a href="<?php echo $social[0]["Link"]; ?>"><i class="fa fa-facebook"></i></a>
                        <a href="<?php echo $social[1]["Link"]; ?>"><i class="fa fa-instagram"></i></a>
                        <a href="<?php echo $social[2]["Link"]; ?>"><i class="fa fa-twitter"></i></a>
                        <a href="<?php echo $social[3]["Link"]; ?>"><i class="fa fa-pinterest"></i></a>
                    </div>
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
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2020 NHÓM 16 17 made with <i class="fa fa-heart"></i></span>
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

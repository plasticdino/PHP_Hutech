<section class="hero-section">
    <div class="hero-items owl-carousel">
      <?php foreach ($banner as $item) {
        if ($item["BannerImage"] != '') { ?>
        <div class="single-hero-items set-bg" style="height:400px;" data-setbg="<?php echo $item["BannerImage"] ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span></span>
                        <p><?php echo $item["BannerContent"]; ?></p>
                        <a href="shop.php" class="primary-btn">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
      <?php } } ?>
    </div>
</section>

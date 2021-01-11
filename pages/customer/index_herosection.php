<section class="hero-section">
    <div class="hero-items owl-carousel">
      <?php foreach ($banner as $item) {
        if ($item["BannerImage"] != '') { ?>
        <div class="single-hero-items set-bg" data-setbg="<?php echo $item["BannerImage"] ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span></span>
                        <h1>BACK TO SCHOOL</h1>
                        <p><?php echo $item["BannerContent"]; ?></p>
                        <a href="shop.php" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
      <?php } } ?>
    </div>
</section>

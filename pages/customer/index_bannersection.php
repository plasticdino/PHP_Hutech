<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
          <?php foreach ($cates as $item) { ?>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="<?php echo $item["CategoryImage"]; ?>" style="height:200px; width:auto;" alt="">
                    <div class="inner-text">
                        <h4><?php echo $item["CategoryName"]; ?></h4>
                    </div>
                </div>
            </div>
          <?php } ?>
        </div>
    </div>
</div>

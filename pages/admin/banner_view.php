<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Landing Page Banner</h4>
        <blockquote class="blockquote blockquote-primary">
          <footer class="blockquote-footer">
              3 Banners for Homepage. </br>
              Banner size: </footer>
        </blockquote>
        <?php
          if(isset($_GET["banner-clear"])){
            $notification = "Clear banner successfully !!!";
            include_once("partials/notify.php");
          }
          else if(isset($_GET["banner-failure"])){
            $notification = "Fail, please try again !!!";
            include_once("partials/notify.php");
          }
          else if(isset($_GET["banner-updated"])){
            $notification = "Banner updated !!!";
            include_once("partials/notify.php");
          }
         ?>
        <form class="forms-sample" method="post" enctype="multipart/form-data">
          <?php
          $i = 1;
          foreach ($banner as $item) {
           ?>
          <div class="row">
            <div class="col-md-6">
              <input type="hidden" class="form-control" name="<?php echo "banner_id".$i; ?>" value="<?php echo $item["BannerId"]; ?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Link <?php echo $i; ?></label>
                <div class="col-sm-9">
                  <input type="text" readonly="true" class="form-control" value="<?php echo $item["BannerImage"]; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Content <?php echo $i; ?></label>
                <div class="col-sm-9">
                  <textarea name="<?php echo "banner_content".$i; ?>" rows="8" class="form-control"><?php echo $item["BannerContent"]; ?></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Image review</label>
                <?php
                if ($item["BannerImage"] == '') {
                 ?>
                 <p>No Image</p>
                 <?php
               } else {
                  ?>
                  <img src="<?php echo $item["BannerImage"]; ?>" style="padding-bottom: 10px;" class="img-responsive cus_img" alt="Image" id="<?php echo "show_banner_image".$i; ?>">
                  <?php
                }
                   ?>
                  <input type="file" onchange="readURL(this);" name="<?php echo "banner_image".$i; ?>" accept=".PNG, .GIF, .JPG">
              </div>
            </div>
          </div>
          <div class="form-group row button-align">
            <button type="update" name="<?php echo "update_banner".$i; ?>" class="btn btn-primary btn-sm cus_button">UPDATE</button>
            <button type="delete" name="<?php echo "btnbannerclear".$i;?>" class="btn btn-primary btn-sm cus_button">CLEAR</button>
          </div>
          <?php
            $i++;
            }
           ?>
         </form>
      </div>
    </div>
  </div>
</div>

<!DOCTYPE html>
<html lang="en">
<?php
  $title = "ADMIN Station";
  include_once("partials/header.php");
?>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include_once("partials/navbar.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include_once("partials/sidebar.php"); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- shop banners -->
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
                <div class="table-responsive pt-3">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          No.
                        </th>
                        <th>
                          Image
                        </th>
                        <th>
                          Content
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      foreach ($banner as $item) {
                      ?>
                      <tr>
                        <td>
                          <?php echo $i; ?>
                        </td>
                        <td>
                          <?php if ($item["BannerImage"] != '') { ?>
                          <img style="height:100px; width: auto;" src="<?php echo $item["BannerImage"];?>" class="img-responsive" alt="Image">
                          <?php }  ?>
                        </td>
                        <td>
                          <?php echo $item["BannerContent"]; ?>
                        </td>
                        <?php $i++; } ?>
                      </td>
                    </tbody>
                  </table>
                  </div>
              </div>
            </div>
            </div>
          </div>

          <!-- social detail -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Social Detail</h4>
                  <?php foreach ($social as $item) { ?>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo $item["SocialName"]; ?></label>
                    <div class="col-sm-9">
                      <p class="form-control"><?php echo $item["Link"]; ?></p>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>

          <!-- //shop info -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Shop Information Detail</h4>
                  <?php foreach ($shop_info as $item) { ?>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo $item["Phone"]; ?></label>
                    <div class="col-sm-9">
                      <p class="form-control"><?php echo $item["Address"]; ?></p>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include_once("partials/footer.php"); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <?php include_once("partials/scripts.php") ?>
  <!-- End custom js for this page-->
</body>

</html>

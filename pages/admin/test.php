<!DOCTYPE html>
<html lang="en">
<?php
  $title = "ADMIN Station";
  include_once("partials/header.php");
  require_once("../../database/entities/social_class.php");
  require_once("../../database/entities/shopinfo_class.php");
  require_once("../../database/entities/banner_class.php");

  $social = Social::list_social();
  $shop_info = ShopInfo::list_info();
  $banner = Banner::list_banner();

  for ($i = 1; $i <= count($shop_info); $i++){
    if(isset($_POST["save_info".$i]))
    {
        $infoId = $_POST["shopinfo_id".$i];
        $phone = $_POST["shopinfo_phone".$i];
        $address = $_POST["shopinfo_address".$i];

        $newInfo = new ShopInfo($phone,$address);
        $result = $newInfo->update_info($infoId);

      if(!$result)
      {
        header("Location:test.php?failure");
      }
      else
      {
        header("Location:test.php?info_updated");
      }
    }
    if(isset($_POST["delete_info".$i]))
    {
        $infoId = $_POST["shopinfo_id".$i];

        $newInfo = new ShopInfo('','');
        $result = $newInfo->delete_info($infoId);

      if(!$result)
      {
        header("Location:test.php?failure");
      }
      else
      {
        header("Location:test.php?info_deleted");
      }
    }
  }

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
          <!-- //shop info -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="text-align: end;">Shop Information Detail</h4>
                  <form class="" action="" method="post">
                    <?php
                    $i = 1;
                    foreach ($shop_info as $item) { ?>
                      <fieldset>
                        <legend>Shop Information <?php echo $i; ?></legend>
                        <?php if(isset($_GET["info_updated"])){
                          $notification = "Update Info successfully !!!";
                          include_once("partials/notify.php");
                        }
                          else if(isset($_GET["info_deleted"])){
                            $notification = "Delete Info successfully !!!";
                            include_once("partials/notify.php");
                          }
                        ?>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address </label>
                          <input type="hidden" name="shopinfo_id<?php echo $i; ?>" value="<?php echo $item['ShopInfoId']; ?>">
                          <div class="col-sm-9">
                            <input class="form-control" name="<?php echo 'shopinfo_address'.$i; ?>" value="<?php echo $item['Address']; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone</label>
                          <div class="col-sm-9">
                            <input class="form-control" value="<?php echo $item['Phone']; ?>" name="<?php echo 'shopinfo_phone'.$i; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <button type="cancel" name="delete_info<?php echo $i; ?>" class="btn btn-danger">DELETE</button>
                          <button type="submit" name="save_info<?php echo $i; ?>" class="btn btn-primary">SAVE</button>
                          <button type="cancel" name="cancel_info<?php echo $i; ?>" class="btn btn-danger">CANCEL</button>
                        </div>
                      </fieldset>
                    <?php
                    $i++;
                    } ?>
                  </form>
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

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
  $n_banner = count($banner);
  ///banner update
  for ($i = 1; $i<= count($banner); $i ++)
  {
    if (isset($_POST["btnbannerclear".$i]))
    {
      $id = $_POST["banner_id".$i];

      $newBanner = new Banner('','');
      $result = $newBanner->clear_banner($id);

      if ($result)
      {
        header ("Location: shop_detail_edit.php?banner-clear");
      }
      else
      {
        header("Location: shop_detail_edit.php?banner-failure");
      }
    }
    if (isset($_POST["update_banner".$i]))
    {
      echo $i;
       $id = $_POST["banner_id".$i];
       echo $id;

       $link = $_FILES["banner_image".$i];

       echo $link['name'];
       $cont = $_POST["banner_content".$i];

       $newBanner = new Banner($link,$cont);

       if ($link['name'] == '' || $link['size'] == 0)
       {
         $result = $newBanner->update_banner($id, false);
       }
       else
       {
         $result = $newBanner->update_banner($id, true);
       }


       if ($result)
       {
         header ("Location: shop_detail_edit.php?banner-updated");
       }
       else
       {
         header("Location: shop_detail_edit.php?banner-failure");
       }
    }
  }


  ///social updated
  for ($i = 1; $i <= count($social); $i ++)
  {
    if (isset($_POST["update_social".$i]))
    {
      $social_id = $_POST["social_id".$i];
      $link = $_POST["link".$i];

      $newInfo = new Social($social_id,'',$link);
      $result = $newInfo->update_social();
      if ($result)
      {
         header("Location: shop_detail_edit.php?social-updated");
       }
       else
       {
         header("Location: shop_detail_edit.php?social-failure");
       }
     }
   }

   /// information changes
   for ($i = 1; $i <= count($shop_info); $i++)
   {
     if (isset($_POST["delete_info".$i]))
     {
       $shopinfo_id = $_POST["shopinfo_id".$i];
       $newInfo = new ShopInfo('','');
       $result = $newInfo->delete_info($shopinfo_id);
       if($result)
       {
         header("Location:shop_detail_edit.php?info-deleted");
       }
       else
       {
         header("Location: shop_detail_edit.php?info-failure-change");
       }
     }
     if (isset($_POST["update_info".$i]))
     {
       $shopinfo_id = $_POST["shopinfo_id".$i];
       $address = $_POST["shopinfo_address".$i];
       $phone = $_POST["shopinfo_phone".$i];
       $newInfo = new ShopInfo($phone,$address);
       $result = $newInfo->update_info($shopinfo_id);
       if($result)
       {
         header("Location: shop_detail_edit.php?info-updated");
       }
       else
       {
         header("Location: shop_detail_edit.php?info-failure-change");
       }
     }
   }
   if (isset($_POST["save_info"]))
   {
     $phone = $_POST["new_shopinfo_phone"];
     $address = $_POST["new_shopinfo_address"];
     $newInfo = new ShopInfo($phone,$address);
     $result = $newInfo->insert_info();
     if($result)
     {
       header("Location: shop_detail_edit.php?info-inserted");
     }
     else
     {
       header("Location: shop_detail_edit.php?info-failure");
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
                        <!-- shop banners -->
                        <?php include_once("banner_view.php"); ?>

                        <!-- social detail -->
                        <?php include_once("social_view.php"); ?>

                        <!-- //shop info -->
                        <?php include_once("shopinfo_view.php"); ?>
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
        <script>
            //load image when user choose new files
            var n = <?php echo json_encode($n_banner); ?>;
            console.log(n);

            function readURL(input, i) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#show_banner_image'+i)
                        .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </body>
</html>

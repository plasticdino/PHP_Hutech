<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="..\..\media\image\shop\logo\banner.png" />
  <?php
    if (!isset($_SESSION)){
      session_start();
    }

    require_once("../../database/entities/product_class.php");
    require_once("../../database/entities/category_class.php");
    require_once("../../database/entities/image_class.php");
    require_once("../../database/entities/user_class.php");
    require_once("../../database/entities/social_class.php");
    require_once("../../database/entities/shopinfo_class.php");
    require_once("../../database/entities/banner_class.php");
    require_once("../../database/entities/ordering_class.php");
    
    $pros = Product::list_product();
    $social = Social::list_social();
    $shop_info = ShopInfo::list_info();
    $banner = Banner::list_banner();
    $n_banner = count($banner);
    $cates = Category::list_category();
    $orders = Ordering::list_order();
    ?>
</head>

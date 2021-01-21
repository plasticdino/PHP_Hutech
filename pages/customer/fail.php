<!DOCTYPE html>
<html lang="vi">
<?php
  $title = "ERROR";
  include_once("partials/header.php");
  require_once("../../database/entities/category_class.php");
  $cates = Category::list_category();

?>
<body>

  <?php include_once("partials/navbar.php"); ?>
    <!-- Women Banner Section End -->
    <h3 style="padding:50px;">CAN'T FIND WHAT YOU SEARCH FOR !!!</h3>
    <!-- Footer Section Begin -->
    <?php include_once("partials/footer.php"); ?>
    <!-- Footer Section End -->
    <?php include_once("partials/scripts.php"); ?>
    <!-- Js Plugins -->

  </body>
</html>

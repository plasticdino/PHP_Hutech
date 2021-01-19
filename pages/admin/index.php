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

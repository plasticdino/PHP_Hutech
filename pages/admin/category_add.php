<!DOCTYPE html>
<html lang="vi">
<?php
  $title = "Category Add";
  include_once("partials/header.php");
?>

<?php
require_once("../../database/entities/category_class.php");

if(isset($_POST["btnsubmit"])){
  $cateName = $_POST["txtCateName"];
  $cateImage = $_FILES["txtCateImage"];
  $cateDesc = $_POST["txtCateDesc"];

  $newCategory = new Category($cateName, $cateImage, $cateDesc);

  $result = $newCategory->insert_category();
  if(!result)
  {
    header("Location: category_add.php?failure");
  }
  else
  {
    header("Location: category_add.php?inserted");
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
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-body">
                <?php
                  if(isset($_GET["inserted"])){
                    $notification = "Insert category successfully !!!";
                    include_once("partials/notify.php");
                  }
                 ?>
                <h4 class="card-title">Add category</h4>
                <form class="forms-sample" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="CategoryName">Category Name</label>
                    <input type="text" class="form-control" id="CategoryName"
                    name="txtCateName" placeholder="Category Name"
                    value="<?php echo isset($_POST["txtCateName"])?$_POST["txtCateName"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="CategoryDescription">Category Description</label>
                    <input type="text" class="form-control" id="CategoryDescription"
                    name="txtCateDesc" placeholder="Category Description"
                    value="<?php echo isset($_POST["txtCateDesc"])?$_POST["txtCateDesc"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="CategoryImage">Category Image</label>
                    <input type="file" class="form-control" id="CategoryImage" name="txtCateImage"
                    accept=".PNG, .GIF, .JPG">
                  </div>

                  <button type="submit" class="btn btn-primary mr-2" name="btnsubmit">SAVE</button>
                  <button class="btn btn-light">CANCEL</button>
                </form>
              </div>
            </div>
            <?php include_once("partials/footer.php"); ?>
          </div>
        </div>

      </div>

    </div>
    <script src="assets/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/template.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/data-table.js"></script>
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables.bootstrap4.js"></script>
  </body>

</html>

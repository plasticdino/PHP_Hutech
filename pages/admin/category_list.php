<!DOCTYPE html>
<html lang="vi">
<?php
  $title = "Category Add";
  include_once("partials/header.php");
  require_once("../../database/entities/category_class.php");
  $cates = Category::list_category();
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
                <h4 class="card-title">Category List</h4>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th width:"10%">
                          Id
                        </th>
                        <th width:"20%">
                          Image
                        </th>
                        <th width:"30%">
                          Name
                        </th>
                        <th width:"30%">
                          Description
                        </th>
                        <th width:"5%">
                        </th>
                        <th width:"5%">
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      foreach ($cates as $item){
                       ?>
                      <tr>
                        <td>
                          <?php echo $item["CategoryId"]; ?>
                        </td>
                        <td class="py-1">
                          <img src="<?php echo $item["CategoryImage"];?>" class="img-responsive" alt="Image">
                        </td>
                        <td>
                          <?php
                          $string = $item["CategoryName"];
                          if (strlen($string) <= 30)
                          {
                            echo $string;
                          }
                          else
                          {
                            echo (substr($string, 0, 30). "...");
                          }
                          ?>
                        </td>
                        <td>
                          <?php
                            $string = $item["CategoryDescription"];
                            if (strlen($string) <= 30)
                            {
                              echo $string;
                            }
                            else
                            {
                              echo (substr($string, 0, 30). "...");
                            }
                           ?>
                        </td>
                        <td>
                          <button type="edit" class="btn btn-primary mr-2 btn-sm" name="btnedit">EDIT</button>
                        </td>
                        <td>
                          <button type="delete" class="btn btn-primary mr-2 btn-sm" name="btndelete">DELETE</button>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
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

<!DOCTYPE html>
<html lang="vi">
<?php
  $title = "Category Add";
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
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="card-body">
              <h4 class="card-title">Add category</h4>
              <form class="forms-sample">
                <div class="form-group">
                  <label for="CategoryId">Category ID</label>
                  <input type="text" class="form-control" id="CategoryId" placeholder="Category ID">
                </div>
                <div class="form-group">
                  <label for="CategoryName">Category Name</label>
                  <input type="text" class="form-control" id="CategoryName" placeholder="Category Name">
                </div>
                <button type="submit" class="btn btn-primary mr-2">SAVE</button>
                <button class="btn btn-light">CANCEL</button>
              </form>
            </div>
            <?php include_once("partials/footer.php"); ?>
          </div>
        </div>

      </div>

    </div>
  </body>

</html>

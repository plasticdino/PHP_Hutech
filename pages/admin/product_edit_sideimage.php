<div class="row" >
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" id="sideimage_page" >EDIT PRODUCT SIDE IMAGE</h4>
        <?php
        if(isset($_GET["deleteside"])){
          $notification = "Deleted !!!";
          include_once("partials/notify.php");
          }
              else if(isset($_GET["update_side"])){
                $notification = "Update side image successfully !!!";
                include_once("partials/notify.php");
              }
              else if(isset($_GET["failside"])){
                $notification = "This item is cursed !!!";
                include_once("partials/notify.php");
              }
             ?>
        <form method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <blockquote class="blockquote blockquote-primary">
              <footer class="blockquote-footer">
                Click image to delete product side image
              </footer>
            </blockquote>
          </div>

          <!--  Product multi image-->
          <div class="form-group row">
           <?php foreach ($mul_img as $img) {
             ?>
             <div class="col-sm-2 contain-side" >
               <div>
                 <input type="hidden" name="side_id <?php echo $img["ImageId"]; ?>" value="<?php echo $img["ImageId"]; ?>">
                 <button type="delete" name="<?php echo 'delete_side'.$img["ImageId"]; ?>" onclick="deleteSide('<?php echo $img["ImageId"]; ?>');" class="btn-danger">x</button>
                 <img src="<?php echo $img["ImageLink"]; ?>"
                   class="img-responsive prod-imgs side-image"  id="side_image<?php echo $img["ImageId"]; ?>"
                   alt="Image">
               </div>
             </div>

          <?php
           } ?>
          </div>

          <div class="form-group row buttom-align">
            <div class="col-sm-9">
              <input type="file" class="form-control" name="files[]"
              accept=".PNG, .GIF, .JPG" multiple>
            </div>

              <div class="col-sm-3 button-align">
                <button type="upload" name="btnupload" class="btn-primary btn-sm cus-button">UPLOAD</button>
              </div>

          </div>

        </form>
      </div>
    </div>
  </div>
</div>

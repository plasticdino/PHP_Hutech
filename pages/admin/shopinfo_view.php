 <div class="row">
   <div class="col-md-12 grid-margin stretch-card">
     <div class="card">
       <div class="card-body">
         <?php if(isset($_GET["info-inserted"])){
           $notification = "Insert new info successfully !!!";
           include_once("partials/notify.php");
         }
         if(isset($_GET["info-failure"])){
           $notification = "Insert fail !!!";
           include_once("partials/notify.php");
         }
         ?>
         <h4 class="card-title">Add new shop information</h4>
         <form class="forms-sample" method="post">
           <div class="form-group row">
             <label class="col-sm-3 col-form-label">Address</label>
             <div class="col-sm-9">
               <input class="form-control" required="true" name="new_shopinfo_address">
             </div>
           </div>
           <div class="form-group row">
             <label class="col-sm-3 col-form-label">Phone</label>
             <div class="col-sm-9">
               <input class="form-control"  name="new_shopinfo_phone"required="true">
             </div>
           </div>
           <div class="form-group row">
             <div class="col-md-9">
             </div>
             <div class="col-md-3">
               <button type="save" name="save_info" class="btn btn-primary btn-sm">SAVE</button>
             </div>
           </div>
         </form>
       </div>
       <div class="card-body">
         <?php if(isset($_GET["info-updated"])){
           $notification = "Update Info successfully !!!";
           include_once("partials/notify.php");
         }
         else if(isset($_GET["info-failure-change"])){
           $notification = "Fail !!!";
           include_once("partials/notify.php");
         }
         else if(isset($_GET["info-deleted"])){
           $notification = "Delete info successfully !!!";
           include_once("partials/notify.php");
         }
         ?>
         <h4 class="card-title">Shop Information Detail</h4>
         <form class="forms-sample" method="post">
           <?php
           $i = 1;
           foreach ($shop_info as $item) { ?>
           <div class="form-group row">
             <label class="col-sm-3 col-form-label">Address <?php echo $i; ?></label>
             <input type="hidden" name="<?php echo "shopinfo_id".$i; ?>" value="<?php echo $item['ShopInfoId']; ?>">
             <div class="col-sm-9">
               <input class="form-control" required="true" name="<?php echo "shopinfo_address".$i; ?>" value="<?php echo $item['Address']; ?>">
             </div>
           </div>
           <div class="form-group row">
             <label class="col-sm-3 col-form-label">Phone <?php echo $i; ?></label>
             <div class="col-sm-9">
               <input class="form-control" name="<?php echo "shopinfo_phone".$i; ?>" required="true" value="<?php echo $item['Phone']; ?>">
             </div>
           </div>
           <div class="form-group row">
             <div class="col-md-9">
             </div>
             <div class="col-md-3 button-align">
               <button type="update" name="<?php echo "update_info".$i; ?>" class="btn btn-primary btn-sm cus_button">UPDATE</button>
               <?php if ($i != 1)
               {
                 echo "<button type='delete' name='delete_info".$i."'
                 class='btn btn-primary btn-sm'>DELETE</button>";
               }
               ?>
             </div>
           </div>
           <?php
           $i++;
           } ?>
         </form>
       </div>
     </div>
   </div>
 </div>

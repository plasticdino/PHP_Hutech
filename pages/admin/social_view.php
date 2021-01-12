<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <?php if(isset($_GET["social-updated"])){
          $notification = "Update Info successfully !!!";
          include_once("partials/notify.php");
        }
          else if(isset($_GET["social-failure"])){
           $notification = "Update fail !!!";
           include_once("partials/notify.php");
        }
        ?>
        <h4 class="card-title">Social Detail</h4>
        <form class="forms-sample" method="post">
        <?php
        $i = 1;
        foreach ($social as $item) { ?>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label"><?php echo $item["SocialName"]; ?></label>
          <input type="hidden" name="<?php echo "social_id".$i; ?>" value="<?php echo $item['SocialId']; ?>">
          <div class="col-sm-9">
            <input class="form-control" name="<?php echo "link".$i; ?>" value="<?php echo $item['Link']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-9">
          </div>
          <div class="col-md-3 button-align">
            <button type="update" name="<?php echo "update_social".$i; ?>" class="btn btn-primary btn-sm">UPDATE</button>
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

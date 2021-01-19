<!DOCTYPE html>
<html lang="vi"><?php
  $title = "User Add";
  include_once("partials/header.php");
  require_once("../../database/entities/user_class.php");
  if(isset($_POST["btnsubmit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $role = $_POST["role"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    if (!(User::checkUserExists($username))){
        header("Location: user_add.php?exist");
    }else{
        $new_user = new User($username,$email,$phone,$role,$address,$password);
        $result = $new_user->insert_user();
        if(!$result)
        {
            header("Location: user_add.php?failure");
        }
        else
        {
            header("Location: user_add.php?inserted");
        }
    }
  }
 ?><body>
    <div class="container-scroller"><?php
     include_once("partials/navbar.php");
     ?><div class="container-fluid page-body-wrapper"><?php
     include_once("partials/sidebar.php");
     ?><div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-body"><?php
                  if(isset($_GET["inserted"])){
                    $notification = "Insert product successfully !!!";
                    include_once("partials/notify.php");
                  }
                  else if(isset($_GET["exist"])){
                    $notification = "Phone or email exists !!!";
                    include_once("partials/notify.php");
                  }
                  if(isset($_GET["failure"])){
                    $notification = "Insert product fail !!!";
                    include_once("partials/notify.php");
                  }
                 ?><h4 class="card-title">Add user</h4>
                <form class="forms-sample" method="post">

                  <div class="form-group">
                    <label for="txtUsername">Username</label>
                      <input type="text" class="form-control" required="true" id="txtUsername"
                      name="username" placeholder="Username"
                      value="<?php echo isset($_POST["username"])?$_POST["username"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="rdbCus" value="0" checked>
                        <label class="form-check-label" for="rdbCus">
                            Customer
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="rdbAdmin" value="1">
                        <label class="form-check-label" for="rdbAdmin">
                            Administrator
                        </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="txtPhone">Phone</label>
                    <input type="number" class="form-control" id="txtPhone"
                    name="phone" placeholder="Phone"
                    value="<?php echo isset($_POST["phone"])?$_POST["phone"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="txtEmail">Email</label>
                    <input type="text" class="form-control" id="txtEmail"
                    name="email" placeholder="Email"
                    value="<?php echo isset($_POST["email"])?$_POST["email"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="txtAddress">Address</label>
                    <input type="text" class="form-control" id="txtAddress"
                    name="address" placeholder="Address"
                    value="<?php echo isset($_POST["address"])?$_POST["address"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="txtPassword">Password</label>
                    <input type="password" class="form-control" required ="true"
                    name="password" placeholder="Password" id="pass" onkeyup='check();'
                    value="<?php echo isset($_POST["password"])?$_POST["password"]:""; ?>"/>
                  </div>

                  <div class="form-group">
                    <label for="txtConfirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" required ="true"
                    name="txtConfirmPassword" placeholder="Password" id="con-pass" onkeyup='check();'/>
                    <span id='message'></span>
                  </div>

                  <button type="submit" class="btn btn-primary mr-2" name="btnsubmit">SAVE</button>
                  <button class="btn btn-light" onclick="location.href='index.php'">CANCEL</button>
                </form>
              </div>
            </div><?php
            include_once("partials/footer.php");
            ?></div>
        </div>

      </div>

    </div>
    <?php include_once("partials/scripts.php") ?>

  </body>
  <script>
    var check = function() {
        var password = document.getElementById('pass').value;
        var confirm = document.getElementById('con-pass').value;
        if (confirm != "") {
            if (password == confirm)  {
                document.getElementById('con-pass').style.borderColor = 'green';
                document.getElementById('message').innerHTML = '';
            } else {
                document.getElementById('con-pass').style.borderColor = 'red';
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Password do not match';
            }
        }else{
            document.getElementById('message').innerHTML = '';
        }
    }
</script>
</html>

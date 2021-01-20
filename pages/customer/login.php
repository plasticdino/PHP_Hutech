<!DOCTYPE html>

<html lang="vi">
<?php
  $title = "HOMEPAGE";
  include_once("partials/header.php");
  require_once("../../database/entities/user_class.php");
//   require_once("../../database/entities/banner_class.php");
//   require_once("../../database/entities/category_class.php");
//   require_once("../../database/entities/product_class.php");
//   require_once("../../database/entities/image_class.php");
    if ((isset($_SESSION['username'])) && ($_SESSION['username'] != "")){
        header("location: index.php");
    }
    if (isset($_POST['btn-login'])){
        $user = User::checkLogin($_POST['username'],$_POST['password']);
        if (!empty($user)){
            $_SESSION['userid'] = $user['UserId'];
            $_SESSION['username'] = $user['Username'];
            $_SESSION['role'] = $user['Role'];
            $_SESSION['email'] = $user['Email'];
            $_SESSION['address'] = $user['Address'];
            $_SESSION['phone'] = $user['Phone'];
            header("Location: index.php");
        }else{
            ?>
                <script>alert('Sai tài khoản hoặc mật khẩu')</script>
            <?php
            header("Location: index.php");
        }
    }

?>
<body>
<?php include_once("partials/navbar.php"); ?>
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form method="post">
                            <div class="group-input">
                                <label for="txtUsername">Username</label>
                                <input type="text" name="username" id="txtUsername" value="<?php echo isset($username)?$username:'' ?>">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password</label>
                                <input type="password" name="password" id="pass">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" name="btn-login" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="./register.php" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
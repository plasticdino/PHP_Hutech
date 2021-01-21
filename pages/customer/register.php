<!DOCTYPE html>

<html lang="vi">
<?php
    $title = "HOMEPAGE";
    include_once("partials/header.php");
    // require_once("../../database/entities/banner_class.php");
    // require_once("../../database/entities/category_class.php");
    // require_once("../../database/entities/product_class.php");
    // require_once("../../database/entities/image_class.php");
    require_once("../../database/entities/user_class.php");
    if (isset($_SESSION['username']) != ""){
        header("location: index.php");
    }
    if (isset($_POST["btn-register"]) && ($_POST['txtpass'] == $_POST['txtconfirm'])){
        $username = $_POST["username"];
        if (!(User::checkUserExists($username))){
            echo 'Username registered';
        }else{
            $username = $_POST["username"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $pass = $_POST["password"];
            $address = $_POST["address"];
            $role = 0; //user
            $new_user = new User($username,$email,$phone,$role,$address,$pass);
            $result = $new_user->insert_user();
            if (!$result){
                ?>
                <script>alert('Có lỗi xảy ra, vui lòng kiểm tra lại dữ liệu')</script>
                <?php
            }else{
                $_SESSION['username'] = $username;
                header("Location: login.php");
            }
        }
    }


?>
<header>
    <?php include_once("partials/navbar.php"); ?>
</header>
<body>
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form method="post">
                            <div class="group-input">
                                <label for="txtUsername">Username*</label>
                                <input type="text" id="txtUsername" name="username" required>
                            </div>
                            <div class="group-input">
                                <label for="txtPhone">Phone</label>
                                <input type="text" id="txtPhone" name="phone" required>
                            </div>
                            <div class="group-input">
                                <label for="txtEmail">Email</label>
                                <input type="text" id="txtEmail" name="email" required>
                            </div>
                            <div class="group-input">
                                <label for="txtAddress">Address</label>
                                <input type="text" id="txtAddress" name="address" required>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name="password" required onkeyup='check();'>
                            </div>
                            <div class="group-input" id="divconfirm">
                                <label for="con-pass">Confirm Password *</label required>
                                <input type="password" id="con-pass" name="confirm" onkeyup='check();'>
                                <span id='message'></span>
                            </div>
                            <button type="submit" id="register" class="site-btn register-btn" name="btn-register">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="./login.php" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

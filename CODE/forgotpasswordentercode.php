<?php
require_once("include/initialize.php");

?>
<?php
// login confirmation
if (isset($_SESSION['UserID'])) {
  redirect(web_root . "index.php");
}
?>



<!-- Bootstrap core CSS -->



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Forgot Password | User</title>
  <link rel="icon" type="image/x-icon" href="img/LOGO.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">

  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>admin/adminMenu/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>admin/adminMenu/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>admin/adminMenu/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>admin/adminMenu/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>admin/adminMenu/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>admin/adminMenu/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>admin/adminMenu/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>admin/adminMenu/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>admin/adminMenu/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>admin/adminMenu/css/main.css">
  <!--===============================================================================================-->
</head>
<style type="text/css">
  .login100-more img {
    width: 100%;
    height: 100%;
  }
</style>

<body style="background-color: white;">

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" action="" method="POST">
          <span class="login100-form-title p-b-43">
            Step 2. New Password
          </span>

          <h3><?php echo check_message() ?></h3>
          <div class="wrap-input100 validate-input" data-validate="Code is required">
            <input class="input100" type="text" name="vercode" autocomplete="off">
            <span class="focus-input100"></span>
            <span class="label-input100">Verification Code</span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="New Password is required">
            <input class="input100" type="password" name="pword">
            <span class="focus-input100"></span>
            <span class="label-input100">New Password</span>
          </div>

          <div class="flex-sb-m w-full p-t-3 p-b-32">
            <!--  <div class="contact100-form-checkbox">
              <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
              <label class="label-checkbox100" for="ckb1">
                Remember me
              </label>
            </div> -->

            <!--  <div>
              <a href="#" class="txt1">
                Forgot Password?
              </a>
            </div> -->
          </div>
    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="background-color:#025a99;color:white" type="submit" name="btnLogin">
                            SUBMIT
                        </button>
                    </div>
     

        
          <br>


          
          <!-- 
          <div class="text-center p-t-46 p-b-20">
            <span class="txt2">
              or <a href="../index.php"><i class="fa fa-arrow-left"></i> Back to Home</a>
            </span> 
          </div>-->
          <!-- 
          <div class="login100-form-social flex-c-m">
            <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
              <i class="fa fa-facebook-f" aria-hidden="true"></i>
            </a>

            <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
          </div> -->
        </form>

        <div class="login100-more" style="background: white; text-align: center; padding-top: 10%;">
          <img src="img/LOGO.png" style="width: 60%;height: 60%;object-fit: contain;">
        </div>
      </div>
    </div>
  </div>





  <!--===============================================================================================-->
  <script src="<?php echo web_root; ?>admin/adminMenu/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo web_root; ?>admin/adminMenu/vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo web_root; ?>admin/adminMenu/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo web_root; ?>admin/adminMenu/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo web_root; ?>admin/adminMenu/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo web_root; ?>admin/adminMenu/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo web_root; ?>admin/adminMenu/vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo web_root; ?>admin/adminMenu/vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo web_root; ?>admin/adminMenu/js/main.js"></script>

</body>

</html>

<?php
if (isset($_POST['btnLogin'])) {

    $vercode = $_POST['vercode'];
    $pword = sha1($_POST['pword']);

    $sql = "SELECT * From `user` WHERE Vercode = '$vercode' ";
    $mydb->setQuery($sql);
    $row = $mydb->executeQuery();
    $maxrow = $mydb->num_rows($row);

    if ($maxrow > 0) {
        $sql = "UPDATE `user` SET `password` = '$pword' WHERE Vercode = '$vercode'";
        $mydb->setQuery($sql);
        $mydb->executeQuery();
        
        message("Password Changed! You can login now.", "success");
        redirect("login.php");
    }
    else{
        message("Invalid Code!", "error");
        redirect("forgotpasswordentercode.php");
    }

}
?>
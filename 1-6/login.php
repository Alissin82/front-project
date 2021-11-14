<!DOCTYPE html>
<?php
  session_start();
  if (isset($_GET['exit'])) {
    if ($_GET['exit']=="yes") {
      session_unset();
    }
  }
  if (isset($_SESSION['login'])) {
    die("<script>window.location.replace('dashboard.php');</script>");
  }
 ?>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>فراهنرجو - ورود</title>
    <?php include('php/head.php') ?>
  </head>
  <body>
  
    <?php include('php/header.php'); ?>
    <main class="container">
       <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
         <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class=" row">
                <div class="col-md-8 mx-auto">
                  <img class="img-fluid" src="img\img_568656.png" alt="login user" >
                </div>
              </div>
              <div class="form-group">
                <label for="username">نام کاربری : </label>
                 <input type="text" name="username" class="form-control">
              </div>
              <div class="form-group">
                 <label for="password">رمز عبور : </label>
                 <input type="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" name="" value="ورود">
                <p>از قبل اکانت ندارید؟<a href="register.php">ثبت نام</a> کنید </p>
              </div>
              <a href="index.php" class="btn btn-secondary btn-block">بازگشت</a>
            </div>
           <div class="col-md-4"></div>
         </div>
       </form>
    </main>
    <?php include('php/footer.php'); ?>
  </body>
</html>

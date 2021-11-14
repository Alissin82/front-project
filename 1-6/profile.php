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
    <title>فراهنرجو - پروفایل</title>
    <?php include('php/head.php') ?>
  </head>
  <body>
    <?php include('php/header.php'); ?>
    <main class="container">
        <section class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form name="register" id="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <span class="require">* </span>
                            <label for="">نام کاربری : </label>
                            <input class="form-control" id="u_username" name="u_username" maxlength="20" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <label for="">نام و نام خانوادگی : </label>
                            <input class="form-control" type="text" id="u_name" name="u_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <span class="require">* </span>
                            <label for="">رمز عبور : </label>
                            <input class="form-control" type="password" id="u_password" name="u_password" maxlength="20" required>
                        </div>

                        <div class="form-group col-md-6">
                            <span class="require">* </span>
                            <label for="">تکرار رمز عبور : </label>
                            <input class="form-control" type="password" id="u_repeat_password" name="u_repeat_password" maxlength="20" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <span class="require">* </span>
                            <label for="">پست الکترونیکی(ایمیل) : </label>
                            <input class="form-control" type="email" id="u_email" name="u_email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <label for=""> شماره تماس : </label>
                            <input class="form-control" type="text" id="u_phonenumber" name="u_phonenumber">
                        </div>
                    </div>

                    <div class="form-group row">
                        <input class="btn btn-primary col-md-5 mx-3" type="submit" id="submit" name="buttonsubmit" value="ثبت" onclick="validate()">
                        <input class="btn btn-outline-primary col-md-5 mx-3" type="reset" name="buttonsubmit" value="بازیابی مقادیر اولیه">
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </section>
        </form>
    </main>
    <?php include('php/footer.php'); ?>
  </body>
</html>

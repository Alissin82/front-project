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
    <title>فراهنرجو - پنل ادمین</title>
    <?php include('php/head.php') ?>
  </head>
  <body>
    <?php include('php/header.php'); ?>
    <main class="container">
        <section class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2>پنل خصوصی ادمین های فراهنرجو</h2>
                <div class="row">
                    <ul>
                        <li><a href="admin_blog_view.php">ثبت پست جدید وبلاگ</a></li>
                        <li> <a href="admin_users_view.php">مشاهده کاربران</a> </li>
                        <li> <a href="addcontent.php">مشاهده پست های وبلاگ</a> </li>
                    </ul>
                    
                </div>
            </div>
            <div class="col-md-4"></div>
        </section>
        </form>
    </main>
    <?php include('php/footer.php'); ?>
  </body>
</html>

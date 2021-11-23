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
    <title>فراهنرجو - ثبت نام</title>
    <?php include('php/head.php') ?>
  </head>
  <body>
    <?php include('php/header.php'); ?>
    <main class="container">
        <section class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="row">
                    <p class="alert alert-secondary"> در دست ساخت، صبور باشید </p>
                </div>
            </div>
            <div class="col-md-4"></div>
        </section>
        </form>
    </main>
    <?php include('php/footer.php'); ?>
  </body>
</html>

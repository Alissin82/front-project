<?php
  session_start();
  if (!isset($_SESSION['login'])) {
    die("<script>window.location.replace('login.php');</script>");
  }
 ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>فراهنرجو - میز کار</title>
    <?php include('php/head.php') ?>
  </head>
  <body>
    <?php include('php/header.php'); ?>
    
    <?php include('php/footer.php'); ?>
  </body>
</html>

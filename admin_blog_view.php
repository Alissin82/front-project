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
    <title>فراهنرجو - وبلاگ</title>
    <?php include('php/head.php') ?>
  </head>
  <body>
    <?php include('php/header.php'); ?>
    <main class="container">

        <?php
            require('php/server.php');
            $db = connect();

            if (isset($_GET['code'])) {
                $code = $_GET['code'];
                $row = $db->query('SELECT * FROM blog_content WHERE blg_rowid = ?', $code)->fetchArray();
                $rowid = 0;
                
                if ($row != NULL){
                  $rowid++;
                  echo "<div class='card mb-2'>";
                  echo "<div class='card-body'>";
                  echo "<h2 class='card-title'>". $row['blg_title'] ."</h2>";
                  echo "<span>". $row['blg_author'] ."</span> - <span>". $row['blg_date'] ."</span> - <span>". $row['blg_category'] ."</span>";
                  echo "<p class='card-text mt-4'>". $row['blg_content'] ."</p>";
                  echo "</div>";
                  echo "<div class='card-footer'><a href='admin_blog_view.php' class='card-link'>بازگشت</a> <a href='editcontent.php?code=$code' class='card-link'>ویرایش</a> <a href='' class='card-link'>حذف</a></div>";
                  echo "</div>";
                }
            } else {
                $accounts = $db->query('SELECT * FROM blog_content')->fetchAll();
                $rowid = 0;
                
                if ($accounts != NULL){
                  echo "<div class='card-deck'>";
                  if ($rowid % 4 == 0) {
                    echo "<div class='card-deck'>";
                  }
                  $rowid++;
                  foreach ($accounts as $row) {
                    echo "<div class='card mb-2'>";
                    echo "<div class='card-body'>";
                    echo "<h2 class='card-title'>". $row['blg_title'] ."</h2>";
                    echo "<span>". $row['blg_author'] ."</span> - <span>". $row['blg_date'] ."</span> - <span>". $row['blg_category'] ."</span>";
                    
                    echo "<p class='card-text mt-4'>". $row['blg_meta_summary'] ."</p>";
                    echo "</div>";
                    echo "<div class='card-footer'><a href='admin_blog_view.php?code=". $row['blg_rowid'] ."' class='card-link'>ادامه مطلب</a></div>";
                    echo "</div>";
                  }
                  if ($rowid % 4 == 0) {
                    echo "</div'>";
                  }
                }

              }  
        ?>
    </main>
    <?php include('php/footer.php'); ?>
  </body>
</html>

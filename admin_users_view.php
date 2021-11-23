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
    <title>فراهنرجو - کاربران</title>
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
                $row = $db->query('SELECT * FROM users_table WHERE u_rowid = ?', $code)->fetchArray();
                $rowid = 0;

                if ($row != NULL){
                  $rowid++;
                  echo "<div class='card mb-2'>";
                  echo "<div class='card-body'>";
                  echo "<h2 class='card-title'>". $row['u_username'] ."</h2>";
                  echo "<span>". $row['u_name'] ."</span> - <span>". $row['u_password'] ."</span>";
                  echo "<p class='card-text mt-4'>". $row['u_email'] . " | " . $row['u_phonenumber'] ."</p>";
                  echo "</div>";
                  echo "<div class='card-footer'><a href='admin_users_view.php' class='card-link'>بازگشت</a> <a href='editcontent.php?code=$code' class='card-link'>ویرایش</a> <a href='' class='card-link'>حذف</a></div>";
                  echo "</div>";
                }
            } else {
                $accounts = $db->query('SELECT * FROM users_table')->fetchAll();
                $rowid = 0;
                
                if ($accounts != NULL){
                  
                  echo "<table class='table table-bordered table-striped table-responsive table-sm'>";
                  echo "<thead class='table-primary'>";
                  echo "<th>ردیف</th>";
                  echo "<th>نام کاربری</th>";
                  echo "<th>رمز عبور</th>";
                  echo "<th>نام و نام خانوادگی</th>";
                  echo "<th>پست الکترونیکی</th>";
                  echo "<th>شماره تماس</th>";
                  echo "<th>مقام</th>";
                  echo "<th>عملیات</th>";
                  echo "</thead>";
                  echo "<tbody>";
                  
                  foreach ($accounts as $row) {
                    echo "<tr>";
                    $rowid++;
                    $code = $row['u_rowid'];
                    echo "<td>".$row['u_rowid']."</td>";
                    echo "<td>".$row['u_username']."</td>";
                    echo "<td>".$row['u_password']."</td>";
                    echo "<td>".$row['u_name']."</td>";
                    echo "<td>".$row['u_email']."</td>";
                    echo "<td>".$row['u_phonenumber']."</td>";
                    echo "<td>".$row['u_rank']."</td>";
                    echo "<td>";
                    echo "<a title='ویرایش' class='text-success fas fa-user-edit' href='admin_user_edit.php?code=$code'></a>";
                    echo "<a title='مشاهده' class='text-primary fas fa-search' href='admin_users_view.php?code=$code'></a>";
                    echo "</td>";

                    /*echo "<h2 class='card-title'>". $row['u_username'] ."</h2>";
                    echo "<p>". $row['u_name'] ."</p>";
                    echo "<p>". $row['u_password'] ."</p>";
                    echo "<p class='card-text mt-4'>". $row['u_email'] . " | " . $row['u_phonenumber'] ."</p>";
                    echo "</div>";
                    echo "<div class='card-footer'><a href='admin_blog_view.php?code=". $row['u_rowid'] ."' class='card-link'>مشاهده کامل </a><a href='' class='card-link'>ویرایش</a></div>";
                    echo "</div>";*/
                    echo "</tr>";
                  }
                  echo "</tbody>";
                  echo "</table>";
                }

              }  
        ?>
    </main>
    <?php include('php/footer.php'); ?>
  </body>
</html>

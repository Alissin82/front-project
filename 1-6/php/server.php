<?php
  function connect(){

    $connection = mysqli_connect('localhost','root','','front-project');
    if (!$connection) {
      die("<p class='alert alert-danger'><strong>اخطار</strong> اتصال به پایگاه داده ناموفق بود</p>");
    }
    $connection->set_charset('utf8');
    mysqli_set_charset($connection,"utf8");

    return $connection;
  }
 ?>

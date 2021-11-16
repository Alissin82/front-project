<?php
session_start();
if (isset($_SESSION['login'])) {
    die("<script>window.location.replace('dashboard.php');</script>");
  }
?>
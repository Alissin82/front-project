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
    <title>فراهنرجو - ثبت مقاله</title>
    <?php include('php/head.php') ?>
  </head>
  <body>
    <?php include('php/header.php'); ?>
    <main class="container">
        <form name="addcontent" id="addcontent" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <section class="row" id="error">
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require('php/server.php');
                        $connection = connect();

                        require_once('php/date.php');
                        
                        $blg_title = $_POST['blg_title'];
                        $blg_author = $_POST['blg_author'];
                        $blg_content = $_POST['blg_content'];
                        $blg_category = "بدون دسته بندی";
                        $blg_date = gregorian_to_jalali(date('Y'),date('m'),date('d'),'/');
                        $minute = ((date('i')+30)>60?date('i')-30:date('i')+30);

                        $blg_time = (date('H')+3).':'.($minute < 10? '0'.$minute:$minute);
                        $blg_meta_word = $blg_title;
                        $blg_meta_summary = $_POST['blg_meta_summary'];

                        $sql = "INSERT INTO
                         blog_content (blg_title, blg_author, blg_content, blg_category, blg_date, blg_time, blg_meta_word, blg_meta_summary)
                         VALUES ('$blg_title','$blg_author','$blg_content','$blg_category','$blg_date','$blg_time','$blg_meta_word','$blg_meta_summary')";

                        $result = mysqli_query($connection,$sql);

                        if ($result) {
                            echo "<p class='alert alert-success alert-dismissible fade show'><strong>پیام سیستم</strong> ثبت محتوا شما با موفقیت انجام شد <button type='button' class='close' data-dismiss='alert'>&times;</button></p>";
                        }
                        else {
                            echo "<p class='alert alert-danger alert-dismissible fade show'><strong>اخطار</strong> ثبت محتوا شما به مشکل برخورد <button type='button' class='close' data-dismiss='alert'>&times;</button></p>";
                        }
                    }
                ?>
            </section>
            <section class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <span class="require">* </span>
                        <label for="blg_title">عنوان : </label>
                        <input class="form-control" id="blg_title" name="blg_title" maxlength="150">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <span class="require">* </span>
                        <label for="">نویسنده : </label>
                        <input class="form-control" type="text" id="blg_author" name="blg_author" maxlength="60">
                    </div>
                </div>
            </section>

            <section class="row">
                <div class="form-group col-12">
                    <span class="require">* </span>
                    <label for="blg_content">توضیحات متا : </label>
                    <input class="form-control" type="text" id="blg_meta_summary" name="blg_meta_summary">
                </div>
            </section>

            <section class="row">
                <div class="form-group col-12">
                    <span class="require">* </span>
                    <label for="blg_content">متن : </label>
                    <textarea class="form-control" name="blg_content" id="blg_content"></textarea>
                </div>
            </section>

            <section class="row">
                <div class="form-group col-12">
                    <input class="btn btn-primary btn-block col-md-6 mx-auto" type="submit" id="submit" name="submit" value="ذخیره" onclick="validate()">
                    <input class="btn btn-outline-primary btn-block col-md-6 mx-auto" type="reset" name="reset" value="پاکسازی">
                </div>
            </section>
        </form>
    </main>z
    <?php include('php/footer.php'); ?>
  </body>
  <script>
      function validate() {
            document.getElementById('error').innerHTML = "";
            var error = false;
            if (document.getElementById('blg_title').value == "" ||
             document.getElementById('blg_author').value == "" ||
             document.getElementById('blg_content').value == "" ||
              document.getElementById('blg_meta_summary').value == ""
              ) {
                    document.getElementById('error').innerHTML =
                     document.getElementById('error').innerHTML +
                     "<p id='error' class='alert alert-danger'> تمام ورودی های ستاره دار باید تکمیل شوند </p>";
                    error = true;
            }

            var blg_meta_summary = document.getElementById('blg_meta_summary').value;
            if (blg_meta_summary.length <= 50 || blg_meta_summary.length >= 160) {
                    var strlength = blg_meta_summary.length;
                    document.getElementById('error').innerHTML =
                     document.getElementById('error').innerHTML +
                     "<p id='error' class='alert alert-danger'> توضیحات متا باید بین 50 تا 160 کارکتر باشد، طول فعلی : " + strlength + "</p>";
                    error = true;
            }
            if (error === true) {
                return false;
            }
        } 

        document.getElementById('addcontent').addEventListener("submit",function (event) {
                if (validate() === false) {
                    event.preventDefault();
                }
            },
            false
        );
  </script>
</html>

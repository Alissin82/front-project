<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>فراهنرجو</title>
    <?php include('php/head.php') ?>
  </head>
  <body id="body">
    <?php include('php/header.php'); ?>
    <main class="container-fluid">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <?php 
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                  require('php/server.php');
                  $db = connect();

                  $title = $_POST['txttitle'];
                  $fname = $_POST['txtfname'];
                  $lname = $_POST['txtlname'];
                  $email = $_POST['txtemail'];
                  $content = $_POST['txtcontent'];

                  $insert = $db->query('INSERT INTO contact_us_table (title,fname,lname,email,content) VALUES (?,?,?,?,?)', $title, $fname, $lname, $email, $content);
                  $result = $insert->affectedRows();

                  if ($result) {
                      echo "<p class='alert alert-success alert-dismissible fade show'><strong>پیام سیستم</strong> پیام شما با موفقیت ارسال شد <button type='button' class='close' data-dismiss='alert'>&times;</button></p>";
                    }
                    else {
                      echo "<p class='alert alert-danger alert-dismissible fade show'><strong>اخطار</strong> ارسال پیام شما به مشکل برخورد <button type='button' class='close' data-dismiss='alert'>&times;</button></p>";
                    }
                }
            ?>
            <div class="form-group">
                <span class="require">* </span>
                <label for="txttitle">عنوان پیام : </label>
                <input class="form-control" type="text" id="txttitle" name="txttitle" required oninvalid="setCustomValidity('عنوان باید وارد شود')">
            </div>

            <div class="form-group row">
                <div class="form-group col-md-6">
                    <span class="require">* </span>
                    <label for="txtfname">نام : </label>
                    <input class="form-control" type="text" id="txtfname" name="txtfname" required oninvalid="setCustomValidity('نام باید وارد شود')">
                </div>

                <div class="form-group col-md-6">
                    <label for="txtlname">نام خانوادگی : </label>
                    <input class="form-control" type="text" id="txtlname" name="txtlname">
                </div>
            </div>
           
            <div class="form-group">
                <span class="require">* </span>
                <label for="txtemail">ایمیل : </label>
                <input class="form-control" type="email" id="txtemail" name="txtemail" required oninvalid="setCustomValidity('ایمیل را صحیح وارد کنید')">
            </div>
            
            <div class="form-group">
                <label for="txtcontent">متن پیام : </label>
                <textarea class="form-control" name="txtcontent" id="txtcontent"></textarea>
            </div>

            <div class="form-group">
                <input class="btn btn-primary btn-block col-md-6 mx-auto" type="submit" name="bbtnsubmit" value="ارسال">
                <input class="btn btn-outline-primary btn-block col-md-6 mx-auto" type="reset" name="btnsubmit" value="پاکسازی">
            </div>
        </form>
    </main>
    <?php include('php/footer.php'); ?>
  </body>
</html>

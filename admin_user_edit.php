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
    <title>فراهنرجو - ویرایش کاربر</title>
    <?php include('php/head.php') ?>
  </head>
  <body>
    <?php include('php/header.php'); ?>
    <main class="container">
        <section class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="row">
                    <p class='alert alert-danger' id="error" style="display:none">  </p>
                    <?php
                        require('php/server.php');
                        $db = connect();
                        if (isset($_GET['code']) and $_GET['code'] != null) {
                            
                            $accounts = $db->query('SELECT * FROM users_table WHERE u_rowid = ?', $_GET['code'])->fetchArray();

                            if ($accounts == NULL) {
                                die("<p class='alert alert-danger alert-dismissible fade show'><strong>خطا</strong> کاربر مورد نظر برای ویرایش یافت نشد <button type='button' class='close' data-dismiss='alert'>&times;</button></p>");
                            }

                            $u_rowid = $accounts['u_rowid'];
                            $u_name = $accounts['u_name'];
                            $u_username = $accounts['u_username'];
                            $u_password = $accounts['u_password'];
                            $u_email = $accounts['u_email'];
                            $u_phonenumber = $accounts['u_phonenumber'];
                            $u_rank = $accounts['u_rank'];
                        }

                        if ($_SERVER['REQUEST_METHOD'] == "POST") {

                            $u_rowid = $_POST['u_rowid'];
                            $u_name = $_POST['u_name'];
                            $u_username = $_POST['u_username'];
                            $u_password = $_POST['u_password'];
                            $u_email = $_POST['u_email'];
                            $u_phonenumber = $_POST['u_phonenumber'];
                            $u_rank = $_POST['u_rank'];

                            $update = $db->query('UPDATE users_table SET
                            u_name = ?,u_username = ?,u_password = ?,u_email = ?,
                            u_phonenumber = ?,u_rank = ?
                            WHERE u_rowid = ?',
                            $u_name,$u_username,$u_password,$u_email,$u_phonenumber,
                            $u_rank, $u_rowid);
                            
                            $result = $update->affectedRows();

                            if ($result > 0) {
                                echo "<p class='alert alert-success alert-dismissible fade show'><strong>پیام سیستم</strong> ویرایش محتوا شما با موفقیت انجام شد <button type='button' class='close' data-dismiss='alert'>&times;</button></p>";
                            }
                            else {
                                echo "<p class='alert alert-danger alert-dismissible fade show'><strong>خطا</strong> ویرایش محتوا شما به مشکل برخورد <button type='button' class='close' data-dismiss='alert'>&times;</button></p>";
                            }
                        }
                    ?>
                </div>
                <form name="register" id="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <input type="hidden" name="u_rowid" value="<?php echo $u_rowid; ?>">
                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <span class="require">* </span>
                            <label for="">نام کاربری : </label>
                            <input class="form-control" id="u_username" name="u_username" maxlength="20" required value="<?php echo $u_username; ?>">
                            <p class='alert alert-danger' id="untxtavaible" style="display:none">  </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <label for="">نام و نام خانوادگی : </label>
                            <input class="form-control" type="text" id="u_name" name="u_name" value="<?php echo $u_name; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <span class="require">* </span>
                            <label for="">رمز عبور : </label>
                            <input class="form-control" type="password" id="u_password" name="u_password" maxlength="20" required value="<?php echo $u_password; ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <span class="require">* </span>
                            <label for="">تکرار رمز عبور : </label>
                            <input class="form-control" type="password" id="u_repeat_password" name="u_repeat_password" maxlength="20" required value="<?php echo $u_password; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <span class="require">* </span>
                            <label for="">پست الکترونیکی(ایمیل) : </label>
                            <input class="form-control" type="email" id="u_email" name="u_email" required value="<?php echo $u_email; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <label for=""> شماره تماس : </label>
                            <input class="form-control" type="text" id="u_phonenumber" name="u_phonenumber" value="<?php echo $u_phonenumber; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="u_rank" class="col-8">مقام کاربر : </label>
                        <label class="form-check-label">
                            <input type="radio" name="u_rank" value=1 <?php echo($u_rank == 1?'checked':0) ?>> مدیر
                        </label>

                        <label class="form-check-label">
                            <input type="radio" name="u_rank" value=0 <?php echo($u_rank == 1?"disabled":'checked') ?>> عادی
                        </label>
                    </div>

                    <div class="form-group row">
                        <input class="btn btn-primary col-md-5 mx-3" type="submit" id="submit" name="buttonsubmit" value="ذخیره" onclick="validate()">
                        <input class="btn btn-outline-primary col-md-5 mx-3" type="reset" name="buttonsubmit" value="پاکسازی">
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </section>
        </form>
    </main>
    <?php include('php/footer.php'); ?>
  </body>
  <script>

    function validate() {
        var password = document.getElementById('u_password').value;
        var repassword = document.getElementById('u_repeat_password').value;
        if (password !== repassword) {
            document.getElementById('error').innerHTML = "<strong>خطا</strong>رمز عبور و تکرار آن یکسان نیستند";
            document.getElementById('error').style.display = "block";
            return false;
        } else {
            document.getElementById('error').innerHTML = "";
            document.getElementById('error').style.display = "none";
            return true;
        }
    } 

    document.getElementById('register').addEventListener("submit",function (event) {
            if (validate() === false) {
                event.preventDefault();
            }
        },
        false
    );

    function checkAvaibility(str) {
        if (str.length == 0) { 
            document.getElementById("untxtavaible").innerHTML = "";
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            var result = this.responseText;
            if (result === false) {
                document.getElementById("untxtavaible").innerHTML = "نام کاربری وجود دارد";
                document.getElementById('untxtavaible').style.display = "block";
                document.getElementById('register').addEventListener("submit",function (event) {event.preventDefault();},false);
            }
            else
            {
                document.getElementById('untxtavaible').style.display = "none";
            }
        }
        xhttp.open("GET", "php/checkAvaiblity.php?q="+str);
        xhttp.send();   
    }

  </script>
</html>

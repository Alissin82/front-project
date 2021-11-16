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
                    <p class='alert alert-danger' id="error" style="display:none">  </p>
                    <?php
                        $error = false;
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            require('php/server.php');
                            $connection = connect();

                            $u_username = $_POST['u_username'];
                            $u_name = $_POST['u_name'];
                            $u_password = $_POST['u_password'];
                            $u_email = $_POST['u_email'];
                            $u_phonenumber = $_POST['u_phonenumber'];

                            $sql = "INSERT INTO users_table (u_username, u_name, u_password, u_email, u_phonenumber) VALUES ('$u_username','$u_name','$u_password','$u_email','$u_phonenumber')";

                            $result = mysqli_query($connection,$sql);

                            if ($result) {
                                echo "<p class='alert alert-success alert-dismissible fade show'><strong>پیام سیستم</strong> عضویت شما با موفقیت انجام شد <button type='button' class='close' data-dismiss='alert'>&times;</button></p>";
                            }
                            else {
                                echo "<p class='alert alert-danger alert-dismissible fade show'><strong>اخطار</strong> عضویت شما به مشکل برخورد <button type='button' class='close' data-dismiss='alert'>&times;</button></p>";
                            }
                        }
                    ?>
                </div>
                <form name="register" id="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <span class="require">* </span>
                            <label for="">نام کاربری : </label>
                            <input class="form-control" id="u_username" name="u_username" maxlength="20" required onkeyup="checkAvaibility(this.value)">
                            <p class='alert alert-danger' id="untxtavaible" style="display:none">  </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <label for="">نام و نام خانوادگی : </label>
                            <input class="form-control" type="text" id="u_name" name="u_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <span class="require">* </span>
                            <label for="">رمز عبور : </label>
                            <input class="form-control" type="password" id="u_password" name="u_password" maxlength="20" required>
                        </div>

                        <div class="form-group col-md-6">
                            <span class="require">* </span>
                            <label for="">تکرار رمز عبور : </label>
                            <input class="form-control" type="password" id="u_repeat_password" name="u_repeat_password" maxlength="20" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <span class="require">* </span>
                            <label for="">پست الکترونیکی(ایمیل) : </label>
                            <input class="form-control" type="email" id="u_email" name="u_email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <label for=""> شماره تماس : </label>
                            <input class="form-control" type="text" id="u_phonenumber" name="u_phonenumber">
                        </div>
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

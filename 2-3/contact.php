<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <title>فراهنرجو - تماس با ما</title>
    <?php include('head.php') ?>

</head>
<body class="container-fluid">
    <header>
        <h1>تماس با ما</h1>
    </header>
    <main class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <?php 
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $connection = mysqli_connect("localhost","root","","uni");
                    if ($connection) {
                        $connection->set_charset('utf8');
                        mysqli_set_charset($connection,"utf8");
                        $title = $_POST['txttitle'];
                        $fname = $_POST['txtfname'];
                        $lname = $_POST['txtlname'];
                        $email = $_POST['txtemail'];
                        $content = $_POST['txtcontent'];

                        $sql = "INSERT INTO contact_us_table (title,fname,lname,email,content) VALUES ('$title','$fname','$lname','$email','$content')";
                        
                        $result = mysqli_query($connection,$sql);

                        if ($result) {
                            echo "<p class='alert alert-success alert-dismissible fade show'><strong>پیام سیستم</strong> پیام شما با موفقیت ارسال شد <button type='button' class='close' data-dismiss='alert'>&times;</button></p>";
                          }
                          else {
                            echo "<p class='alert alert-danger alert-dismissible fade show'><strong>اخطار</strong> ارسال پیام شما به مشکل برخورد <button type='button' class='close' data-dismiss='alert'>&times;</button></p>";
                          }
                        
                      }
                      else {
                        echo("<p class='alert alert-danger'><strong>خطا</strong> اتصال به پایگاه داده ناموفق بود</p>");
                    }
                    
                }

            ?>
            <p id="test"></p>
            <div class="form-group row">
                <span class="require">* </span>
                <label for="txttitle">عنوان پیام : </label>
                <input class="form-control" type="text" id="txttitle" name="txttitle" required oninvalid="setCustomValidity('عنوان باید وارد شود')">
            </div>

            <div class="form-group row">
                <div class="form-group col-sm-6">
                    <span class="require">* </span>
                    <label for="txtfname">نام : </label>
                    <input class="form-control" type="text" id="txtfname" name="txtfname" required oninvalid="setCustomValidity('نام باید وارد شود')">
                </div>

                <div class="form-group col-sm-6">
                    <label for="txtlname">نام خانوادگی : </label>
                    <input class="form-control" type="text" id="txtlname" name="txtlname">
                </div>
            </div>
           
            <div class="form-group row">
                <span class="require">* </span>
                <label for="txtemail">ایمیل : </label>
                <input class="form-control" type="email" id="txtemail" name="txtemail" required oninvalid="setCustomValidity('ایمیل را صحیح وارد کنید')">
            </div>
            
            <div class="form-group row">
                <label for="txtcontent">متن پیام : </label>
                <textarea class="form-control" name="txtcontent" id="txtcontent"></textarea>
            </div>

            <div class="form-group row">
                <input class="btn btn-primary mr-2" type="submit" name="bbtnsubmit" value="ارسال">
                <input class="btn btn-secondary " type="reset" name="btnsubmit" value="پاکسازی">
            </div>
        </form>
    </main>
    <footer>تمام حقوق نرم افزار تحت مالکیت <strong>فراهنرجو</strong> است</footer>
</body>
<?php include('script.php') ?>
</html>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .row{
            border : 1px solid black;
        }
        .column{
            background-color:rgba(255,0,0,0.2);
        }
        .btn-lg{
            width:6em;
        }
        .qrow{
            display:inline-block;
            border-left: 0.5px solid rgba(0,0,0,0.2) !important;
        }
        hr{
            border-top: 1px solid rgba(0,0,0,0.2) !important;
        }
        .btn-outline-light{
            border: 0px solid rgba(0,0,0,0.2) !important;
            cursor:default !important;
        }
    </style>
    <title>فراهنرجو</title>
    <?php include('php/head.php') ?>
</head>
<body>

<form action="" method="post" class="">
    <section>
    <?php
    $n = 0;
    for ($i=0; $i < 160; $i++) {
        $column = false;
        if($i%10==0)
        {
            echo "<hr>";
        }
        if (($i)%40 == 0 or $i == 0) {
            if ($i > 0) {
                echo ("</div>");
            }
            $column = true;
        }
        if ($column == true) {
            echo ("<div class='col-sm-6 col-lg-4 col-xl-3 qrow' >");
        }
        echo ("<div class='mb-2' >");
        $row = $i+1;
        echo "<p class='btn btn-outline-light text-dark btn-lg'>".$row."- </p>" ;
        for ($j=1; $j <= 4; $j++) { 
            echo ("<a class='btn btn-outline-dark m-2' href=''>$j</a>");
        }
        echo ("</div>");
    }
    echo "<hr></div>";
    ?>
    </section>
    <input type="submit" value="ثبت" class="btn btn-block btn-primary m-3">
</form>

</body>
</html>
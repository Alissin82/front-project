
<?php
    function saveprovince_city($city)
    {
        $path = "js/city.js";
        $myfile = fopen($path, "r") or die("Unable to open file!");

        $city_name = array();
        $city_code = array();

        $city_name_str = "";
        $city_code_str = "";

        
        //پویش کل فایل
        while (!feof($myfile)) {
            
            //ذخیره یک خط
            $line = fgets($myfile);
            //پویش کل خط
            for ($i=0; $i < strlen($line); $i++) {
                //خالی کردن ارایه ها

                //جدا کردن نام شهر
                if ($line[$i] == '(' && $line[$i+1] == "'"){
                    $i++;
                    $city_name_str = "";
                    //تا زمانی که به تک کوتیشن بعدی نرسیدیم این اعمال رو انجام بده
                    while ($line[++$i] != "'") {
                        //ذخیره کاراکتر در ارایه
                        //echo $line[$i];
                        $city_name_str = $city_name_str.$line[$i];
                    }
                    
                }

                //جدا کردن کد شهر
                if ($line[$i] == ' ' && $line[$i+1] == "'"){
                    $i++;
                    $city_code_str = "";
                    //تا زمانی که به تک کوتیشن بعدی نرسیدیم این اعمال رو انجام بده
                    while ($line[++$i] != "'") {
                        //ذخیره کاراکتر در ارایه
                        //echo $line[$i];
                        $city_code_str =  $city_code_str.$line[$i];
                    }
                }
                if ($city_code_str == $city)
                {
                    return $city_name_str;
                }
                
            }                
        }
    }      
?>

<?php
function IsExistNationCode($code,$edit=false,$table)
{
  $connection = connect();

  $field = $table . "_melli_code";
  $sql = "select * from $table where $field='$code'";

  $result = mysqli_query($connection,$sql);

  $true=false;

  if (mysqli_num_rows($result)>0)
  {
    $true=true;
  }
  else
  {
    $true=false;
  }

  if (mysqli_num_rows($result)>0 and $edit==true) {
    $row = mysqli_fetch_assoc($result);
     if ($row['patient_melli_code']==$code) {
       $true=false;
     }
   }

   return $true;
 }
?>

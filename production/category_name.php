<?php
include './class/db_connect.php';

if(isset($_POST['c_name']))
    {
         $q="SELECT * FROM `category_master` WHERE `c_nm` = `'".$_POST["c_name"]."'`";
         $exe= mysqli_query($link, $q);
         while ($row = mysqli_fetch_array($exe)) 
                 {
                        $output = '<option value="'.$row["c_code"].'">'.$row["c_code"].'</option>';
                 }
                 return $outout;
    }
?>
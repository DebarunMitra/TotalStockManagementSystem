<?php
include './class/db_connect.php'; 

if(isset($_POST['update'])){
    $q="UPDATE user_requisition SET mat_maker='".$_POST['up_maker']."',mat_des='".$_POST['up_des']."',mat_qty=".$_POST['up_qty'].",mat_unit='".$_POST['up_unit']."' WHERE rq_sl_no=".$_POST['up_sl_no']."";
    if(mysqli_query($link, $q) or die(mysqli_error($link)))
    {
        echo 1;
    }  
    else {
       echo 2;
    }
}
else{
    echo "ERROR";
}
?>


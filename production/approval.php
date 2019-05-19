<?php

include './class/db_connect.php'; 

//if(isset($_GET['appdept'])){
if($_GET['appdept']!=NULL){
    $q2="UPDATE user_requisition SET hod_deptinc_app=1,hod_dept_date=NOW() WHERE rq_sl_no=".$_GET['appdept']."";
    if(mysqli_query($link, $q2)or die(mysqli_error($link)))
    {
        $_GET['appdept']=NULL;
        echo "HOD APPROVAL TO DEPARTMENT IN CHARGE IS SUCCESSFUL";
    }  
    else {
       echo "FAIL APPROVAL";
       //echo 10;
    }
}
//else if(isset($_GET['appdir'])){
else if($_GET['appdir']!=NULL){
    $q2="UPDATE user_requisition SET hod_dir_app=1,hod_dir_date=NOW() WHERE rq_sl_no=".$_GET['appdir']."";
    if(mysqli_query($link, $q2)or die(mysqli_error($link)))
    {
        $_GET['appdir']=NULL;
        echo "HOD APPROVAL TO THE DIRECTOR SUCCESSFUL";
    }  
    else {
       echo "FAIL APPROVAL";
       //echo 10;
    }
}
    else{
        echo 'ERROR';
    }
    
?>
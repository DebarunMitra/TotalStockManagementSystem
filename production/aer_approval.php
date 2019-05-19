<?php

include './class/db_connect.php'; 

//if(isset($_GET['appstock'])){
/*HOD to DEPT start*/
if($_GET['appstock']!=NULL){
    $q2="UPDATE dept_inc_req SET aer_app=1,aer_app_date=NOW() WHERE rq_sl_no=".$_GET['appstock']."";
    if(mysqli_query($link, $q2)or die(mysqli_error($link)))
    {
        $_GET['appstock']=NULL;
        echo "ACCOUNTS OFFICER TO STOCK ADMIN IS SUCCESSFUL";
    }  
    else {
       echo "FAIL APPROVAL";
       //echo 10;
    }
}
/*HOD to DEPT end*/
/*ACCOUNCE OFFICER to STOCK start*/

/*ACCOUNCE OFFICER to STOCK end*/
//else if(isset($_GET['aer_appdir'])){
else if($_GET['aer_appdir']!=NULL){
    $q2="UPDATE dept_inc_req SET dir_app=1,dir_app_date=NOW() WHERE rq_sl_no=".$_GET['aer_appdir']."";
    if(mysqli_query($link, $q2)or die(mysqli_error($link)))
    {
        $_GET['aer_appdir']=NULL;
        echo "ACCOUNTS OFFICER TO DIRECTOR IS SUCCESSFUL";
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
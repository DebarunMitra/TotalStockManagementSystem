<?php
include 'db_connect.php';
if($_POST['pop']==1){
    if($_POST['email_id']!=''){
    $q=  mysqli_query($link,"SELECT *  FROM `registration`  WHERE `email_id` = '".$_POST['email_id']."' AND `pwd` = '".$_POST['pwd']."'");
    if($r=mysqli_fetch_array($q)){
        $_SESSION['smsreg_id']=$r['reg_id'];
        $_SESSION['smsemp_id']=$r['emp_id'];
        $_SESSION['smsname']=$r['name'];
        $_SESSION['smsdept_sec']=$r['dept_sec'];
        $_SESSION['smsdesg']=$r['desg'];
        $_SESSION['smscontact_no']=$r['contact_no'];
        $loger=1;
       // echo $loger;
    }
    else{
        $loger=2;
       // echo $loger; 
    }
    }
}
?>
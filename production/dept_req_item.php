<?php
include './class/db_connect.php';

$q3=mysqli_query($link,"UPDATE dept_inc_req SET gen_by_app= 1,aer_app=1 WHERE slip_no=".$_SESSION['dept_sr_no']." AND gen_by='". $_SESSION['smsname']."' AND gen_by_dept='".$_SESSION['smsdept_sec']."'") or die(mysqli_error($link));
    $count=0; $opt=$_SESSION['dept_sr_no']+1;
    echo '<center><font color="green">REQUISITION SUCCESSFULLLY</font></center> ||'.$opt;
 $_SESSION['dept_sr_no']='';
?>
<?php
include './class/db_connect.php';

$q3=mysqli_query($link,"UPDATE user_requisition SET gen_by_app= 1 WHERE slip_no=".$_SESSION['sr_no']." AND gen_by='". $_SESSION['smsname']."' AND gen_by_dept='".$_SESSION['smsdept_sec']."'") or die(mysqli_error($link));
//if(isset($q3)){
    $count=0; $opt=$_SESSION['sr_no']+1;
    echo '<center><font color="green">REQUISITION SUCCESSFULLLY</font></center> ||'.$opt;
   // echo '<meta http-equiv="refresh" content="0; url=requisition_1.php" />';
    //echo $serial_no;
//}
 /*else {
    echo $_SESSION['smsreqslno'];
    echo $_SESSION['smsname'];
    echo $_SESSION['smsdept_sec'];  
 }*/
 $_SESSION['sr_no']='';
?>
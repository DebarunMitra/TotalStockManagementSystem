<?php
include './class/db_connect.php'; 
$output='';
if(isset($_GET['slno']))
{
    $query="DELETE FROM user_requisition WHERE rq_sl_no=".$_GET['slno']."";
  mysqli_query($link, $query);
  $_SESSION['rowno']=$_SESSION['rowno']-1;
  echo 'Deleted Successfully';
 }


?>


<?php
include './class/db_connect.php'; 
$output='';
if(isset($_GET['dslno']))
{
    $query="DELETE FROM dept_inc_req WHERE rq_sl_no=".$_GET['dslno']."";
  mysqli_query($link, $query);
  echo 'Deleted Successfully';
 }
?>
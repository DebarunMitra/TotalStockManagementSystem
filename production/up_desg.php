<?php
include './class/db_connect.php';
if($_GET['ueid']!=NULL && $_GET['uedesg']!=NULL){
    $dispq="UPDATE registration SET desg='".$_GET['uedesg']."' WHERE emp_id='".$_GET['ueid']."'";
    if(mysqli_query($link, $dispq) or die(mysqli_error($link)))
    {
        echo '<center><p style="color:green;">Designation Updated Successfully</p><center>';
       // echo $_GET['ddes'];
        $_GET['ueid']=NULL;
        $_GET['uedesg']=NULL;
    } 
}
?>
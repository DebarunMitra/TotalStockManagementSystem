<?php
include './class/db_connect.php';
//$_GET['cc']!=NULL && sc_c_code='".$_GET['cc']."' AND
if($_GET['sc']!=NULL){
    $ch= mysqli_query($link,"SELECT stock FROM subcategory_master WHERE sc_code='".$_GET['sc']."'");  
    while($r=mysqli_fetch_array($ch)){
        echo $r['stock'];
    }
}
?>

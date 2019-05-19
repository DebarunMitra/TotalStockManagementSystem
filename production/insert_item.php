
<?php
include './class/db_connect.php';
//echo $_POST['slip'];
if(isset($_POST['insert']))
{
    $slip= mysqli_real_escape_string($link, $_POST['slip']);
    $gen_by= mysqli_real_escape_string($link, $_POST['gen_by_insert']);
    $gen_by_desg=mysqli_real_escape_string($link, $_POST['gen_by_desg_insert']);
   // $gen_for= mysqli_real_escape_string($link, $_POST['gen_for_insert']);
    $c_name= mysqli_real_escape_string($link, $_POST['c_name']);
    $name= mysqli_real_escape_string($link, $_POST['name']);
    $maker= mysqli_real_escape_string($link, $_POST['maker']);
    $des= mysqli_real_escape_string($link, $_POST['des']);
    $qty= mysqli_real_escape_string($link, $_POST['qty']);
    $unit= mysqli_real_escape_string($link, $_POST['unit']);
    //echo $slip;
    $query="INSERT INTO `user_requisition` (`slip_no`, `gen_by`, `gen_by_dept`,"
            . " `gen_by_desg`,`c_name`, `sc_name`, `mat_maker`,"
            . " `mat_des`, `mat_qty`, `mat_unit`, `gen_by_app`,`gen_date`,`hod_deptinc_app`, `hod_dept_date`,`hod_dir_app`,`hod_dir_date` ) "
            . "VALUES (".$slip.", '".$gen_by."','". $_SESSION['smsdept_sec']."','".$gen_by_desg."', "
            . "'".$c_name."', '".$name."', '".$maker."', '".$des."', "
            . "".$qty.", '".$unit."', 1,NOW(),0,NULL,0,NULL)";

    if(mysqli_query($link, $query)or die(mysqli_error($link)))
    {
        echo 1;
    }  
 else {
       echo 2;
}
}
?>
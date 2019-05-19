<?php
    include './class/db_connect.php';
    $sql="select emp_id from emp_details where emp_id='".$_POST['emp_id']."'";
    $q=mysqli_query($link,$sql);
    $qcount= mysqli_num_rows($q);
    if($qcount!=0)
    {
        echo "Emp already added";    }
    ?>

<?php
include './class/db_connect.php';

$output="";
//echo $_POST['search'];
$q="SELECT sc_name FROM subcategory_master WHERE sc_c_code = '".$_POST['search']."'";
$result=mysqli_query($link,$q);
if(mysqli_num_rows($result)>0){
    $output='<option value="">--select item--</option>';
    while($result=mysqli_fetch_array($result)){
        $output.='<option value="'.$result['sc_name'].'">'.$result['sc_name'].'</option>';
    }
    echo $output;
}
else{
    
    echo 'data not found';
}
?>
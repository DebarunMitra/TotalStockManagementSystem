<?php
include './class/db_connect.php';

$output_item="";
//echo $_POST['search'];
$q="SELECT sc_name FROM subcategory_master WHERE sc_name LIKE '%".$_POST['search_1']."'";
$result=mysqli_query($link,$q);
if(mysqli_num_rows($result)>0){                
    while($r1=mysqli_fetch_array($result)){
     //   $output.='<option value="'.$r1['sc_name'].'">'.$r1['sc_name'].'</option>';
          $output_item = $r1['sc_name'];
    }
    echo $output_item;
}
else{
    
    echo 'data not found';
}
?>
<?php
include './class/db_connect.php';
?>              
<option value="">--Select--</option>
<?php
if($_GET['cat']!=NULL)
    {
$q= mysqli_query($link,"select sc_name from subcategory_master where sc_c_code='".$_GET['cat']."'");
while($r= mysqli_fetch_array($q)){
    ?>
<option value="<?=$r[0]?>"><?=$r[0]?></option>
<?php
}
$_GET['cat']=NULL;
    }
    
  else if($_GET['cata']!=NULL)
    {
        $q= mysqli_query($link,"select sc_code,sc_name from subcategory_master where sc_c_code='".$_GET['cata']."'");
        while($r= mysqli_fetch_array($q)){
        ?>
            <option value="<?=$r['sc_code']?>|<?=$r['sc_name']?>"><?=$r['sc_name']?></option>
        <?php
            }
            $_GET['cata']=NULL;
    }
?>
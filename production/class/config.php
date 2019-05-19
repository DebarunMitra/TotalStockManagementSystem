<?php
include 'db_connect.php';
if($_SESSION['smsreg_id']=='' && strpos($_SERVER['REQUEST_URI'], 'login.php') == false)
    echo '<meta http-equiv="refresh" content="0; url=login.php" />';
elseif($_SESSION['smsreg_id']!='' && strpos($_SERVER['REQUEST_URI'], 'login.php') !== false)
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
?>
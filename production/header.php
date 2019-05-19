<?php
include './class/config.php';//images/favicon.jpg
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <style>
        /*  .new-paw{
             background-image: url('./images/favicon.jpg');
             width: 20%;
             background-repeat: no-repeat;
             padding-left: auto;
          }*/
      </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.jpg" type="image/icon" />

    <title>BIET  </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>
  <script>
      function test()
      {
         // alert("ok");
      }
      </script>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="logout.php" class="site_title"><i class="fa fa-university"></i> <span>B.I.E.T</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                  <img src="images/biet.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span><br/>
                <font color="white"> <?=$_SESSION['smsname'] ?></font>
                
              </div>
            </div>
             <?php
            
            if( $_SESSION['smsdesg']=== "ADMIN"){
                       include './admin_menu.php';
                }
             elseif( $_SESSION['smsdesg']=== "DIRECTOR"){
                       include './director_menu.php';
                }
            elseif( $_SESSION['smsdesg']=== "STOCK_ADMIN"){
                       include './stockadmin_menu.php';
              }
             elseif( $_SESSION['smsdesg']=== "HOD"){
                       include './hod_menu.php';
                }
            elseif( $_SESSION['smsdesg']=== "DEPT_IN_CHARGE"){
                       include './deptincharge_menu.php';
                }
            elseif( $_SESSION['smsdesg']=== "FACULTY"){
                       include './faculty_menu.php';
                }
            elseif( $_SESSION['smsdesg']=== "ACC_EMP" || $_SESSION['smsdesg']=="EXAM_EMP" || $_SESSION['smsdesg']=="REGISTRAR_EMP"){
                       include './aer_menu.php';
                }
           
            elseif( $_SESSION['smsdesg']=== "ACCOUNTS_OFFICER" || $_SESSION['smsdesg']=== "EXAM_HEAD" || $_SESSION['smsdesg']=== "REGISTRAR_HEAD"){
                       include './aer_head_menu.php';
                }
          
            ?>
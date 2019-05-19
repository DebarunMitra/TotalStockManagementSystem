<?php
    include './class/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" href="images/favicon.jpg" type="image/icon" />
     
    <title>BIET | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="login" >
     <!-- <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>-->
      <!--<div>
          <h1><font size="20px"><center> Stock Management System</center></font></h1>
                                  </div>-->
      <div class="login_wrapper">
         
        <div class="animate form login_form">
          <section class="login_content">
                               <?php              
                                    if(isset($_POST['sub'])){
                                        if($_POST['emp_id']!=''){
                                               $q=  mysqli_query($link,"SELECT *  FROM `registration`  WHERE `emp_id` = '".$_POST['emp_id']."' AND `pwd` = '".$_POST['pwd']."'");
                                                if($r=mysqli_fetch_array($q)){
                                                      $_SESSION['smsreg_id']=$r['reg_id'];
                                                      $_SESSION['smsemp_id']=$r['emp_id'];
                                                      $_SESSION['smsname']=$r['name'];
                                                     // $_SESSION['smsemail_id']=$r['email_id'];
                                                      $_SESSION['smsdept_sec']=$r['dept_sec'];
                                                      $_SESSION['smsdesg']=$r['desg'];
                                                      $_SESSION['smscontact_no']=$r['contact_no'];
                                                      //  $loger=1;
                                                       // echo $loger;
                                                            header("location: index.php");
                                                      
                                                }
                                                else{
                                                    //    $l=2;
                                                        //  echo $loger; 
                                                     echo '<center><font color="red">Wrong User Name & Password</font></center>';
                                                    
                                                    
                                                }
                 
                                              }
                                             
                                    }
                                    
                                    if($_SESSION['smsemp_id']!=NULL)
                                              {
                                                  $q1="INSERT INTO `login_details`(`emp_id`, `in_time`, `out_time`) VALUES ('".$_SESSION['smsemp_id']."',now(),NULL)";
                                                  $exe= mysqli_query($link, $q1);
                                             //      $exe= mysqli_query($link,$q) or die(mysqli_error($link));
                                              //      echo '<center><font color="green">Login Successfully.</font></center>';
                                              }
 
                 
                 ?>
              <form id="inv"  method="post" >

              <h1>Login Form</h1>
                 <!--input type="hidden" name="pop" value="1"--->
              <div>
                <input type="text" id="email_id" name="emp_id" class="form-control" placeholder="Employee Id" required="" />
              </div>
              <div>
                <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <!--a class="btn btn-default submit" href="home.php">Log in</a>
                <a class="reset_pass" href="#">Lost your password?</a-->
                <button type="submit" class="btn btn-primary btn-block btn-flat" id="sub" name="sub" >Log In</button>
              </div>
              </form>
              <?php
               
              ?>
          </section>
            <section class="login_content"> 
              <div class="separator">
                <p class="change_link">New to site?
                  <a href="registration.php" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i></i> Stock Management System</h1>
                  <p>©2018 All Rights Reserved. Birbhum Institute of Engineering & Technology  Privacy and Terms</p>
                </div>
              </div>
          </section>
        </div>
      </div>
     
    
      <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--script src="./plugins/jQuery/jquery-2.2.4.js"></script>
    <script src="./js/form/form.js"></script--> 
      
  </body>
</html>

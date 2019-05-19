<?php
   // include './class/config.php';
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

  <body class="login">
    <div>
     <!-- <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>-->

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">

              <h1>Logout Form</h1>
                 
           <center>
               <img src="./images/loading.gif" />
              
                            </center>

              <div class="clearfix"></div>

                          </form>
              <?php
                    if($_SESSION['smsemp_id']!=NULL){
                      
                        $q="UPDATE `login_details` SET `out_time` = NOW() WHERE `emp_id`='".$_SESSION['smsemp_id']."'
                             AND `in_time`IN (SELECT MAX(in_time) FROM (SELECT * FROM `login_details` WHERE `emp_id`='".$_SESSION['smsemp_id']."') AS l2 )
                             AND `out_time` IS NULL ";
                        $exe= mysqli_query($link, $q) or die(mysqli_error($link));
                    }
                        else
                            {
                            echo 'query not execute';
                            }
                        
                        
              ?>
             
          </section>
        </div>
      </div>
    </div>
              <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./plugins/jQuery/jquery-2.2.4.js"></script> 
  </body>
</html>
<?php
session_destroy();
mysqli_close($link);
echo '<meta http-equiv="refresh" content="1; url=login.php" />';
?>

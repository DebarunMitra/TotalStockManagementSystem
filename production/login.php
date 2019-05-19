<?php
    include './class/db_connect.php';
?>
<html>
    <head>
        <title>
            
        </title>
    
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <div class="container">
            <img src="./images/college.jpg" class="bg-image">
            
        </div>
        <div class="loginbox">
            <form method="post">
                <img src="./images/biet.jpg" class="avatar">
                <h1 style="color: #1ABC9C"><br><br>Login here</h1>
           
            <input type="text" name="emp_id" id="emp_id" placeholder="Employee Id">
            <input type="password" name="pwd" id="pwd" placeholder="Password">
            <input type="submit" name="login" value="Login" id="login">
            <center><font color="white">OR<br></center>
            </form>
             <?php              
                                    if(isset($_POST['login'])){
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
            <form action="registration.php"><input type="submit" name="register" value="Register"></form>
            
           <center><p style="font-size:20px">B.I.E.T</p><br><p style="font-size:20px ;color:#1ABC9C;">Stock Management System</p></center>

            
        </div>
        <div class="container">
            <div class="below-center"></div>
        </div>
    </body>
</html>
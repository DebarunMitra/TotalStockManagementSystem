<?php
    include './class/db_connect.php';
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.jpg" type="image/ico" />

    <title>BIET</title>

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
  
  <script type="text/javascript">
      function pass_pattern(pass)
      {
         // alert(pass);
          //var reg=/^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{6,}$           /;
          var reg=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!#$@%&?])[a-zA-Z0-9!#$@%&?]{6,}$/;
          if(reg.test(pass))
          {
              //alert(true);
              return true;
          }
          else
          {
              alert('Atleast 6 Characters and contains one [A-Z],[a-z],[0-9],[!@#$%&*]');
              document.getElementById("pwd").value='';
              //alert(false);
//              return true;
          }
          
      }
      function check_pass()
      {
         // alert('ok');
          var pass=document.getElementById("pwd").value;
          var cpass=document.getElementById("cpwd").value;
            if(pass!=cpass)
            {
                  alert ("Confirm your Password");
                  document.getElementById("cpwd").focus();
            }
       }
              </script>
  <!--script type="text/javascript">
      function id_checker(value)
      {
  onchange="id_checker(this)"
          alert (value);
      }
   </script-->
  <body>
        <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>SIGN UP<small>Stock Management System</small></h3>
                    <!--<ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>-->
                  </div>
                    <div>
                        <p align="right">
                            
                            <a href="login.php"><b>LOGIN</b></a>
                            </p>
                    </div>
                </div>

          <br />
          <form method="post" class="form-horizontal form-label-left">
              <center> 
                  <label class="form-group col-xs-12">Employee Id<span class="required">*</span>
                          <input type="text" name="emp_id_check" id="emp_id_check" value="<?php echo $_POST['emp_id_check']; ?>">
                          <button id="check" name="check"  class="btn btn-primary ">CHECK</button>
                  </label>
              </center>
          </form>    
         <?php
                    if(isset($_POST['check'])){     
                       //  echo $_POST['emp_id'];
         
                        $q="SELECT `emp_name`,`emp_dept`,`emp_desg`,`clg_desg` ,`apr` FROM `emp_details` WHERE `emp_id`='".$_POST['emp_id_check']."'";
                     $exe= mysqli_query($link,$q);
                     if($exe){
                         while($exe= mysqli_fetch_array($exe)){
                             if($exe['apr']==0)
                             {
                                 $name=$exe['emp_name'];
                                $dept=$exe['emp_dept'];
                                    $desg=$exe['emp_desg'];
                                    $cdesg=$exe['clg_desg'];
                                        //$email=$exe['emp_email'];
                             }
                             else
                                 echo '<center><font color="red">Employee already registered!</font></center>';
                        }
                     }
                     else
                     echo '<center><font color="red">Please Re-enter Id!</font></center>';
                }
              ?>
          <script></script>
              
          <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emp_id">Employee Id <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="emp_id" name="emp_id" readonly="" required=""   class="form-control col-md-7 col-xs-12" value="<?php echo $_POST['emp_id_check']; ?>" />
                        </div>
                      </div> 
              
              
              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Full Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name" name="name" readonly="" class="form-control col-md-7 col-xs-12" value="<?php echo $name ; ?>" />                       
                        </div>
                      </div>
               <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"   for="dept_sec">Dept/Section<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="dept_sec" name="dept_sec" readonly="" class="form-control col-md-7 col-xs-12" value="<?php echo $dept ; ?>" />  
                        </div>
               </div>
              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desg">Designation<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="desg" name="desg" readonly="" class="form-control col-md-7 col-xs-12" value="<?php echo $desg ; ?>" />     
                      </div>
              </div>
              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desg">College Designation<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="cdesg" name="cdesg" readonly="" class="form-control col-md-7 col-xs-12" value="<?php echo $cdesg ; ?>" />     
                      </div>
              </div>
               
                      <!--div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_id">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="email_id" name="email_id" readonly="" class="form-control col-md-7 col-xs-12" value="<?php echo $email ; ?>">
                         
                        </div>
                      </div-->
              
              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pwd">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="pwd" name="pwd" placeholder="Atleast 6 Characters and contains one [A-Z],[a-z],[0-9],[!@#$%&*]" required="required" onchange="pass_pattern(this.value)"  class="form-control col-md-7 col-xs-12">
                          
                        </div>
                      </div>
              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpwd"> Confirm Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="cpwd" name="cpwd" required="required" onchange="check_pass()" class="form-control col-md-7 col-xs-12">
                          
                        </div>
                      </div>
              
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact_no">Contact No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" min="000000000000" max="999999999999" id="contact_no" name="contact_no" required=""  class="form-control col-md-7 col-xs-12">
                          
                        </div>
                      </div>
              
              
              
              <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center><button class="btn btn-primary" name="sub" type="submit">Register</button></center>
                          
                        </div>
                      </div>
              
          </form>
          <?php 
                        if(isset($_POST['sub'])){
                          //  if (strpos($_POST['emp_id'], '|') !== false) 
                          // { 
                          //      echo '<center><font color="red"> | character is not allowed.</font></center>';
                            
                         //   if(($_POST['pwd'])==($_POST['cpwd']))
                         //   {
                                $q="INSERT INTO `registration` "
                                        . "(`emp_id`, `name`, `dept_sec`, `desg`, `contact_no`, `pwd`, `reg_date`)"
                                        . " VALUES ('".$_POST['emp_id']."','".$_POST['name']."','".$_POST['dept_sec']."',"
                                        . "'".$_POST['desg']."','".$_POST['contact_no']."',"
                                        . "'".$_POST['pwd']."',CURDATE())";
                                if( $exe= mysqli_query($link,$q)){
                                $upapr= mysqli_query($link,"UPDATE emp_details SET apr=1 WHERE emp_id='".$_POST['emp_id']."'");
                                echo '<center><font color="green">Data Saved Successfully.</font></center>';
                                }
                                else 
                                {
                                   echo '<center><font color="red"> DATA NOT SAVED.</font></center>';
                                   die(mysqli_error($link));
                                   
                                }
                            }
    
                      //  }
                        
                    
         ?>
        
              <script>
              if ( window.history.replaceState ) {
                          window.history.replaceState( null, null, window.location.href );
                         } 
              </script>
          <?php include './footer.php';?>
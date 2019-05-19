<?php
include './header.php';
include './class/db_connect.php';
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form advanced</h3>
              </div>

             
            

            <div class="clearfix"></div>

             <div class="row">
                 <div id="profile">
              <!-- form input mask -->
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input Mask</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method="post" id="demo-form1"  class="form-horizontal form-label-left">
                    
                     <div class="col-md-4 col-sm-4 col-xs-12 profile_right pull-left">
                        <div id="crop-avatar">
                            <img  src="images/user_1.png">
                        </div>
                     </div>
                    
                     <div class="col-md-3 col-sm-3 col-xs-12 profile_right ">
                         <h3><?php echo $_SESSION['smsname']; ?></h3>
                         <h6><?php echo $_SESSION['smsemp_id']; ?></h6>
                         <?php
                                   
                                $q1= mysqli_query($link,"select contact_no from registration where emp_id='".$_SESSION['smsemp_id']."'");
                                while($r1= mysqli_fetch_array($q1)){
                               $cno=$r1['contact_no'];
                                }
                          ?>
                         <ul class="list-unstyled user_data">
                        <li><i class="fa fa-briefcase user-profile-icon"></i> <?php echo $_SESSION['smsdesg']; ?>
                        </li>

                        <li>
                          <i class="glyphicon glyphicon-home"></i> <?php echo $_SESSION['smsdept_sec']; ?>
                        </li>
                        <li>
                          <i class="fa fa-envelope"></i> <?php echo $_SESSION['smsemail_id']; ?>
                        </li>
                       <li>
                            
                          <i class="fa fa-phone-square"></i> <?php echo $cno; ?>
                        </li>
                        </ul>
                     </div>
                    </form>
                    <center> <button type="submit" class="btn btn-info" onclick="item_view()">Edit Profile</button></center> 
                  </div>
                </div>
              </div>
              <!-- /form input mask -->
               
              <!-- form color picker -->
              
                                    
                      
                     <form method="post" id="demo-form2"  class="form-horizontal form-label-left">
                         <div class="col-md-6 col-sm-6 col-xs-12">
                         
                             <center><div id="result" style="color:green;"></div>
                          <div id="result_test" style="color:green;">
                          </div></center>
                      
                      <!--input type="text" id="sdata" name="sdata" value="" onchange="svalue(this.value)"/-->
                        <center>
                             <div id="load" style="display: none;"><img src="./images/uploading.gif">
                                 <br>
                             </div>
                         </center>
                        <div id="myDiv" style="display: none">
                            <div class="x_panel">
                      <div class="x_title">
                    <h2>Update User Details </h2>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                        <div class="form-responsive" id="ajax_load_form">
                            <p id="del_msg" style="color:green;"></p>
                      <!--table class="table table-striped jambo_table" id="req_table_list"-->
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="npwd"> New Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="npwd" name="npwd"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                          
              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpwd"> Confirm Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="cpwd" name="cpwd" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
              
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact_no">Contact No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="contact_no" name="contact_no" onclick="check_pass()" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
              
              <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center><button class="btn btn-primary" name="sub" type="submit">Update</button></center>
                        </div>
                      </div>
              
                       <?php
                       if(isset($_POST['sub']))
                        {
                            $sql.="UPDATE registration set ";
                            if($_POST['npwd']!="")
                                $sql .="pwd='".$_POST['npwd']."' ";
                            if($_POST['npwd']!="" and $_POST['contact_no']!="")
                                $sql.=",";
                            if($_POST['contact_no']!="")
                                $sql.=" contact_no='".$_POST['contact_no']."'";
                            $sql.="where emp_id='".$_SESSION['smsemp_id']."'";
                            $query=mysqli_query($link,$sql);
                           // echo $sql;
                            
                        }
                  
                    
                    ?>
                        
                     
                    </div>
                    </div>
                  
                      
                  </div>
          
                    </form>
                  
              </div>
              <!-- /form color picker -->

              


             </div>
            </div>

                
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <script src="js/jquery.min.js"></script>
          <link href="select2-3.5.3/select2.css" rel="stylesheet" />
    <script src="select2-3.5.3/select2.js"></script>
     <script src="js/jquery.form.js"></script> 
<script type="text/javascript">
                  function check_pass(){
                      $npass=document.getElementById("npwd").value;
                      $cpass=document.getElementById("cpwd").value;
                      if($npass != $cpass){
                          alert ("Confirm your Password");
                          document.getElementById("cpwd").focus();
                      }
                  }
                  
              
                    function item_view()
                    {
                        var disp = document.getElementById("myDiv");
                        //alert('ok'); 
                        if(disp.style.display=='none')
                            {
                                //alert("block");
                                disp.style.display='block';
                            }
                            else
                            {
                              //  alert("none");
                                disp.style.display='none';
                            }     
                    }
                    
                   
                        
                        
                    
                
                 
             
    </script>  
        <!-- footer content -->
        <?php include './footer.php';
        ?>

   

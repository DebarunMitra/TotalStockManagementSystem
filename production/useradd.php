<?php
include './header.php';
include './class/db_connect.php';

?>
<script>
    function specialch(ch)
                         {
                             //alert("yes");
                             var l=/[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
                             var n=/^[0-9]$/;
                                     ///\W|_/g;
                             if(ch.match(l) || ch.match(n))
                             {
                                 alert("ONLY ALPHABETS ARE ALLOWED!");
                                 document.getElementById('demo-form2').reset();
                             }
                             else
                                 return true;
                         }
</script>
        <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <!--div class="row x_title">
                  
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel"-->
                  <div class="row x_title">
                       <div class="col-md-6">
                    <h2>ADD USER DETAILS <small>Stock Management System</small></h2>
                    <!--ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                      </li>
                    </ul-->
                     </div>
                  </div>
                  
                    <form method="post" id="demo-form2"  class="form-horizontal form-label-left">
          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emp_id">Employee Id <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="emp_id" id="emp_id" required="" class="form-control" >
                           
                      </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emp_name">Employee Name <span class="required">*</span>
                        </label>
                        <div   class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text"  id="emp_name" name="emp_name" required="" class="form-control" onkeyup="specialch(this.value)" placeholder="Only alphabets are allowed">
                            </div>
                      </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emp_dept">Employee Department: <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select required="" id="emp_dept" name="emp_dept" class="select2_single form-control" tabindex="-1">
                            <option value="">Choose Department</option>
                            <option value="ACC-SECTION">Account section</option>
                            <option value="EXAM-CELL">Examination Cell</option>
                            <option value="REGISTRAR">Director/Registrar Office</option>
                            <option value="MEDICAL">Medical Unit</option>
                            <!--<option value="DRO">Director/RegistRar Office</option>-->
                            <option value="EE">Electrical Engineering Department</option>
                            <option value="ECE">Electronics Engineering Department</option>
                            <option value="CE">Civil Engineering Department</option>
                            <option value="CSE">Computer Science & Engineering Department</option>
                            <option value="IT">Information Technology Department</option>
                            <option value="ME">Mechanical Engineering Department</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emp_desg">Employee Designation: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="" id="clg_desg" name="clg_desg" class="select2_single form-control" tabindex="-1">
                            <option value="">Choose Designation</option>
                             <option value="ACCOUNTANT">Accountant</option>
                            <option value="ASST.PROF">Assistant Professor</option>
                            <option value="ASST.LIBRARIAN">Assistant Librarian</option>
                             <option value="ASSO.PROF">Associate Professor</option>
                             <option value="CASHIER">Cashier</option>
                            <option value="DIRECTOR">Director</option>
                            <option value="HEAD-ASST">Head Assistant</option>
                            <option value="LAB.ATTENDANT">Lab Attendant</option>
                            <option value="LIB.ATTENDANT">Library Attendant</option>
                            <option value="SAE-CE">SAE-CE</option>
                            <option value="SENIOR-TPO">Senior TPO</option>
                            <option value="STENO-TYPIST">Steno Typist</option>
                            <option value="TECH.ASST">Technical Assistant</option>
                            <option value="TECHNICIAN">Technician</option>
                            <option value="ATTENDANT">Attendant</option>
                            <option value="CARE-TAKER">Care Taker</option>
                            <option value="WARDEN">Warden</option>
                            </select>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emp_desg">System Designation: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <select required="" id="emp_desg" name="emp_desg" class="select2_single form-control" tabindex="-1">
                            <option value="">Choose System Designation</option>
                            
                            <option value="ADMIN">ADMIN</option>
                                                   <option value="DIRECTOR">Director/Registar</option>
                                                    <option value="STOCK_ADMIN">Stock Admin</option> 
                                                      <option value="HOD">Head of the Department</option> 
                                                   <option value="DEPT_IN_CHARGE">Department Incharge</option> 
                                                   <option value="FACULTY">Faculty</option> 
                                                   <option value="ACC_EMP">Account Cell Employee</option>
                                                    <option value="ACCOUNTS_OFFICER">Accounts OFFICER</option> 
                                                   <option value="EXAM_EMP">Exam Cell Employee</option>
                                                   <option value="EXAM_HEAD">Exam Cell Head</option>
                                                    <option value="REGISTAR_EMP">Registar Cell Employee</option>
                                                   <option value="REGISTAR_HEAD">Registar Cell Head</option>
                            
                            </select>
                        </div>
                      </div>
                      <!--div class="form-group">
                        <label for="emp_email" class="control-label col-md-3 col-sm-3 col-xs-12">Employee Email Id:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" id="emp_email" name="emp_email" required="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div-->
                        <center>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="submit" id="emp_save" name="sub" value="SAVE" class="btn btn-primary">
                        </div>
                      </div>
                        </center>
                    </form>
                     <?php
                        if(isset($_POST['sub'])){
                          
                                $qemp_id="SELECT * FROM emp_details where emp_id='".$_POST['emp_id']."'";
                           // $qemail_id="SELECT * FROM emp_details where emp_email='".$_POST['emp_email']."'";
                            $query1=mysqli_query($link,$qemp_id);
                            //$query2=mysqli_query($link,$qemail_id);
                            $q_idcount=mysqli_num_rows($query1);
                            //$q_mailcount=mysqli_num_rows($query2);
                            if($q_idcount>0 )
                                echo '<center><font color="red">Id </font></center>';
                           
                            else  {
                                
                                $q="INSERT INTO `emp_details` (`emp_id`, `emp_name`, `emp_dept`,`emp_desg`,`clg_desg`) "
                                    . "VALUES ('".$_POST['emp_id']."','".$_POST['emp_name']."','".$_POST['emp_dept']."','".$_POST['emp_desg']."','".$_POST['clg_desg']."')";
                            $exe= mysqli_query($link,$q) or die(mysqli_error($link));
                            echo '<center><font color="green">Data Saved Successfully.</font></center>';
                            //echo '<meta http-equiv="refresh" content="0; url=useradd.php" />';
                            }
                            
                            }
                            
                       
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- end form -->
              </div>
           <script>
                if ( window.history.replaceState ) {
                          window.history.replaceState( null, null, window.location.href );
                         }
           </script>
                 <!-- /page content -->
<?php
    include './footer.php';
?>
   
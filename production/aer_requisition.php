<!DOCTYPE html>
<?php
    include './header.php';
include './class/db_connect.php';
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>REQUISITION SLIP<small>Stock Management System</small></h3>
              </div>

              

            <div class="clearfix"></div>

            <div class="row">
                       
            <?php
            
                        $logtime=mysqli_query($link,"select in_time,out_time  from login_details where in_time IN (select max(in_time) from (SELECT * FROM `login_details`) AS l2) AND email_id='".$_SESSION['smsemail_id']."'");
                                  /*$slno="select max(slip_no) as slip_no,max(gen_date) as gen_date from user_requisition";// where gen_by = '".$_SESSION['smsname']."' */
                        
                             while($log=mysqli_fetch_array($logtime)){
                                 $login_time=$log['in_time'];
                                 $logout_time=$log['out_time'];
                             }
                             if($_SESSION['dept_sr_no']==''){
                          $slno="select max(slip_no) as slip_no from dept_inc_req";// where gen_by = '".$_SESSION['smsname']."' 
                      $execute= mysqli_query($link, $slno);      
                       $res=mysqli_fetch_array($execute);
                       $serial_no = $res['slip_no'];
                                 $serial_no++;
                            //{
                             /*if(($res['gen_date'] < $login_time && $logout_time== NULL) || $res['slip_no'] == NULL ){
                                 $serial_no = $res['slip_no'];
                                 $serial_no ++;
                                // echo $serial_no;
                             }
                             else{
                                 $serial_no = $res['slip_no'];
                                 $_SESSION['smsreqsl_no'] = $serial_no;
                                 
                             }*/
                            }
                            else{
                               $serial_no=$_SESSION['dept_sr_no'];
                            }
                            
                             
                             /*$res=mysqli_fetch_array($execute);
                  $serial_no = $res['slip_no']+1; echo  $serial_no;    */              ?>
                
                
                <!--gen-for-form-start-->
                <!--div class="x_title">
                    <h2>Reuisition For Form <small>submit to see form</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Slip No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="slip_gf" name="slip_gf" readonly=" " class="form-control col-md-7 col-xs-12" value="<?= $serial_no ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="generated_for">Generated For<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="generated_for" name="generated_for"  value="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Generated For Designation</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           
                          <select class="select2_single form-control" tabindex="-1" name="gen_for_desg" id="gen_for_desg">
                            <option>--Select--</option>
                            <option value="HOD">HOD</option>
                            <option value="FAC">Faculty</option>
                            <option value="ACC">Accountant</option>
                            <option value="LA">Lab Assistant</option>
                            </select>                        
                       
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      
                    </form> 
                  <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center> <button type="button" class="btn btn-info" onclick="view_slip_form()">View Slip</button></center> 
                        </div>
                      </div-->
                  <div id="result" style="color:green;">
                          
                      </div>
                <!--gen-for-form-start-->
            
                <div id="slip_form">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2>ADD YOUR REQUIRED ITEM:<small>Slip No:<input type="number" min="0" max="10000" id="slip_no" name="slip_no" readonly="" value="<?php echo $serial_no; ?>"/></small></h2>
                      <!--ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                          </ul-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     

                      <form id="demo-form2" method='post' data-parsley-validate class="form-horizontal form-label-left">
                          <input type="hidden" id="slip_no1" name="dslno" value="<?php echo $serial_no; ?>"/>
                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dgen_by">Requisition generated By <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="dgen_by" id="dgen_by" readonly="" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $_SESSION['smsname']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dgen_by_desg">His/Her designation <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="dgen_by_desg" name="dgen_by_desg" readonly="" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $_SESSION['smsdesg']; ?>">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dgen_by_dept">Department <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="dgen_by_desg" name="dgen_by_dept" readonly="" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $_SESSION['smsdept_sec']; ?>">
                        </div>
                      </div>
                      <!--<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gen_for">His/Her Department <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="gen_for" name="gen_for" required="required" class="form-control col-md-7 col-xs-12">
                          <select id="emp_dept" name="gen_by_dept" class="select2_single form-control" tabindex="-1">
                            <option>Choose Department</option>
                            <option value="AS">Account section</option>
                            <option value="EC">Examination Cell</option>
                            <option value="MU">Medical Unit</option>
                            <option value="EE">Electrical Engineering Department</option>
                            <option value="ECE">Electronics Engineering Department</option>
                            <option value="CE">Civil Engineering Department</option>
                            <option value="CSE">Computer Science & Engineering Department</option>
                            <option value="ME">Mechanical Engineering Department</option>
                            </select>
                        </div>
                      </div>-->
                      <!--div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gen_for_desg">His/Her Designation<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input id="generated_for_desg" class="form-control col-md-7 col-xs-12" value="" type="text" name="generated_for_desg">
                          <!--select class="select2_single form-control" tabindex="-1" name="gen_for_desg" id="gen_for_desg">
                            <option>--Select--</option>
                            <option value="HOD">HOD</option>
                            <option value="FAC">Faculty</option>
                            <option value="ACC">Accountant</option>
                            <option value="LA">Lab Assistant</option>
                            </select>                        
                        </div>
                      </div-->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Choose Category<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="hidden" name="dc_code" id="dc_code" class="form-control">
                            <select required="" name="c_name_db" id="c_name_db" class="select2_single form-control" onclick="set_value(this.value)">
                             <option value="">--Select--</option>
                             <?php
                                    //echo category_name($link)
                              $q1= mysqli_query($link,"select c_name,c_code from category_master");
                               
                                while($r1= mysqli_fetch_array($q1)){
                                ?>
                                <option value="<?=$r1['c_name'].'|'.$r1['c_code']?>"><?=$r1['c_name']?></option>
                                <?php
                                }
                                ?>
                          </select>
                        </div>
                      </div>
                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Search Item<span class="required">*</span></label>
                        <div id=""  class="col-md-9 col-sm-9 col-xs-12">
                            <!--input type="text" name="search" id="search" class="form-control"-->
                        <select id="search_item" name="search_item" class="select2_single form-control" onclick="set_item(this.value)">
                            <!--option value="">--select item--</option-->
                            
                        </select>
                      </div>
                          </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Item name<span class="required">*</span></label>
                        <div id="i_name_div"  class="col-md-9 col-sm-9 col-xs-12">
                            <input type="hidden" name="di_code" id="di_code" readonly="" class="form-control">
                            <input type="text" name="di_name" id="di_name" readonly="" class="form-control">
                        </div>
                        </div>
                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dmat_maker">Brand/Maker name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="dmat_maker" name="dmat_maker"  class="form-control col-md-7 col-xs-12" onkeyup="specialch(this.value)" placeholder="Only alphabets and numbers allowed">
                        </div>
                      </div>
                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dmat_des">Description<span clas="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text"  id="dmat_des" name="dmat_des"  required="" class="form-control col-md-7 col-xs-12" onkeyup="specialch(this.value)" placeholder="Only alphabets and numbers allowed">
                        </div>
                          </div>
                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dmat_qty">Quantity<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="number"  min="1" id="dmat_qty" name="dmat_qty" required="" class="form-control col-md-7 col-xs-12">
                        </div>
                              <!--<div class="form-group">-->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dmat_unit">Unit<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <select required="" id="dmat_unit" name="dmat_unit" required="" class="select2_single form-control" tabindex="-1">
                             <option value="">--Select--</option>
                            <option value="lit">lit</option>
                            <option value="ml">ml</option>
                            <option value="kg">kg</option>
                            <option value="gm">gm</option>
                            <option value="meter">meter</option>
                            <option value="foot">foot</option>
                            <option value="pices">pices</option>
                            <option value="coil">coil</option>
                            <option value="rim">rim</option>
                            <option value="pkt">pkt</option>
                            </select>
                        </div>
                          <!--</div>-->
                          </div>
                          
                          
                          
                          <div class="ln_solid"></div>
                          <div class="clearfix">
                              <center><button type="submit" name='add' id='add' class="btn btn-success">Add</button>
                      <button type="submit" name='' class="btn btn-success">Reset</button></center>
                        </div>
                      

                    </form>
                      
                      <?php
                      if(isset($_POST['add'])){
                          if($_POST['c_name_db']==NULL || $_POST['search_item']==NULL || $_POST['di_name']==NULL || $_POST['dmat_unit']==NULL)
                          { 
                              $m="Please Fill out all star marked fields";
                    echo "<script type='text/javascript'>alert('$m');</script>";
                          }
                           
                       else {
                          $query="INSERT INTO `dept_inc_req`(`slip_no`, `gen_by`,`gen_by_desg` ,`gen_by_dept`,`c_code`,`sc_code` ,`sc_name`, `mat_maker`,`mat_des`, `mat_qty`, `mat_unit`,`gen_date`)"
                                . " VALUES ('".$_POST['dslno']."','".$_SESSION['smsname']."','".$_SESSION['smsdesg']."','".$_SESSION['smsdept_sec']."','".$_POST['dc_code']."','".$_POST['di_code']."','".$_POST['di_name']."','".$_POST['dmat_maker']."','".$_POST['dmat_des']."',".$_POST['dmat_qty'].",'".$_POST['dmat_unit']."',now())";                 
                         $exe= mysqli_query($link,$query) or die(mysqli_error($link));
                         $_SESSION['dept_sr_no']=$serial_no;
                         echo '<meta http-equiv="refresh" content="0; url=aer_requisition.php" />'; 
                       }  
                        
                      }
                      ?>
                  </div>
                </div>
              </div>

                
                 <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2>Your Order Details: <small>Slip No:<input type="number" min="0" max="10000" id="slip_no_table" name="slip_no_table" readonly="" value="<?php echo $serial_no; ?>"/></small></h2>      
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                                          </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id='item_table' class="table table-bordered">
                      <thead>
                        <tr>
                          <th>SlNo</th>
                          <th>Item Name</th>
                          <th>Quantity</th>
                          <th>Unit</th>
                          <th>Description</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $count=0;
                             $q2="SELECT rq_sl_no,slip_no,sc_name,mat_des,mat_qty,mat_unit,gen_date FROM dept_inc_req WHERE slip_no=".$serial_no."";
                             $e2= mysqli_query($link, $q2);
                            
                             while($r2=mysqli_fetch_array($e2)){
                                 if($r2['slip_no'] == $_SESSION['dept_sr_no'])
                                 {
                                   $count +=1;
                                 ?>                     
                         
                        <tr id="tr_<?=$count?>">
                            <td><?= $count ?></td>
                          <td><?=$r2['sc_name'] ?></td>
                          <td><?=$r2['mat_qty'] ?></td>
                         <td><?=$r2['mat_unit']?></td>
                         <td><?=$r2['mat_des']?></td>   
                         <td><button type="button" id="<?=$r2['rq_sl_no']?>"  class="btn btn-danger btn-xs" name="delete" value="" onclick="if(confirm('Delete Confirm??')){$('#tr_'+<?=$count?>).remove();$('#delmsg').load('dept_req_delete.php?dslno=<?=$r2['rq_sl_no']?>')}" >Delete</button></td>
                        </tr>
                        <?php
                                 }
                             }
                        ?>
                        
                      </tbody>
                    </table>
                      <p id="delmsg" style="color:green;"></p>
                      <div id="result">
                          <?php
                          if($count>0)
                          {  
                            $button= "<center><button type=".'submit'." name=".'submit'." id=".'submit'." onclick=".'sub()'."  class=".'btn btn-success'.">SUBMIT</button></center>";
                          
                            echo $button;
                          }?>
                      </div>
                  </div>
                </div>
              </div>
                    </div>
                
                <div class="clearfix"></div>
                    
            </div>
                </div>
              </div>
            </div>
        <!-- /page content -->
                <script src="./plugins/jQuery/jquery-2.2.4.min.js"></script>
        <script>
               /*function view_slip_form()
                    {
                        var disp = document.getElementById("slip_form");
                       // alert(disp); 
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
                    }*/
                        
                            function delvalue(val){
                                var v=val.split('||');
                                document.getElementById('deltr').value=v[0];
                                document.getElementById('del').value=v[1];
                            }
                            
    
    
                           function set_value(value){
                           var actval=value.split('|');
                           //document.getElementById('dc_name').value=actval[0];
                           document.getElementById('dc_code').value=actval[1];
                          
                           $('#search_item').load('ajax_item_list.php?cata='+actval[1]);
                        }
                                      
                         function set_item(value){
                             var search=value.split('|');
                             //var search=value;
                             document.getElementById('di_code').value=search[0];
                             document.getElementById('di_name').value=search[1];
                         }
                         function specialch(ch)
                         {
                             //alert("yes");
                             var l=/[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
                                     ///\W|_/g;
                             if(ch.match(l))
                             {
                                 alert("ONLY ALPHABETS ARE ALLOWED!");
                                 document.getElementById('demo-form2').reset();
                             }
                             else
                                 return true;
                         }
                         
                         $(document).ready(function(){
                             $('#submit').click(function(e){
                                 var action="";
                                 $.ajax({
                                     url:"aer_req_item.php",
                                     method:"POST",
                                     data:{action:action},
                                     success:function(data){
                                  //  alert(data);
                                    //alert (data[0]);
                                         var split=data.split('||');
                                       $('#slip_no').val(split[1]);
                                       $('#slip_no1').val(split[1]);
                                         $('#slip_no_table').val(split[1]);
                                         $('#c_name_db').val('');
                                         
                                         $('#item_table').remove();
                                         $('#result').html(split[0]);
                                        //  $('#sl').val('');
                                        // $('#result').html(<meta http-equiv="refresh" content="0; url=requisition_1.php" />);
                                     }
                                 });
                             });
                         });
                         
                         
                        </script>  
                  
  <link href="select2-3.5.3/select2.css" rel="stylesheet" />
    <script src="select2-3.5.3/select2.js"></script>
    <script>
    $(document).ready(function() {
  $("#search_item").select2();
});
    </script>
    
                  
     <!-- footer content -->
        <footer>
          <div class="pull-right">
            BIET - Stock Management System <a href="#"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
  </body>
</html>
    <?php
            //include './footer.php';
        ?>

    
      
    
<?php
include './header.php';
include './class/db_connect.php'; 
?>
    <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Requisition Request<small>request </small></h3>
                  </div>
                 <div class="col-md-6">
                  </div>
                </div>
                  <?php
                //echo $_GET['slipno'];
                    $sd= mysqli_query($link, "SELECT rq_sl_no,gen_by,gen_by_desg FROM user_requisition WHERE slip_no=".$_GET['slipno']."");
                    $num_item= mysqli_num_rows($sd);
                   // echo $num_item;
                    $exe_sd= mysqli_fetch_array($sd);
                    $_GET['gen_by']=$exe_sd['gen_by'];
                    //$_GET['gen_for']=$exe_sd['gen_for'];
                    $_GET['gen_by_desg']=$exe_sd['gen_by_desg'];
                    $s=$_GET['slipno'];
                   // echo $s;
                  ?>
                  <div class="x_title">
                    <h2>Slip Design <small>submit to see more details</small></h2>
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
                            <input type="text" id="slip_no" name="slip_no" readonly=" " class="form-control col-md-7 col-xs-12" value="<?= $_GET['slipno']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="generated_by">Generated By<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="generated by" name="generated_by" readonly="" value="<?=$exe_sd['gen_by']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="generated_for" class="control-label col-md-3 col-sm-3 col-xs-12">Generated By Designation:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="generated_for" class="form-control col-md-7 col-xs-12" readonly="" value="<?=$_GET['gen_by_desg']?>" type="text" name="generated_for">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      
                    </form> 
                  <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!--button class="btn btn-primary" type="button">Cancel</button-->
						  <!--button class="btn btn-primary" type="reset">Reset</buttonif($('#myDiv').hide()===true){$('#myDiv').show();}else{$('#myDiv').hide();}-->
                   <center> <button type="submit" class="btn btn-info" onclick="item_view()">View Items</button></center> 
                        </div>
                      </div><br/><br/><br/> 
                      <center><div id="result" style="color:green;">
                          <div id="result_test" style="color:green;">
                          </div></center>
                      
                      <!--input type="text" id="sdata" name="sdata" value="" onchange="svalue(this.value)"/-->
                        <center>
                             <div id="load" style="display: none;"><img src="./images/uploading.gif">
                                 <br>
                             </div>
                         </center>
                        <div id="myDiv" style="display: none">
                      <div class="x_title"><br><br>
                    <h2>Table design <small>Custom design</small></h2>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                        <div class="table-responsive" id="ajax_load_table">
                            <p id="del_msg" style="color:green;"></p>
                      <table class="table table-striped jambo_table" id="req_table_list">
                        <thead>
                          <tr class="headings">
                            <th>
                                Select <input type="checkbox" id="check-all"  />
                            </th>
                            <!--th></th-->
                            <th class="column-title">Serial No </th>
                            <th class="column-title">Item Name </th>
                            <th class="column-title">Item Maker </th>
                            <th class="column-title">Description </th>
                            <th class="column-title">Quantity </th>
                            <th class="column-title">Unit </th>
                            <th class="column-title">Update</th>
                            <th class="column-title">Delete </th>
                            
                          </tr>
                        </thead>

                        <tbody>
                            <?php
                            if($num_item>0)
                            {
                                $items= mysqli_query($link,"SELECT rq_sl_no,sc_name,mat_maker,mat_des,mat_qty,mat_unit,hod_deptinc_app,hod_dir_app FROM user_requisition WHERE slip_no='".$_GET['slipno']."' AND hod_deptinc_app=0 AND hod_dir_app=0");
                                $count=1;
                                while($exe_sd = mysqli_fetch_array($items)) {
                                    //if(($exe_sd['hod_deptinc_app']==0)&&($exe_sd['hod_dir_app']==0))
                                    //{
                                       ?>
                                    <tr id="even_<?=$count?>" class="even pointer">
                                   <td class="a-center "><input type="checkbox"  id="table_records_<?=$count?>" name="table_records" value="even_<?=$count?>||<?=$exe_sd['rq_sl_no']?>"></td>
                                
                                                 <td><?=$count?></td>
                                                 <td><?=$exe_sd['sc_name']?></td>
                                                 <td><?=$exe_sd['mat_maker']?> </td>
                                                 <td><?=$exe_sd['mat_des']?></td>
                                                 <td><?=$exe_sd['mat_qty']?></td>
                                                 <td><?=$exe_sd['mat_unit']?></td>
                                                 <td><button type="button" id="<?=$exe_sd['rq_sl_no']?>"  class="btn btn-success btn-xs update" name="update" value="<?=$exe_sd['rq_sl_no']?>||<?=$exe_sd['sc_name']?>||<?=$exe_sd['mat_maker']?>||<?=$exe_sd['mat_des']?>||<?=$exe_sd['mat_qty']?>||<?=$exe_sd['mat_unit']?>" onclick="updateitem(this.value)" data-toggle="modal"   data-target="#dataModal_update">Update</button></td>   
                                                 <td> <input type="button" class="btn btn-danger btn-xs delete" id="<?=$exe_sd['rq_sl_no']?>" name="delete"  value="Delete" onclick="if(confirm('Delete Confirm ??')){$('#del_msg').load('delete_item.php?slno=<?=$exe_sd['rq_sl_no']?>');$('#even_'+<?=$count?>).remove();}" /></td>    
                          
                                            </tr>
                                      <?php
                                       $count++;
                                  }
                               }
                                       $rowno=$count-1;
                           // }
                            ?>

                        </tbody>
                      </table>
                    </div>
                    </div>
                  
                      <div class="x_content">
                          <div>
                              <center>
                                  <button type="button" class="btn btn-warning" id="dept_inc" name="dept_inc" >To Department In Charge</button>
                                  <button type="button" class="btn btn-primary" id="add_item" name="add_item" data-toggle="modal"   data-target="#dataModal">Add Item</button>
                                <button type="button" class="btn btn-warning" id="dir" name="dir" >To Director</button>
                                  <!--button type="button" class="btn btn-success"  id="req_app" name="req_app" onclick="$('#result').load('update_item.php?appslip=<?=$_GET['slipno']?>');$('#myDiv').hide(300);$('#req_app').hide();">Approve</button-->
                              </center>
                          </div>
                      </div>
                  </div>
              
              </div>
            </div>
          </div>
        </div>

          
          
          <!--bootstrap model start-->
          <div id="dataModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"> Slip Details</h4>
                  </div>
                  <div class="modal-body" id="slip_details" >
                      <form method="post" id="inv" action="insert_item.php">
                      <!--form method="post" id="insert_form"-->
                          <label>Slip No:</label>
                          <input type="text" name="slip" id="slip" class="form-control" readonly="" value="<?=$_GET['slipno']?>"/>
                          <input type="hidden" name="gen_by_insert" id="gen_by_insert" class="form-control" value="<?=$_GET['gen_by']?>" />
                          <input type="hidden" name="gen_by_desg_insert" id="gen_by_desg_insert" class="form-control" value="<?=$_GET['gen_by_desg']?>" />
                          <!--input type="hidden" name="gen_for_insert" id="gen_for_insert" class="form-control" value="<?=$_GET['gen_for']?>" /-->                          
                           <label>Choose Category</label>
                          <input type="hidden" name="c_name" id="c_name" class="form-control" />
                          <select name="c_name_db" id="c_name_db" class="select2_single form-control" onclick="set_value(this.value)" >
                             <option>--Select--</option>
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
                         <label>Search Item</label>
                        <select id="search_item" name="search_item" class="select2_single form-control" onclick="set_item(this.value)">
                            <!--option value="">--select item--</option-->
                            
                        </select>
                          <label>Item Name:</label>
                          <input type="text" name="name" id="name" class="form-control" required="" /><br />
                          <label>Item Maker:</label>
                          <input type="text" name="maker" id="maker" class="form-control" required="" /><br />
                          <label>Item Description:</label>
                          <input type="text" name="des" id="des" class="form-control"required="" /><br />
                          <label>Item Quantity:</label>
                          <input type="text" name="qty" required="" id="qty" class="form-control" /><br />
                          <label> Unit:</label>
                           <select id="unit" name="unit" class="select2_single form-control" tabindex="-1">
                             <option>--Select--</option>
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
                            <input type="hidden" name="sl_no" id="sl_no" class="form-control" readonly="" value=""/>
                      <br>
                            <center> <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" /> </center><br />
                      <br>
                          <center><div id="loading2" style="display: none;"><img src="./images/uploading.gif"><br></div>
                          <div id="invPre"></div></center>
                      </form>
                   </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                  </div>
              </div>
          </div>
          </div>
          
          
          <div id="dataModal_update" class="modal fade" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update Slip Details</h4>
                  </div>
                  <div class="modal-body" id="slip_details" >
                      <form method="post" id="update_form" action="update_item.php">
                      <!--form method="post" id="insert_form"-->
                      <input type="hidden" name="up_sl_no" id="up_sl_no" class="form-control" readonly="" value=""/>
                          <label>Slip No:</label>
                          <input type="text" name="slip" id="slip" class="form-control" readonly="" value="<?=$_GET['slipno']?>"/> 
                          <label>Item Name:</label>
                          <input type="text" name="up_name" id="up_name" class="form-control" readonly="" /><br />
                          <label>Item Maker:</label>
                          <input type="text" name="up_maker" id="up_maker" class="form-control" required="" /><br />
                          <label>Item Description:</label>
                          <input type="text" name="up_des" id="up_des" class="form-control"required="" /><br />
                          <label>Item Quantity:</label>
                          <input type="text" name="up_qty" required="" id="up_qty" class="form-control" /><br />
                          <label> Unit:</label>
                           <select id="up_unit" name="up_unit" class="select2_single form-control" tabindex="-1">
                             <option>--Select--</option>
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
                           </select><br/>
                            <center> <input type="submit" name="update" id="update" value="Update" class="btn btn-success" /> </center><br />
                      <br>
                          <center><div id="loading_up" style="display: none;"><img src="./images/uploading.gif"><br></div>
                          <!--div id="upPre"></div--></center>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
          </div>
          
          <!--bootstrap model stop-->
          <!--script src="./plugins/jQuery/jquery-2.2.4.min.js"></script-->
          <script src="js/jquery.min.js"></script>
          <link href="select2-3.5.3/select2.css" rel="stylesheet" />
    <script src="select2-3.5.3/select2.js"></script>
     <script src="js/jquery.form.js"></script> 
                          <script>
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
                    
                    function set_value(value){
                           var actval=value.split('|');
                           document.getElementById('c_name').value=actval[0];
                          // document.getElementById('c_code').value=actval[1];
                          
                           $('#search_item').load('ajax_item_list.php?cat='+actval[1]);
                        }
                        
                        function set_item(value){
                             var search=value;
                             document.getElementById('name').value=search;
                         }
                    function updateitem(value)
                    {
                        var upval=value.split('||');
                        var i_slno=upval[0];
                        var i_name=upval[1];
                        var i_maker=upval[2];
                        var i_des=upval[3];
                        var i_qty=upval[4];
                        var i_unit=upval[5];
                        document.getElementById('up_sl_no').value=i_slno;
                       document.getElementById('up_name').value=i_name;
                       document.getElementById('up_maker').value=i_maker;
                       document.getElementById('up_des').value=i_des;
                       document.getElementById('up_qty').value=i_qty;
                       document.getElementById('up_unit').value=i_unit;
                    }
                 /*jquery start*/
                 $(document).ready(function() {
        
                   $("#search_item").select2();
                         $('#inv').ajaxForm({
			//target:'#invPre',
			beforeSubmit:function(e){
				$('#loading2').show();
			},
			success:function(e){
                            $('#loading2').hide();
                            if(e==1){  
                             document.getElementById("inv").reset();
                             $('#ajax_load_table').load('ajax_view_items.php?slipno=<?=$_GET['slipno']?>');
                             $('#dataModal').modal('hide');
				$('#loading2').hide();
                            }
			},
			error:function(e){
                            $('#loading2').hide(); 
           document.getElementById("invPre").innerHTML='<p align="center" class="alert alert-danger alert-dismissable" style="color:red;"><a class="close" data-dismiss="alert" aria-label="close">×</a>OOPS..!! Server Not Responding.</p>';  
			}
		}).submit();
       
                           
                    $('#update_form').ajaxForm({
			beforeSubmit:function(){
				$('#loading_up').show();
			},
			success:function(e){
                            $('#loading_up').hide();
                            if(e==1){  
                             document.getElementById("update_form").reset();
                             $('#ajax_load_table').load('ajax_view_items.php?slipno=<?=$_GET['slipno']?>');
                             $('#dataModal_update').modal('hide');
				$('#loading_up').hide();
                            }
			},
			error:function(e){
                         $('#loading2').hide(); 
                         document.getElementById("upPre").innerHTML='<p align="center" class="alert alert-danger alert-dismissable" style="color:red;"><a class="close" data-dismiss="alert" aria-label="close">×</a>OOPS..!! Server Not Responding.</p>';  
			}
		}).submit();     
                
                var row=<?=$rowno?>;
                var flag=0;
                $('#dept_inc').click(function(){
                    if(confirm('Process Selected Item?'))
                    {
                        var num=row;  
                        //alert('row'+row);
                     //   alert('num:'+num);
                        if(row>0){
                                 var i;
                                 for(i=1;i<=num;i++)
                                 {
                                  if($('#table_records_'+i).prop("checked")==true)
                                    {
                                        //alert('true');
                                        var value=$('#table_records_'+i).val();
                                        var val=value.split('||');
                                        var rowid,id;
                                        rowid=val[0];
                                        id=val[1];
                                        $('#load').show();
                                        $('#result').load('approval.php?appdept='+id);
                                        $('#'+rowid).prop("checked",false);
                                        //alert(rowid);
                                        $('#'+rowid).remove();
                                      // $('#'+rowid).hide();
                                       // row=row-1;
                                       flag=flag+1;
                                      // alert(flag);
                                    }
                                }
                                $('#load').hide(300);
                                $('#result_test').load('check_item.php?sc=dus');
                                if(flag==row){
                                    $('#myDiv').hide(300);
                                }
                        }
                    }
                    else
                    {
                        return false;
                    }
                });
                
                 $('#dir').click(function(){
                    if(confirm('Process Selected Item?'))
                    {
                                var num=row;
                              //   alert('num:'+num);
                                 if(row>0){
                                 var i;
                                 for(i=1;i<=num;i++){
                                  if($('#table_records_'+i).prop("checked")==true)
                                    {
                                        //alert('true');
                                        var value=$('#table_records_'+i).val();
                                        var val=value.split('||');
                                        var rowid,id;
                                        rowid=val[0];
                                        id=val[1];
                                        $('#load').show();
                                        $('#result').load('approval.php?appdir='+id);
                                        $('#'+rowid).prop("checked",false);
                                        //alert(rowid);
                                        $('#'+rowid).remove();
                                        //$('#'+rowid).hide();
                                       // row=row-1;
                                       flag=flag+1;
                                     // alert(flag);
                                    }
                                }
                                $('#load').hide(300);
                                 $('#result_test').load('check_item.php?sc=dus');
                              if(flag==row){
                                    $('#myDiv').hide(300);
                                }
                            }
                    }
                    else
                    {
                        return false;
                    }
                            
                });
                
             });
                 /*jquery stop*/
                    
                 
             
    </script>
                 <!-- /page content -->
                 
     <!-- footer content -->
        <footer>
          <div class="pull-right">
            BIET - Stock Management System <a href="#"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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
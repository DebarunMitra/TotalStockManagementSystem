<?php
include './header.php';
include './class/db_connect.php';
                                     
?>
         <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
              <div class="row x_title">
            <div class="page-title">
              <div class="title_left">
                <h3>REQUISITION <small>Items requested by faculties</small></h3>
              </div>
              <!--div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div-->
            </div>
            </div>
            <div class="clearfix"></div>
            <!--Stock part-->
             <div class="row x_title">
              <div class="title_left">
                <h4>Item Stock <small> stock in department</small></h4>
              </div></div>
                  <div class="x_content">

                    <!--p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p-->

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <!--th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th-->
                            <th class="column-title">Serial No </th>
                            <th class="column-title">Slip No.</th>
                            <th class="column-title">Items</th>
                            <th class="column-title">Description</th>
                            <th class="column-title">Quantity</th>
                            <th class="column-title">Unit</th>
                            <th class="column-title">Despatched Date</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                //echo $_GET['slipno'];
                    $serial_no=1;
                    $fquery= mysqli_query($link, "SELECT * FROM dept_inc_req WHERE stock_app=1 AND gen_by_dept='".$_SESSION['smsdept_sec']."'") or die(mysqli_error($link));
                    //$num_item= mysqli_num_rows($fquery);
                   // echo $num_item;
                    $fnum_item= mysqli_num_rows($fquery);
                    if($fnum_item>0)
                    {
                        while($stock_item=mysqli_fetch_array($fquery))
                        {
                    ?>
                          <tr class="even pointer">
          
                            <td class=" "><?=$serial_no?></td>
                            <td class=" "><?=$stock_item['slip_no']?></td>
                            <!--td class=" "><?=$stock_item['gen_by']?></td>
                            <td class=" "><?=$stock_item['gen_by_desg']?></td-->
                            <td class=" "><?=$stock_item['sc_name']?></td>
                            <!--td class=" "><?=$stock_item['mat_maker']?></td-->
                            <td class=""><?=$stock_item['disp_des']?></td>
                            <td class=""><?=$stock_item['disp_qty']?></td>
                            <td class=" last"><?=$stock_item['mat_unit']?></td>
                            <td class=" last"><?=$stock_item['stock_app_date']?></td>
                            <!--td class=" last" style="width:10%;"><input type="text" name="despatched"></td>
                            <td><input type="button" class="btn btn-success btn-xs " name="approve" value="Approve"></td-->
                          </tr>
                        <?php
                        $serial_no++;
                        }
                    }
                        ?>  
                        </tbody>
                      </table>
                    </div>
							
						
                  </div>
                </div>
<!--Approval part-->
               <div class="row x_title">
              <div class="title_left">
                <h4>Item Dispatch Table <small> item dispatched by Department incharge</small></h4>
              </div></div>
                  <div class="x_content">

                    <!--p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p-->
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <!--th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th-->
                            <th class="column-title">Serial No </th>
                            <th class="column-title">Slip No.</th>
                            <th class="column-title">Requested By</th>
                            <th class="column-title">Designation </th>
                            <th class="column-title">Items</th>
                            <th class="column-title">Maker</th>
                            <th class="column-title">Description</th>
                            <th class="column-title">Quantity</th>
                            <th class="column-title">Despatched</th>
                            <th class="column-title">Unit</th>
                            <th class="column-title">Approval</th>
                            
                            
                            <!--th class="column-title no-link last"><span class="nobr">Action</span>
                            </th-->
                            <!--th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th-->
                          </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                //echo $_GET['slipno'];
                    $serial_no=1;
                    $fquery= mysqli_query($link, "SELECT rq_sl_no,slip_no,gen_by,gen_by_desg,sc_name,mat_maker,mat_des,mat_qty,mat_unit FROM USER_REQUISITION WHERE hod_deptinc_app=1 AND dept_disp_app=0 AND gen_by_dept='".$_SESSION['smsdept_sec']."' AND gen_by_desg='FACULTY'") or die(mysqli_error($link));
                    //$num_item= mysqli_num_rows($fquery);
                   // echo $num_item;
                    $fnum_item= mysqli_num_rows($fquery);
                    if($fnum_item>0)
                    {
                        while($req_item=mysqli_fetch_array($fquery))
                        {
                            $slreq=$req_item['slip_no'];
                            $nmreq=$req_item['sc_name'];
                           // echo $nmreq;
                    ?>
                            <tr class="even pointer" id="r_<?=$serial_no?>">
                            <!--td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td-->
                            <td><?=$serial_no?></td>
                            <td><?=$req_item['slip_no']?><input type="hidden" name="reqqty" id="r_sl_<?=$serial_no?>" value="<?=$req_item['slip_no']?>"/></td>
                            <td class=" "><?=$req_item['gen_by']?></td>
                            <td class=" "><?=$req_item['gen_by_desg']?></td>
                            <td><?=$req_item['sc_name']?><input type="hidden" name="reqqty" id="r_nm_<?=$serial_no?>" value="<?=$req_item['sc_name']?>"/></td>
                            <td class=" "><?=$req_item['mat_maker']?></td>
                            <td class=""><?=$req_item['mat_des']?></td>
                            <td class=""><?=$req_item['mat_qty']?></td>
                            <td class=" last" style="width:10%;"><input type="number"  min="0" max="100" name="reqqty" id="disp_<?=$serial_no?>" /></td>
                            <td class=" last"><?=$req_item['mat_unit']?></td>
                            <td><input type="button" class="btn btn-success btn-xs " id="approve_<?=$serial_no?>" name="approve" value="Approve" onclick="var dqty=document.getElementById('disp_<?=$serial_no?>').value; var nm=document.getElementById('r_nm_<?=$serial_no?>').value; var sl=document.getElementById('r_sl_<?=$serial_no?>').value; var actnm=nm.replace(/ /g,'%'); alert(actnm); if(dqty){$('#req_disp_msg').load('dispatch_item.php?reqqty='+dqty+'&reqinm='+actnm+'&reqsl='+sl); $('#r_<?=$serial_no?>').hide(500);}"></td>
                            <!--td><button type="button" class="btn btn-success btn-xs " id="approve" name="approve" value="<?=$req_item['slip_no']?>|<?=$req_item['sc_name']?>">Approve</button></td-->
                            </tr>
                        <?php
                         $serial_no++;
                        
                        }
                    }
                        
                        ?>  
                        </tbody>
                      </table>
                       <div id="req_disp_msg"></div>
                    </div>				
                  </div>
        
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script>
   
     //reqinm='+<?=$req_item['sc_name']?>+'+'&
                    $(document).ready(function(){
                       // alert("running");
                      /* $('#approve').click(function(){
                           alert('1');
                           var ival=$('#approve').val();
                           alert(ival);
                       });*/
                    });
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
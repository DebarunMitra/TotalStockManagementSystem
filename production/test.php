<?php
include './header.php';
                                     
?>
        <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Generate Code <small> of dispatched item code</small></h3>
                  </div>
                 <div class="col-md-6"> </div>
                </div>
                  <div class="row">
                      <div class="col-md-6"><h4>Dispatched Items <small> generate code</small></h4></div><br/><br/>
                      <table class="table jambo_table table-responsive tablebodyscroll">
                          <thead>
                              <tr>
                                  <td>Sl No.</td>
                                  <td>Slip No</td>
                                  <td>Department</td>
                                  <td>Item</td>
                                  <td>Description</td>
                                  <td>Total Quantity</td>
                                  <td>Unit</td>
                                  <td>Fund Details</td>
                                  <td>Date</td>
                                  <td>Code</td>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          $eefur= mysqli_query($link,"SELECT * FROM dept_inc_req WHERE c_code='EE' OR c_code='FUR' AND stock_app=1 AND stock_app_date IS NOT NULL");
                          $csl=0;
                          while($itemres= mysqli_fetch_array($eefur)){
                          $csl++;
                          ?>
                              <tr id="r<?=$csl?>">
                                  <td><?=$csl?></td>
                                  <td><?=$itemres['slip_no']?></td>
                                  <td><?=$itemres['gen_by_dept']?></td>
                                  <td><?=$itemres['sc_name']?></td>
                                  <td><?=$itemres['disp_des']?></td>
                                  <td><?=$itemres['disp_qty']?></td>
                                  <td><?=$itemres['mat_unit']?></td>
                                  <td><?=$itemres['fund']?></td>
                                  <td><?=$itemres['stock_app_date']?></td>
                                  <td><button type="button" id="gc<?=$csl?>" class="btn btn-success btn-xs" value="<?=$csl?>||<?=$itemres['fund']?>||<?=$itemres['gen_by_dept']?>||<?=$itemres['sc_name']?>||<?=$itemres['disp_des']?>||<?=$itemres['disp_qty']?>||<?=$itemres['mat_unit']?>||<?=$itemres['stock_app_date']?>||<?=$itemres['slip_no']?>||<?=$itemres['fund_qty']?>||<?=$itemres['sc_code']?>" onclick="code_generate(this.value)" data-toggle="modal" data-target="#GcModal">Generate Code</button></td> 
                                  <!--td><button type="button" id="vc<?=$csl?>" style="display:none;" class="btn btn-primary btn-xs" onclick="" data-toggle="" data-target="">View Code</button></td-->
                              </tr>
                              <?php
                          }
                          ?>
                          </tbody>
                      </table>
                      <div id="gc_msg"></div>
                  </div>
              </div>
            </div>
          </div>
            
           <!-- footer content -->
        <footer>
          <div class="pull-right">
            BIET - Stock Management System <a href=""></a>
          <div class="clearfix"></div>
          </div>
        </footer>
           </div>
       
        <!-- /footer content -->
        </div>

        
            
                <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    
                     
            
                 <!-- /page content -->

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
    
         </div>
        </div>
        </div>
  </body>
</html>
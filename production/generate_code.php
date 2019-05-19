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
                 <div class="col-md-6">  </div>
                </div>
                      <div class="col-md-6"><h4>Dispatched Items <small> generate code</small></h4></div><br/><br/>
                     <div class="table-responsive col-xs-12">
                              <table class="table table-striped jambo_table">
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
                              $reqip= mysqli_query($link,"SELECT * FROM item_code WHERE i_rq_slno=".$itemres['rq_sl_no']."");
                              $resreq=mysqli_num_rows($reqip);                              
                          $csl++;
                          ?>
                              <tr id="r<?=$csl?>">
                                  <td><?=$csl?></td>
                                  <td><?=$itemres['slip_no']?><input type="hidden" id="req<?=$csl?>" value="<?=$itemres['rq_sl_no']?>"/></td>
                                  <td><?=$itemres['gen_by_dept']?></td>
                                  <td><?=$itemres['sc_name']?></td>
                                  <td><?=$itemres['disp_des']?></td>
                                  <td><?=$itemres['disp_qty']?></td>
                                  <td><?=$itemres['mat_unit']?></td>
                                  <td><?=$itemres['fund']?></td>
                                  <td><?=$itemres['stock_app_date']?></td>
                                  <?php
                                  if($resreq>0)
                                  {
                                      ?>
                                  <td><button type="button" id="vc<?=$csl?>" style="display:block;" class="btn btn-primary btn-xs" onclick="var req,actv; req=document.getElementById('req<?=$csl?>').value; actv=parseInt(req); $('#view_i_code').load('dis_item_code.php?viewitem='+actv);">View Code</button></td>
                                  <?php }
                                  else{ ?>
                                   <td><button type="button" id="gc<?=$csl?>" class="btn btn-success btn-xs" value="<?=$csl?>||<?=$itemres['fund']?>||<?=$itemres['gen_by_dept']?>||<?=$itemres['sc_name']?>||<?=$itemres['disp_des']?>||<?=$itemres['disp_qty']?>||<?=$itemres['mat_unit']?>||<?=$itemres['stock_app_date']?>||<?=$itemres['slip_no']?>||<?=$itemres['fund_qty']?>||<?=$itemres['sc_code']?>||<?=$itemres['rq_sl_no']?>" onclick="code_generate(this.value)" data-toggle="modal" data-target="#GcModal">Generate Code</button>
                                       <button type="button" id="vc<?=$csl?>" style="display:none;" class="btn btn-primary btn-xs" onclick="var req,actv; req=document.getElementById('req<?=$csl?>').value; actv=parseInt(req); $('#view_i_code').load('dis_item_code.php?viewitem='+actv);">View Code</button>
                                   </td>   
                                 <?php } ?>
                                 </tr> <?php } ?>
                          </tbody>
                      </table>
                                        </div>
                      <div id="gc_msg"></div>
                      <div id="view_i_code"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="GcModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Generate Code</h4>
                    </div>
                    <div class="modal-body">
                           <form id="gc_form" name="gc_form" method="post">
                          <div class="form-group">
                           <label class="control-label col-md-2 col-sm-1 col-xs-2">Item Name:</label>
                        <div class="col-md-5 col-sm-8 col-xs-8">
                            <input type="text" id="gc_i_name" name="gc_i_name" readonly=""  class="form-control col-md-7 col-xs-12">
                        </div>             
                           <input type="hidden" id="irqslno" name="irqslno" readonly="" />
                       <input type="hidden" id="gcrow" name="gcrow" readonly="" />
                       <input type="hidden" id="fcount" name="fcount" readonly="" />
                       <input type="hidden" id="gcuq" name="fcount" readonly="" />
                        <input type="hidden" id="ic" name="ic" readonly="" />
                         <input type="hidden" id="gcidisdate" name="gcidisdate" readonly="" />
                        <input type="hidden" id="gcidept" name="gcidept" readonly="" />
                      <label class="control-label col-md-2 col-sm-3 col-xs-6">Slip No:</label>
                        <div class="col-md-3 col-sm-2 col-xs-6" id="fundcount">
                            <input type="text" id="gcslip" name="gcslip" readonly="" class="form-control col-md-7 col-xs-12" />             
                        </div>
                          
                      </div>
                          <br/>
                          <label>Required Item description:</label>
                          <input type="text" id="gc_i_des" class="form-control" readonly="" /><br/>
                          <label>Dispatch Fund Code:</label>
                          <input type="text" id="gcftype" class="form-control" readonly="" /><br/>
                          <div class="form-group">
                              <label class="control-label col-md-2 col-sm-1 col-xs-2">Item Quantity:</label>
                             
                        <div class="col-md-5 col-sm-8 col-xs-8">
                          <input type="text" id="qty" name="qty" readonly="" class="form-control col-md-7 col-xs-12" />
                        </div>
                          <label class="control-label col-md-2 col-sm-1 col-xs-2">Unit:</label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <input type="text" id="unit" name="unit" readonly="" class="form-control col-md-7 col-xs-12"/>             
                        </div>
                          </div>
                              <br/><br/><br/>
                           <center> 
                               <input type="button" name="gcbtn" id="gcbtn" value="GENERATE" class="btn btn-warning" /> </center><br />
                      <br/>
                           </form>
                    </div>
               <center><div id="loading2" style="display: none;"><img src="./images/uploading.gif"><br></div></center>
                
                     <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
            </div>
        </div>
                 <!-- /page content -->
                     <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                 
                 <script>
                    // alert('ok');
                         function code_generate(val){
                             var actvalue,count=0,ufund;
                            // alert(val);
                                     actvalue=val.split('||');
                            // alert(actvalue[5]);
                             ufund=actvalue[1].split(',');
                             while(ufund[count])
                             {
                                   // alert(ufund[count]);
                                    count++;
                             }
                            // alert(actvalue[6]);
                             document.getElementById("gcrow").value=actvalue[0];
                              document.getElementById("gcidept").value=actvalue[2];
                             document.getElementById("gc_i_name").value=actvalue[3];
                             document.getElementById("fcount").value=count;
                             document.getElementById("gcuq").value=actvalue[9];
                             document.getElementById("gc_i_des").value=actvalue[4];
                             document.getElementById("gcftype").value=actvalue[1];
                             document.getElementById("qty").value=actvalue[5];
                             document.getElementById("unit").value=actvalue[6];
                             document.getElementById("gcslip").value=actvalue[8];
                             document.getElementById("ic").value=actvalue[10];
                             document.getElementById("gcidisdate").value=actvalue[7];
                            document.getElementById("irqslno").value=actvalue[11];
                         }
                         
              function printDiv() {
            //Get the HTML of div
            var divElements = document.getElementById("print_code").innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body><style></style>" +divElements + "</body></html>";
            //alert(divElements);
            //alert(oldPage);
            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
            document.location.reload();
        }
                         
    $(document).ready(function(){
        /*generate code for dispatched item start*/
        $('#gcbtn').click(function(){
            //alert('1');
            var fqmarge,clg='BIET',gcrow,rqsl,dept,name,tq,c,qty,sl,cn,fq,f,q,qval,i,j,k,ic,fund,count=1,code='',d,dmy;
            c=$('#fcount').val();
            cn=parseInt(c);
            fqmarge=$('#gcuq').val();
            sl=$('#gcslip').val();
            qty=$('#qty').val();
            ic=$('#ic').val();
            d=$('#gcidisdate').val();
            dept=$('#gcidept').val();
            tq=$('#qty').val();
            name=$('#gc_i_name').val();
            gcrow=$('#gcrow').val();
            rqsl=$('#irqslno').val();
            //alert(rqsl);
            $('#loading2').show();
           // alert(ic);
            if(cn>1)
            {
                  //alert('2');
                fq=fqmarge.split('::');
                f=fq[0].split(',');
                q=fq[1].split(',');
                dmy=d.split('-');
                for(i=0;i<cn;i++)
                {
                    fund=f[i].split('/');
                    qval=parseInt(q[i]);
                    for(j=1;j<=qval;j++)
                    {
                        
                        code=clg+'/'+fund[0]+'/'+dept+'/'+ic+'/'+sl+'/'+dmy[0].substring(2,4)+'/'+dmy[1]+'/'+dmy[2]+'/'+count;
                        count++;
                        $('#gc_msg').load('dis_item_code.php?code='+code+'&icode='+ic+'&gcslip='+sl+'&rqsl='+rqsl);
                          setTimeout(function(){//code='';
                              alert(code);},1000);
                       // alert(code);   
                    }
                }
            }
            else
            {
                fq=fqmarge.split('::');
                dmy=d.split('-');
                    fund=fq[0].split('/');
                    qval=parseInt(tq);
                    for(j=1;j<=qval;j++)
                    {
                        code=clg+'/'+fund[0]+'/'+dept+'/'+ic+'/'+sl+'/'+dmy[0].substring(2,4)+'/'+dmy[1]+'/'+dmy[2]+'/'+count;
                        count++;
                        $('#gc_msg').load('dis_item_code.php?code='+code+'&icode='+ic+'&gcslip='+sl+'&rqsl='+rqsl);
        setTimeout(function(){code='';
        alert(code);},1000);              
        //  alert(code);   
                    }
            }
                $('#gc'+gcrow).remove();
                $('#loading2').hide(300);
                $('#GcModal').modal('hide');
                document.getElementById("vc"+gcrow).style.display='block';
        });
        /*generate code for dispatched item stop*/
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
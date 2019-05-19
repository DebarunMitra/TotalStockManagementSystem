<?php
include './class/db_connect.php';

if($_GET['code']!==NULL && $_GET['icode']!==NULL && $_GET['gcslip']!==NULL && $_GET['rqsl']!==NULL){
   if(mysqli_query($link,"INSERT INTO `item_code` (`slip_no`,`i_rq_slno`, `sc_code`, `dis_code`) VALUES(".$_GET['gcslip'].",".$_GET['rqsl'].",'".$_GET['icode']."','".$_GET['code']."')"))
   {
      echo ' <center><p style="color:green;">Code Generated Successfully</p></center>'; 
      $_GET['code']=NULL;
      $_GET['icode']=NULL;
      $_GET['gcslip']=NULL;
      $_GET['rqsl']=NULL;
   }
}
else if($_GET['viewitem']!==NULL)
    {
        $output='';
        $output ='<div id="print_code" style="max-width: 1800px; overflow-x: auto; width:100%;"><div class="print"><h3><u>Dispatched Item Code</u></h3><table class="table table-striped jambo_table table-bordered">
                      <thead>
                        <tr>
                          <th>Sl No.</th>
                          <th>Slip No</th>
                          <th>Item Name</th>
                          <th>Item Dispatch Code</th>
                        </tr>
                      </thead>
                      <tbody>
                       ';
                                $icq= mysqli_query($link,"SELECT ic.dis_code,dir.slip_no,dir.sc_name FROM item_code as ic, dept_inc_req as dir  WHERE dir.rq_sl_no=ic.i_rq_slno AND ic.i_rq_slno=".$_GET['viewitem']."");
                                $dc=1;
                                while($exeicq = mysqli_fetch_array($icq)) {
                                    //echo 'ok';
                        $output.= ' <tr>
                              <td>'.$dc.'</td>
                              <td>'.$exeicq['slip_no'].'</td>
                              <td>'.$exeicq['sc_name'].'</td>
                              <td>'.$exeicq['dis_code'].'</td>
                          </tr>
                            ';
                                       $dc++;
                                       
                                        }
                                  $dc_row=$dc-1;
                      
                     $output.=' </tbody> </table></div></div><input type="button" class="btn btn-info" onclick="return printDiv()" value="Print">';
                      $_GET['viewitem']=NULL;
                      echo $output;
        
    }
?>
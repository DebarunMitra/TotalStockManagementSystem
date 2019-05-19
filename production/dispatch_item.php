<?php
include './class/db_connect.php';
//echo $_GET['fuqt'];
if($_GET['sl']!=NULL && $_GET['dqty']!=NULL && $_GET['ddes']!=NULL && $_GET['ft']!=NULL && $_GET['fuqt']!=NULL){
//if($_GET['fuqt']!=NULL){  
$dispq="UPDATE dept_inc_req SET fund='".$_GET['ft']."',disp_des='".$_GET['ddes']."',disp_qty=".$_GET['dqty'].",fund_qty='".$_GET['fuqt']."',stock_app=1,stock_app_date=NOW() WHERE rq_sl_no=".$_GET['sl']."";
    if(mysqli_query($link, $dispq) or die(mysqli_error($link)))
    {
        $d_q= mysqli_query($link,"SELECT * FROM dept_inc_req WHERE rq_sl_no=".$_GET['sl']."");
       if($d_qr= mysqli_fetch_array($d_q) or die(mysqli_error($link))){
        $dept_q="INSERT INTO `dept_stock` (`i_slip_no`, `ds_dept`, `i_c_code`, `i_sc_code`, `i_sc_name`,`i_fund`,`i_qty`, `i_dis_date`) VALUES (".$_GET['sl'].",'".$d_qr['gen_by_dept']."','".$d_qr['c_code']."','".$d_qr['sc_code']."','".$d_qr['sc_name']."','".$_GET['ft']."',".$_GET['dqty'].", NOW())";
        $dept_dr= mysqli_query($link, $dept_q);
       // echo $d_qr['sc_name'];
        echo ' <center><p id="dismsg" style="color: green; display:block;">Item Dispatched Successfully</p></center>';
       // echo $_GET['ddes'];
        $_GET['sl']=NULL;
        $_GET['dqty']=NULL;
        $_GET['ddes']=NULL;
        $_GET['ft']=NULL;
        $_GET['fuqt']=NULL;
        }
 //print $_GET['fuqt'];
   // echo strlen($_GET['fuqt']);
        }
    }
else if($_GET['display']!=NULL)
    {
        $output='';
        $output ='<table class="table">
                      <thead>
                        <tr>
                          <th>Sl No.</th>
                          <th>Fund Type</th>
                          <th>Item Name</th>
                          <!--th>Maker</th-->
                          <th>Description</th>
                          <th>Quantity</th>
                          <th>Unit</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                       ';
                                $dis_items= mysqli_query($link,"SELECT * FROM dept_inc_req WHERE slip_no=".$_GET['display']." AND gen_by_app=1 AND stock_app=1 ");
                                $dcount=1;
                                while($exe_dsd = mysqli_fetch_array($dis_items)) {
                                    //echo 'ok';
                        $output.= ' <tr>
                              <td>'.$dcount.'</td>
                              <td>'.$exe_dsd['fund'].'</td>
                              <td>'.$exe_dsd['sc_name'].'</td>
                              <td>'.$exe_dsd['disp_des'].'</td>
                              <td>'.$exe_dsd['disp_qty'].'</td>
                              <td>'.$exe_dsd['mat_unit'].'</td>
                          </tr>
                            ';
                                       $dcount++;
                                       
                                        }
                                  $dis_row=$dcount-1;
                      
                     $output.=' </tbody> </table>';
                      $_GET['display']=NULL;
                      echo $output;
        
    }
    else if($_GET['more']!=NULL)
    {
        $moretable='';
        $moretable.='<table class="table">
                      <thead>
                        <tr>
                        <th>Select</th>
                          <th>Sl No.</th>
                          <th>Fund Type</th>
                          <th>Item Name</th>
                          <th>Maker</th>
                          <th>Description</th>
                          <th>Quantity</th>
                          <th>Unit</th>
                          <th>DATE & TIME</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                       ';
                                $moreitem = mysqli_query($link,"SELECT * FROM item_entry_data WHERE i_sc_code='".$_GET['more']."' AND i_qty > d_qty ");
                                $morecount=1;
                               //if($moreitem){
                                while($more_dsd = mysqli_fetch_array($moreitem)) {
                                 //   echo 'ok';
                                    $ts=$more_dsd['i_qty']-$more_dsd['d_qty'];
                        $moretable.= ' <tr id="row_'.$morecount.'">
                            <td><input type="checkbox"  id="ch_'.$morecount.'" value="'.$more_dsd['fund'].'||'.$more_dsd['i_e_date'].'||'.$morecount.'"></td>
                              <td>'.$morecount.'<input type="hidden" name="iid_'.$morecount.'" id="iid_'.$morecount.'" value="'.$more_dsd['i_e_id'].'" /></td>
                              <td>'.$more_dsd['fund'].'</td>
                              <td>'.$more_dsd['i_sc_name'].'</td>
                              <td>'.$more_dsd['i_maker'].'</td>
                              <td>'.$more_dsd['i_des'].'</td>
                              <td>'.$ts.'</td>
                              <td>'.$more_dsd['i_unit'].'</td>
                              <td>'.$more_dsd['i_e_date'].'</td>
                          </tr>
                            ';
                                       $morecount++;
                                        }
                             $_SESSION['stocki']=$morecount-1;
                     $moretable.=' </tbody> </table> <input type="hidden" id="rowcount" value="'.$_SESSION['stocki'].'">' ;   
        echo $moretable;
        $_SESSION['stocki']=0;
        $_GET['more']=NULL;
    }
    else if($_GET['fid']!==NULL && $_GET['fiqty']!==NULL){
        $oldqty=mysqli_query($link,"SELECT d_qty FROM item_entry_data WHERE i_e_id='".$_GET['fid']."'"); 
        $resq= mysqli_fetch_array($oldqty);
        $resq['d_qty']=$resq['d_qty']+$_GET['fiqty'];
    $upfqty="UPDATE item_entry_data SET d_qty=".$resq['d_qty']." WHERE i_e_id='".$_GET['fid']."'";
    if(mysqli_query($link, $upfqty) or die(mysqli_error($link)))
     {
        $_GET['fid']=NULL;
        $_GET['fiqty']=NULL;
        echo '<center><p id="uqid" style="color:green;display:block;">Quantity Successfully Added</p></center>';
     }
        //echo $resq['d_qty'];
    }
    
    
    else if($_GET['reqqty']!==NULL && $_GET['reqinm']!==NULL && $_GET['reqsl']!==NULL)//approve
    {  
        $nm= str_replace('%',' ',$_GET['reqinm']);
     $upqty="UPDATE user_requisition SET dept_disp_qty=".$_GET['reqqty'].",dept_disp_app=1,dept_disp_date=NOW() WHERE slip_no=".$_GET['reqsl']." AND sc_name='".$nm."' AND hod_deptinc_app=1";
       if(mysqli_query($link, $upqty) or die(mysqli_error($link)))
     {
        echo '<center><p style="color:green">Successfully Item Dispatched</p></center>';
       }
        $_GET['reqqty']=NULL;
            $_GET['reqinm']=NULL;
             $_GET['reqsl']=NULL;
     }
?>

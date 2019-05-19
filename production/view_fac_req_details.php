<div class="box-header with-border"> 
<h3 class="box-title"><form>
                                Showing Details of <input type="number" value="<?php //if(isset($_GET['limit'])){ echo $_GET['limit']; } else{ echo '25'; }?>" size="3" required="" min="1" name="limit" > Records
                            <input type="submit" value="change" class="btn btn-sm btn-primary" name="chng">
                                </form></h3>
</div>
Total Data On File 
                <?php 
            $q=  mysqli_query($link,"select rq_sl_no from user_requisition where gen_by_dept='".$_SESSION['smsdept_sec']."' AND gen_by_app=1 ");
        echo mysqli_num_rows($q); ?>
            <br>
            <div style="max-width: 1800px; overflow-x: auto; font-size: 12px;">
            <table class="table table table-striped jambo_table table-hover table-responsive table-bordered">
        <thead>
            <tr class="headings">
            <!--th width="8%">Action</th-->
        <th>Serial no</th>
        <th>Slip No</th>
        <!--<th>Employee Id</th>-->
        <th>Employee Name</th>
        <th>Category Name</th>
        <th>Item Name</th>
       
        <th>Maker</th>
        <th>Description</th>
        
        <th>Quantity</th>
        <th>Unit</th>
        <th>Generated Date & Time</th>
        <th>Approval Date & Time</th>
        <th>Aprroval By Dept</th>
        </tr>
        </thead>
        <tbody>
            <?php
            // if($num_item>0)
                           // {
                                $fitems= mysqli_query($link,"SELECT * FROM  user_requisition  where  gen_by_dept='".$_SESSION['smsdept_sec']."' AND gen_by_app=1 ");
                               // $count=1;
                                $s=1;
                                while($fexe_sd = mysqli_fetch_array($fitems)) {
                                    //if(($exe_sd['hod_deptinc_app']==0)&&($exe_sd['hod_dir_app']==0))
                                    //{
                                       ?>
                                    <tr id="even" class="even pointer">
                                   
                                                  <td><?= $s?></td>
                                                  <td><?=$fexe_sd['slip_no']?></td>
                                                  <!--<td><?=$fexe_sd['emp_id']?></td>-->
                                                  <td><?= $fexe_sd['gen_by']?></td>
                                                 <td><?=$fexe_sd['c_name']?></td>
                                                 <td><?=$fexe_sd['sc_name']?></td>
                                                 <td><?=$fexe_sd['mat_maker']?> </td>
                                                 <td><?=$fexe_sd['mat_des']?></td>
                                                  <td><?=$fexe_sd['mat_qty']?></td>
                                                 <td><?=$fexe_sd['mat_unit']?></td>
                                                 <td><?=$fexe_sd['gen_date']?></td>
                                                 <td><?=$fexe_sd['hod_dept_date']?></td>
       
                                                 <td><?=$fexe_sd['dept_disp_date']?></td>
                                            </tr>
                                      <?php
                                      $s++;
                                  }
                              // }
                           // }
                            ?>
        </tbody>
            </table>
             <br>
                <div id="content">
                </div>
             
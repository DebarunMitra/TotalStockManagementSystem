<div class="box-header with-border"> 
<h3 class="box-title"><form>
                                Showing Details of <input type="number" value="<?php //if(isset($_GET['limit'])){ echo $_GET['limit']; } else{ echo '25'; }?>" size="3" required="" min="1" name="limit" > Records
                            <input type="submit" value="change" class="btn btn-sm btn-primary" name="chng">
                                </form></h3>
</div>
Total Data On File 
                <?php 
            $q=  mysqli_query($link,"select rq_sl_no from dept_inc_req");
        echo mysqli_num_rows($q); ?>
            <br>
            <div style="max-width: 1800px; overflow-x: auto; font-size: 12px;">
            <table class="table table table-striped jambo_table table-hover table-responsive table-bordered">
        <thead>
            <tr class="headings">
            <!--th width="8%">Action</th-->
        <th>Department</th>
        <th>Category Name</th>
        <th>Item Name</th>
        <th>Fund Type</th>
        <th>Maker</th>
        <th>Description</th>
        <th>unit</th>
        <th> Disp Description</th>
        <th>Quantity</th>
        <th>Approval Dtae</th>
        </tr>
        </thead>
        <tbody>
            <?php
            // if($num_item>0)
                           // {
                                $items= mysqli_query($link,"select d.*, cm.c_name from dept_inc_req as d, category_master as cm  where d.c_code=cm.c_code order by rq_sl_no");
                               // $count=1;
                                while($view_disp = mysqli_fetch_array($items)) {
                                    //if(($view_disp['hod_deptinc_app']==0)&&($eview_disp['hod_dir_app']==0))
                                    //{
                                       ?>
                                    <tr id="even" class="even pointer">
                                   <!--td class="a-center "><input type="checkbox"  id="table_records_<?=$count?>" name="table_records" value="even_<?=$count?>||<?=$exe_sd['rq_sl_no']?>"></td>
                               td><?=$count?></td-->
                                                 <td><?=$view_disp['gen_by_dept']?></td>
                                                 <td><?=$view_disp['c_name']?></td>
                                                 <td><?=$view_disp['sc_name']?></td>
                                                 <td><?=$view_disp['fund']?></td>
                                                 <td><?=$view_disp['mat_maker']?> </td>
                                                 <td><?=$view_disp['mat_des']?></td>
                                                 <td><?=$view_disp['mat_unit']?></td>
                                                 <td><?=$view_disp['disp_des']?></td>
                                                 <td><?=$view_disp['disp_qty']?></td>
                                                 <td><?=$view_disp['stock_app_date']?></td>
                                            </tr>
                                      <?php
                                  }
                              // }
                           // }
                            ?>
        </tbody>
            </table>
             <br>
                <div id="content">
                </div>
             
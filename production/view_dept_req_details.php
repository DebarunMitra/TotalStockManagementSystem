<div class="box-header with-border"> 
<h3 class="box-title"><form>
                                Showing Details of <input type="number" value="<?php //if(isset($_GET['limit'])){ echo $_GET['limit']; } else{ echo '25'; }?>" size="3" required="" min="1" name="limit" > Records
                            <input type="submit" value="change" class="btn btn-sm btn-primary" name="chng">
                                </form></h3>
</div>
Total Data On File 
                <?php 
            $q=  mysqli_query($link,"select rq_sl_no from dept_inc_req where gen_by='".$_SESSION['smsname']."'");
        echo mysqli_num_rows($q); ?>
            <br>
            <div style="max-width: 1800px; overflow-x: auto; font-size: 12px;">
            <table class="table table table-striped jambo_table table-hover table-responsive table-bordered">
        <thead>
            <tr class="headings">
            <!--th width="8%">Action</th-->
        <th>Serial no</th>
       <!-- <th>Category Name</th>-->
        <th>Item Name</th>
       
        <th>Maker</th>
        <th>Description</th>
        
        <th>Quantity</th>
        <th>Unit</th>
        
        <th>Generated  Date</th>
        </tr>
        </thead>
        <tbody>
            <?php
            // if($num_item>0)
                           // {
                                $items= mysqli_query($link,"SELECT * FROM dept_inc_req where gen_by='".$_SESSION['smsname']."'");
                               // $count=1;
                                $s=1;
                                while($exe_sd = mysqli_fetch_array($items)) {
                                    //if(($exe_sd['hod_deptinc_app']==0)&&($exe_sd['hod_dir_app']==0))
                                    //{
                                       ?>
                                    <tr id="even" class="even pointer">
                                   <!--td class="a-center "><input type="checkbox"  id="table_records_<?=$count?>" name="table_records" value="even_<?=$count?>||<?=$exe_sd['rq_sl_no']?>"></td>
                               td><?=$count?></td-->
                                                  <td><?= $s?></td>
                                                 <!--<td><?=$exe_sd['c_name']?></td>-->
                                                 <td><?=$exe_sd['sc_name']?></td>
                                                 
                                                 <td><?=$exe_sd['mat_maker']?> </td>
                                                 <td><?=$exe_sd['mat_des']?></td>
                                                 
                                                 <td><?=$exe_sd['mat_qty']?></td>
                                                 <td><?=$exe_sd['mat_unit']?></td>
                                                 
                                                 <td><?=$exe_sd['gen_date']?></td>
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
             
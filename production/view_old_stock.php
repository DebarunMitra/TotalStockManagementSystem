<div class="box-header with-border"> 
<h3 class="box-title"><form>
                                Showing Details of <input type="number" value="<?php //if(isset($_GET['limit'])){ echo $_GET['limit']; } else{ echo '25'; }?>" size="3" required="" min="1" name="limit" > Records
                            <input type="submit" value="change" class="btn btn-sm btn-primary" name="chng">
                                </form></h3>
</div>
Total Data On File 
                <?php 
            $q=  mysqli_query($link,"select sl_no from old_stock ");
        echo mysqli_num_rows($q); ?>
            <br>
            <div style="max-width: 1800px; overflow-x: auto; font-size: 12px;">
            <table class="table table table-striped jambo_table table-hover table-responsive table-bordered">
        <thead>
            <tr class="headings">
            <!--th width="8%">Action</th-->
        <th>Serial no</th>
        <th>Category</th>
        <th>Item</th>
        <th>Fund</th>
        <th>Maker</th>
        <th>Model No</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit</th>
        <th>Unit Price</th>
        <th>Total Price</th>
        <th>Purchase Date</th>
        <th>Entry Date</th>
        <th>Dispatched to</th>
        <th>Dispatched Date</th>
        </tr>
        </thead>
        <tbody>
            <?php
            // if($num_item>0)
                           // {
                                $oitems= mysqli_query($link,"SELECT * FROM old_stock ");
                               // $count=1;
                                $s=1;
                                while($oexe_sd = mysqli_fetch_array($oitems)) {
                                    //if(($exe_sd['hod_deptinc_app']==0)&&($exe_sd['hod_dir_app']==0))
                                    //{
                                       ?>
                                    <tr id="even" class="even pointer">
                                   
                                                  <td><?= $s?></td>
                                                  
                                                  <td><?=$oexe_sd['o_c_name']?></td>
                                                  <td><?= $oexe_sd['o_sc_anme']?></td>
                                                 <td><?=$oexe_sd['o_fund']?></td>
                                                 <td><?=$oexe_sd['o_maker']?></td>
                                                 <td><?=$oexe_sd['o_model_no']?> </td>
                                                 <td><?=$oexe_sd['o_des']?></td>
                                                  <td><?=$oexe_sd['o_qty']?></td>
                                                 <td><?=$oexe_sd['o_unit']?></td>
                                                 <td><?=$oexe_sd['o_uprice']?></td>
                                                 <td><?=$oexe_sd['o_tprice']?></td>
                                                 <td><?=$oexe_sd['o_p_date']?></td>
                                                 <td><?=$oexe_sd['o_e_date']?></td>
                                                 <td><?=$oexe_sd['o_disp_dept']?></td>
                                                 <td><?=$oexe_sd['o_disp_date']?></td>
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
             
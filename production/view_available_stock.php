<!--div class="box-header with-border"> 
<h3 class="box-title"><form>
                                Showing Details of <input type="number" value="<?php //if(isset($_GET['limit'])){ echo $_GET['limit']; } else{ echo '25'; }?>" size="3" required="" min="1" name="limit" > Records
                            <input type="submit" value="change" class="btn btn-sm btn-primary" name="chng">
                                </form></h3>
</div-->
Total Data On File 
                <?php 
            $q=  mysqli_query($link,"select sc_id from subcategory_master");
        echo mysqli_num_rows($q); ?>
            <br>
            <div style="max-width: 1800px; overflow-x: auto; font-size: 12px;">
            <table class="table table table-striped jambo_table table-hover table-responsive table-bordered">
        <thead>
            <tr class="headings">
            <!--th width="8%">Action</th-->
        <th>Category Name</th>
        <th>Item Name</th>
        <th>Description</th>
        <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
            <?php
            // if($num_item>0)
                           // {
                                $items= mysqli_query($link,"select sc.*, cm.c_name from subcategory_master as sc , category_master as cm where sc.sc_c_code=cm.c_code and stock>0 order by sc_name");
                               // $count=1;
                                while($exe_sd = mysqli_fetch_array($items)) {
                                    //if(($exe_sd['hod_deptinc_app']==0)&&($exe_sd['hod_dir_app']==0))
                                    //{
                                       ?>
                                    <tr id="even" class="even pointer">
                                   <!--td class="a-center "><input type="checkbox"  id="table_records_<?=$count?>" name="table_records" value="even_<?=$count?>||<?=$exe_sd['rq_sl_no']?>"></td>
                               td><?=$count?></td-->
                                                <td><?=$exe_sd['c_name']?></td>
                                                 <td><?=$exe_sd['sc_name']?></td>
                                                 <td><?=$exe_sd['sc_des']?></td>
                                                 <td><?=$exe_sd['stock']?></td>
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
             
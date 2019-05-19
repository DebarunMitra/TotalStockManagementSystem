<?php
include './header.php';
include './class/db_connect.php';
                                     
?>
         <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
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
              
            <div class="clearfix"></div>

            <div class="row">
              
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
                            <th class="column-title">Requisition Date</th>
                            <th class="column-title">Requested By</th>
                            <th class="column-title">Designation </th>
                            <th class="column-title">Items</th>
                            <th class="column-title">Maker</th>
                            <th class="column-title">Description</th>
                            <th class="column-title">Quantity</th>
                           <!-- <th class="column-title">Despatched</th>-->
                            <th class="column-title">Unit</th>
                            <!--<th class="column-title">Approval</th>-->
                            
                            
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
                    $fquery= mysqli_query($link, "SELECT rq_sl_no,slip_no,gen_date,gen_by,gen_by_desg,sc_name,mat_maker,mat_des,mat_qty,mat_unit FROM USER_REQUISITION WHERE hod_dir_app=1") or die(mysqli_error($link));
                    //$num_item= mysqli_num_rows($fquery);
                   // echo $num_item;
                    $fnum_item= mysqli_num_rows($fquery);
                    if($fnum_item>0)
                    {
                        while($exe_fquery=mysqli_fetch_array($fquery))
                        {
                    ?>
                          <tr class="even pointer">
                            <!--td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td-->
                            <td class=" "><?=$serial_no?></td>
                            <td class=" "><?=$exe_fquery['slip_no']?></td>
                            <td class=""><?= $exe_fquery['gen_date']?></td>
                            <td class=" "><?=$exe_fquery['gen_by']?></td>
                            <td class=" "><?=$exe_fquery['gen_by_desg']?></td>
                            <td class=" "><?=$exe_fquery['sc_name']?></td>
                            <td class=" "><?=$exe_fquery['mat_maker']?></td>
                            <td class=""><?=$exe_fquery['mat_des']?></td>
                            <td class=""><?=$exe_fquery['mat_qty']?></td>
                            <!--<td class=" last" style="width:10%;"><input type="text" name="despatched"></td>-->
                            <td class=" last"><?=$exe_fquery['mat_unit']?></td>
                            <!--<td><input type="button" class="btn btn-success btn-xs " name="approve" value="Approve"></td>-->
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
              </div>
            </div>
          
        <!-- /page content -->

<?php
    include './footer.php';
?>
<?php
include './class/db_connect.php';
?>
<p id="del_msg" style="color:green;"></p>
<table class="table table-striped jambo_table" id="req_table_list">
                        <thead>
                          <tr class="headings">
                              <th>
                                Select <input type="checkbox" id="check-all" class="flat" />
                            </th>
                            <th class="column-title">Serial No </th>
                            <th class="column-title">Item Name </th>
                            <th class="column-title">Item Maker </th>
                            <th class="column-title">Description </th>
                            <th class="column-title">Quantity </th>
                            <th class="column-title">Unit </th>
                            <th class="column-title">Update</th>
                            <th class="column-title">Delete </th>
                            <!--th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th-->
                          </tr>
                        </thead>

                        <tbody>
                            <?php
                                $items= mysqli_query($link,"SELECT rq_sl_no,sc_name,mat_maker,mat_des,mat_qty,mat_unit,hod_deptinc_app,hod_dir_app FROM user_requisition WHERE slip_no='".$_GET['slipno']."' AND hod_deptinc_app=0 AND hod_dir_app=0");
                                $count=1;
                                while($exe_sd = mysqli_fetch_array($items)) {
                                   if(($exe_sd['hod_deptinc_app']==0)&&($exe_sd['hod_dir_app']==0))
                                    {
                                       ?>
                                            <tr id="even_<?=$count?>" class="even pointer">
                                                  <td class="a-center "><input type="checkbox" class="flat" id="table_records_<?=$count?>" name="table_records" value="even_<?=$count?>||<?=$exe_sd['rq_sl_no']?>"></td>
                                                <td name="count"><?=$count?></td>
                                                <td name="name"><?=$exe_sd['sc_name']?></td>
                                                <td name="maker"><?=$exe_sd['mat_maker']?> </td>
                                                <td name="desc"><?=$exe_sd['mat_des']?></td>
                                                <td name="qty"><?=$exe_sd['mat_qty']?></td>
                                                <td name="unit"><?=$exe_sd['mat_unit']?></td>
                                                <td><button type="button" id="<?=$exe_sd['rq_sl_no']?>"  class="btn btn-success btn-xs update" name="update" value="<?=$exe_sd['rq_sl_no']?>||<?=$exe_sd['sc_name']?>||<?=$exe_sd['mat_maker']?>||<?=$exe_sd['mat_des']?>||<?=$exe_sd['mat_qty']?>||<?=$exe_sd['mat_unit']?>" onclick="updateitem(this.value)" data-toggle="modal"   data-target="#dataModal_update">Update</button></td>   
                                                <td> <input type="button" class="btn btn-danger btn-xs delete" id="<?=$exe_sd['rq_sl_no']?>" name="delete"  value="Delete" onclick="if(confirm('Delete Confirm ??')){$('#del_msg').load('delete_item.php?slno=<?=$exe_sd['rq_sl_no']?>');$('#even_'+<?=$count?>).remove();}" /></td> 
                                            </tr>
                                   <?php
                                   $count++;         
                                          $_SESSION['rowno']=$count-1;
                                    }
                                }
                                       /* else 
                                            {
                                            ?>
                                <tr id="odd_<?=$count?>" class="odd pointer">
                                                 <td class=" "><?=$count?></td>
                                                <td class=" "><?=$exe_sd['sc_name']?></td>
                                                <td class=" "><?=$exe_sd['mat_maker']?> </td>
                                                <td class=" "><?=$exe_sd['mat_des']?></td>
                                                <td class=" "><?=$exe_sd['mat_qty']?></td>
                                                <td class=" "><?=$exe_sd['mat_unit']?></td>
                                                <td><button type="button" id="<?=$exe_sd['rq_sl_no']?>"  class="btn btn-success btn-xs update" name="update" value="<?=$exe_sd['rq_sl_no']?>||<?=$exe_sd['sc_name']?>||<?=$exe_sd['mat_maker']?>||<?=$exe_sd['mat_des']?>||<?=$exe_sd['mat_qty']?>||<?=$exe_sd['mat_unit']?>" onclick="updateitem(this.value)" data-toggle="modal"   data-target="#dataModal_update">Update</button></td>   
                                               <td> <input type="button" class="btn btn-danger btn-xs delete" id="<?=$exe_sd['rq_sl_no']?>" name="delete"  value="Delete" onclick="$('#odd_<?=$count?>').hide(300);$('#del_msg').load('delete_item.php?slno=<?=$exe_sd['rq_sl_no']?>');$('#del_msg').hide(300);" /></td>    
                                           </tr>
                              <?php
                              $count++;
                              }*/
                              // }
                            ?>

                        </tbody>
                      </table>
<?= $_SESSION['rowno']?>
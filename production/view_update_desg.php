<!--div class="box-header with-border"> 
<h3 class="box-title"><form>
                                Showing Details of <input type="number" value="<?php //if(isset($_GET['limit'])){ echo $_GET['limit']; } else{ echo '25'; }?>" size="3" required="" min="1" name="limit" > Records
                            <input type="submit" value="change" class="btn btn-sm btn-primary" name="chng">
                                </form></h3>
</div--> <style>
  .tablebodyscroll tbody{
      display:none;
    max-height: 400px; /* or any value */
    overflow-y: scroll;
  }
  
  /*.tablebodyscroll  thead,tbody tr{
      display: table;
    
   
  }*/
</style>
Total Data On File 
                <?php 
            $q=  mysqli_query($link,"select reg_id from registration");
        echo mysqli_num_rows($q); ?>
            <br>
            
            <div style="max-width: 1800px; overflow-x: auto; font-size: 12px;">
                
                <form method="post" id="demo-form2"  class="form-horizontal form-label-left">
            <table  id="update_desg_table" class="table table table-striped jambo_table table-hover table-responsive table-bordered">
        <thead>
            <tr class="headings">
            <!--th width="8%">Action</th-->
            <th>Sl no.</th>
        <th>Employee Id</th>
        <th>Name</th>
        <th>Department</th>
        <th>Employee Designation</th>
        <th>System Designation</th>
        <th>Choose</th>
        <th>Update</th>
        </tr>
        </thead>
        
        <tbody>
            
            <?php
            // if($num_item>0)
                           // {
                                $items= mysqli_query($link,"select * from registration where reg_id>0");
                                $c=1;
                                while($exe_sd = mysqli_fetch_array($items)) {
                                 //   $id=$exe_sd['emp_id'];
                                  ?>
                                    <tr id="up_<?=$c?>" class="even pointer " >
                                        
                                                 <td><?=$c?></td>
                                        <td><?=$exe_sd['emp_id']?><input type="hidden" id="empid<?=$c?>" value="<?=$exe_sd['emp_id']?>"></td>
                                                 <td><?=$exe_sd['name']?></td>
                                                 <td><?=$exe_sd['dept_sec']?></td>
                                                 <td><?=$exe_sd['clg_desg']?></td>
                                                 <td><?=$exe_sd['desg']?></td>
                                                 <td><select  name="v_desg" id="desg_<?=$c?>" class="form-control" tabindex="-1" list="namelist">
                                                     <option valuee="">---System Designation---</option>
                                                     <option value="ADMIN">ADMIN</option>
                                                     <option value="DIRECTOR">DIRECTOR</option>
                                                     <option value="STOCK_ADMIN">STOCK ADMIN</option> 
                                                     <option value="HOD">HOD</option> 
                                                     <option value="DEPT_IN_CHARGE">DEPARTMENT INCHARGE</option> 
                                                     <option value="FACULTY">FACULTY</option> 
                                                     <option value="ACCOUNTS_OFFICER">ACCOUNTS OFFICER</option> 
                                                     <option value=<option value="ACCOUNTANT">CASHIER</option>
                            </select></td>
                            
                            <td><center><input type="button" class="btn btn-xs btn-primary update " id="update_<?=$c?>" name="update" value="Update" onclick="var udesg=document.getElementById('desg_<?=$c?>').value; var ueid=document.getElementById('empid<?=$c?>').value; if(udesg){$('#desg_up_msg').load('up_desg.php?ueid='+ueid+'&uedesg='+udesg); setTimeout(location.reload.bind(location), 2000); }"></center></td>
                                            </tr>
                                      <?php
                                      $c++;
                                  }
                            ?>
                                     
        </tbody>
        
            </table>
            </form>
           
             <br>
            
                <div id="desg_up_msg">
                </div>
             <script src="../vendors/jquery/dist/jquery.min.js"></script>
<script>
     //reqinm='+<?=$exe_sd['emp_id']?>+'+'&
                    $(document).ready(function(){
                       // alert("running");
                    });
                    
           if ( window.history.replaceState ) {
                          window.history.replaceState( null, null, window.location.href );
                         }
</script>
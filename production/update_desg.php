<?php
include './header.php';
include './class/db_connect.php';                                  
?>
<style>
  .scrollable {
    height: 260px; /* or any value */
    overflow-y: auto;
</style>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet"
        <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Item Dispatched Search<small> stock dispatched search</small></h3>
                  </div>
                 <div class="col-md-6"></div>
                </div>
                  <center><h6>Search Here</h6></center><br/>
              <div class="container">
              <form method="post">
                    <input type="hidden" name="pop" value="7">
                    <table class="table">
                        <tr class="info">
                            <td>Employee Id
                                <input type="text" class="form-control" placeholder="Employee Id" id="vemp_id" name="vemp_id" class="form-control" tabindex="-1" list="namelist">
                            
                                <datalist id="namelist"></datalist>
                            </td>
                            <td>Department:
                                <select id="vd_dept" name="vd_dept" class="form-control" tabindex="-1" list="namelist">
                            <option></option>
                            <option value="">Choose Department</option>
                            <option value="ACC-SECTION">Account section</option>
                            <option value="EXAM-CELL">Examination Cell</option>
                            <option value="REGISTRAR">Director/Registrar Office</option>
                            <option value="MEDICAL">Medical Unit</option>
                            <!--<option value="DRO">Director/RegistRar Office</option>-->
                            <option value="EE">Electrical Engineering Department</option>
                            <option value="ECE">Electronics Engineering Department</option>
                            <option value="CE">Civil Engineering Department</option>
                            <option value="CSE">Computer Science & Engineering Department</option>
                            <option value="IT">Information Technology Department</option>
                            <option value="ME">Mechanical Engineering Department</option>
                            </select>
                                <datalist id="namelist"></datalist>
                            </td>
                        </tr>
                    </table>
                   
                    <center><input type="submit" name="search" class="btn btn-sm btn-primary" value="Search"></center>
                  </form>
              </div><br/>
               <?php
            if(isset($_POST['search'])){
                $sql .= "select * from registration where reg_id>0";
              
                if ( $_POST['vemp_id'] !="" ){
           $sql .= " AND emp_id = '" . $_POST['vemp_id']."'";
      }   
      if ( $_POST['vd_dept'] !="" ){
           $sql .= " AND dept_sec= '" . $_POST['vd_dept']."'";
      }          

      
      $sql .=" LIMIT 0,5";
      //echo $sql;
       ?>
      <table class="table table table-striped jambo_table table-hover table-responsive table-bordered">
        <thead>
            <tr class="headings">
            <!--th width="8%">Action</th-->
        <!--th>slip no</th-->
        <th>Sl no.</th>
        <th>Employee Id</th>
        <th>Name</th>
        <th>Department</th>
        <th>Employee Designation</th>
        <th>System Designation</th>
        <th>Choose</th>
        <th>Update</th>
        <!--th>Entry Date</th-->
        </tr>
        </thead>
        <tbody>
            <?php
            // if($num_item>0)
                           // {
                                $items= mysqli_query($link,$sql);
                                $c=1;
                              
                                while($view_item = mysqli_fetch_array($items)) {
                                       ?>
                                    <tr id="up_<?=$c?>" class="even pointer">
                                        
                                                 <td><?=$c?></td>
                                                 <td><?=$view_item['emp_id']?><input type="hidden" id="empid<?=$c?>" value="<?=$view_item['emp_id']?>"></td>
                                                 <td><?=$view_item['name']?></td>
                                                 <td><?=$view_item['dept_sec']?></td>
                                                 <td><?=$view_item['clg_desg']?></td>
                                                 <td><?=$view_item['desg']?></td>
                                                 
                                                 <td><select  name="v_desg" id="desg_<?=$c?>" class="form-control" tabindex="-1" list="namelist">
                                                     <option valuee="">--Choose System Designation---</option>
                                                     <option value="ADMIN">ADMIN</option>
                                                     <option value="DIRECTOR">DIRECTOR</option>
                                                     <option value="STOCK_ADMIN">STOCK ADMIN</option> 
                                                     <option value="HOD">HOD</option> 
                                                     <option value="DEPT_IN_CHARGE">DEPARTMENT INCHARGE</option> 
                                                     <option value="FACULTY">FACULTY</option> 
                                                     <option value="ACCOUNTS_OFFICER">ACCOUNTS OFFICER</option> 
                                                     <option value=<option value="ACCOUNTANT">CASHIER</option>
                            </select></td>
                                                 <td><input type="button" class="btn btn-xs btn-primary update " id="update_<?=$c?>" name="update" value="Update" onclick="var udesg=document.getElementById('desg_<?=$c?>').value; var ueid=document.getElementById('empid<?=$c?>').value; if(udesg){$('#desg_up_msg').load('up_desg.php?ueid='+ueid+'&uedesg='+udesg); setTimeout(location.reload.bind(location), 2000); }"></td>
                                            </tr>
                                      <?php
                                      $c++;
                                  }
                            ?>
        </tbody>
            </table><?php
   
      }
            else{
                
             include './view_update_desg.php';
            }
            ?>
                                                 
              </div>
            </div>
          </div>
        </div><br/>
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
 
<?php
    include './footer.php';
?>

                 
    
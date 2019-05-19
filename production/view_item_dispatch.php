<?php
include './header.php';
include './class/db_connect.php';                                  
?>
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

              <div class="container">
              <form method="post">
                    <input type="hidden" name="pop" value="7">
                    <table class="table">
                        <tr class="info">
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
                    <table class="table">
                        <tr class="info">
                            <td>Category Name
                                <input type="hidden" name="v_c_name" id="v_c_name" class="form-control" list="namelist">
                                <datalist id="namelist"></datalist>
                                <select name="v_c_name_db" id="v_c_name_db" class="select2_single form-control" onclick="set_value(this.value)">
                                    <option>Select category</option>
                                    <?php
                                         $query1= mysqli_query($link,"SELECT c_name,c_code from category_master");
                                         while($r1= mysqli_fetch_array($query1))
                                         {
                                    ?>
                                    <option value="<?= $r1['c_name'].'|'.$r1['c_code']?>"><?=$r1['c_name']?></option>
                                         
                                    <?php 
                                        }
                                    ?>
                                </select>
                                
                            </td>
                             <td>Search Item:
                                <select id="search_item" name="search_item" class="select2_single form-control" onclick="set_item(this.value)">
                                </select>
                              <!--<input type="text" name="v_sc_name" id="v_sc_name" class="form-control" list="namelist1" onkeyup="">-->
                           <!-- <datalist id="namelist1"></datalist>-->
                           <input type="hidden" name="v_sc_name" id="v_sc_name"
                                  class="form-control" list="namelist1" onkeyup="">
                            </td>
                            <td>Fund Type:
                               <!-- <input type="hidden" name="v_f_type" id="v_f_type" class="form-control" list="namelist2">-->
                            <datalist id="namelist2"></datalist>
                            <select id="v_f_type" name="v_f_type" class="select2_single form-control" onclick="">
                                <option></option>
                                <?php
                                    $query2=mysqli_query($link,"SELECT fund FROM dept_inc_req GROUP BY fund");
                                    while($r2= mysqli_fetch_array($query2))
                                    {
                                ?>
                                <option value="<?=$r2['fund']?>"><?=$r2['fund']?></option>
                                <?php
                                    }
                                ?>
                                
                            </select>
                            
                            </td>
                        </tr>
                        
                    </table>
                    <table class="table">
                        <tr class="info">
                            <td>From Date: <div class='input-group date' id='startdate'>
                            <input type='text' id="f_date" name="f_date" class="form-control" />
                            <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div></td>
                            <td>To Date: <div class='input-group date' id='enddate'>
                            <input type='text' id="t_date" name="t_date" class="form-control" />
                            <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div></td>
                        </tr>
                    </table>
                    <center><input type="submit" name="search" class="btn btn-sm btn-primary" value="Search"></center>
                  </form>
              </div><br/>
               <?php
            if(isset($_POST['search'])){
                $sql .= "select d.*, cm.c_name from dept_inc_req as d, category_master as cm  where d.c_code=cm.c_code and stock_app=1";
              /*  $sql .= "select * from dispatch_view where rq_sl_no>0";*/
      if ( $_POST['vd_dept'] !="" ){
           $sql .= " AND gen_by_dept = '" . $_POST['vd_dept']."'";
      }          

      if ( $_POST['v_c_name'] !="" ){
           $sql .= " AND c_name = '" . $_POST['v_c_name']."'";
      }

      if ( $_POST['v_sc_name'] !="" ){
           $sql .= " AND sc_name = '" . $_POST['v_sc_name']."'";
      }
      
      if ( $_POST['v_f_type'] !="" ){
           $sql .= " AND fund = '" . $_POST['v_f_type']."'";
      }
      if ( $_POST['f_date'] !="" && $_POST['t_date'] !=""){
           $sql .= " AND stock_app_date BETWEEN '".$_POST['f_date']."' AND '".$_POST['t_date']."' ";
      }
      
      $sql .=" LIMIT 0,5";
      //echo $sql;
       ?>
      <table class="table table table-striped jambo_table table-hover table-responsive table-bordered">
        <thead>
            <tr class="headings">
            <!--th width="8%">Action</th-->
        <!--th>slip no</th-->
        <th>Department</th>
        <th>Category Name</th>
        <th>Item Name</th>
        <th>Fund Type</th>
        <th>Maker</th>
        <th>Description</th>
        <th>unit</th>
        <th> Disp Description</th>
        <th>Dispatch Quantity</th>
        <th>Approval Dtae</th>
        <!--th>Entry Date</th-->
        </tr>
        </thead>
        <tbody>
            <?php
            // if($num_item>0)
                           // {
                                $items= mysqli_query($link,$sql);
                               // $count=1;
                                while($view_item = mysqli_fetch_array($items)) {
                                    //if(($view_item['hod_deptinc_app']==0)&&($view_item['hod_dir_app']==0))
                                    //{
                                       ?>
                                    <tr id="even" class="even pointer">
                                   <!--td class="a-center "><input type="checkbox"  id="table_records_<?=$count?>" name="table_records" value="even_<?=$count?>||<?=$view_item['rq_sl_no']?>"></td>
                               td><?=$count?></td-->
                                                 <td><?=$view_item['gen_by_dept']?></td>
                                                 <td><?=$view_item['c_name']?></td>
                                                 <td><?=$view_item['sc_name']?></td>
                                                 <td><?=$view_item['fund']?></td>
                                                 <td><?=$view_item['mat_maker']?> </td>
                                                 <td><?=$view_item['mat_des']?></td>
                                                 <td><?=$view_item['mat_unit']?></td>
                                                 <td><?=$view_item['disp_des']?></td>
                                                 <td><?=$view_item['disp_qty']?></td>
                                                 <td><?=$view_item['stock_app_date']?></td>
                                            </tr>
                                      <?php
                                  }
                              // }
                           // }
                            ?>
        </tbody>
            </table><?php
    //  include './viewentrytable.php';
      }
            else{
                
             include './viewdispatchtable.php';
            }
            ?>
              </div>
            </div>
          </div>
        </div>

         
                 <!-- /page content -->
<?php
    include './footer.php';
?>

                  <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
                  
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    
    <script>
    
    $('#startdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#enddate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
        
        
    function set_value(value)
    {
        //alert('0');
        var actval=value.split('|');
        document.getElementById('v_c_name').value=actval[0];
        $('#search_item').load('ajax_item_list.php?cat='+actval[1]);
    }
    
    function set_item(value)
    {
        var search=value;
        document.getElementById('v_sc_name').value=search;
    }
    
</script>
<link href="select2-3.5.3/select2.css" rel="stylesheet" />
    <script src="select2-3.5.3/select2.js"></script>
    <script>
    $(document).ready(function() {
  $("#search_item").select2();
});
    </script>
<?php
include './class/db_connect.php';
include './header.php';
                                     
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
                    <h3>Your Requisition Details<small> Item you have requested</small></h3>
                  </div>
                 <div class="col-md-6"></div>
                </div>
                  <p><h4>Search Here</h4></p><br/>
              <div class="container">
              <form method="post">
                    <input type="hidden" name="pop" value="7">
                    
                    <table class="table">
                        <tr class="info">

                        
                            <td>Category Name
                                <input type="hidden" name="v_c_name" id="v_c_name" class="form-control" list="namelist">
                                <datalist id="namelist"></datalist>
                                <select name="v_c_name_db" id="v_c_name_db" class="select2_single form-control" onclick="set_value(this.value)">
                                    <option></option>
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
                            
                            <!--<td>Fund Type:
                               
                            <datalist id="namelist2"></datalist>
                            <select id="v_f_type" name="v_f_type" class="select2_single form-control" >
                                <option></option>
                                <?php
                                    $query2=mysqli_query($link,"SELECT fund FROM item_entry_data GROUP BY fund");
                                    while($r2= mysqli_fetch_array($query2))
                                    {
                                ?>
                                <option value="<?=$r2['fund']?>"><?=$r2['fund']?></option>
                                <?php
                                    }
                                ?>
                                <option>
                                    
                                </option>
                            </select>
                            
                            </td>-->
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
                $sql .= "SELECT * FROM old_stock";
     
      if ( $_POST['v_c_name'] !="" ){
           $sql .= " WHERE o_c_name = '" . $_POST['v_c_name']."'";
      }

      if ( $_POST['v_sc_name'] !="" ){
           $sql .= " AND o_sc_name = '" . $_POST['v_sc_name']."'";
      }
      
      
      if ( $_POST['f_date'] !="" && $_POST['t_date'] !=""){
           $sql .= " AND o_e_date BETWEEN '".$_POST['f_date']."' AND '".$_POST['t_date']."' ";
      }
      
      $sql .=" LIMIT 0,5";
      echo $sql;
      
       ?>
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
                                $oitems= mysqli_query($link,$sql);
                               // $count=1;
                                $s=1;
                                while($oview_item = mysqli_fetch_array($oitems)) {
                                    //if(($view_item['hod_deptinc_app']==0)&&($view_item['hod_dir_app']==0))
                                    //{
                                       ?>
                                    <tr id="even" class="even pointer">
                                   <td><?= $s?></td>
                                                  
                                                  <td><?=$oview_item['o_c_name']?></td>
                                                  <td><?= $oview_item['o_sc_anme']?></td>
                                                 <td><?=$oview_item['o_fund']?></td>
                                                 <td><?=$oview_item['o_maker']?></td>
                                                 <td><?=$oview_item['o_model_no']?> </td>
                                                 <td><?=$oview_item['o_des']?></td>
                                                  <td><?=$oview_item['o_qty']?></td>
                                                 <td><?=$oview_item['o_unit']?></td>
                                                 <td><?=$oview_item['o_uprice']?></td>
                                                 <td><?=$oview_item['o_tprice']?></td>
                                                 <td><?=$oview_item['o_p_date']?></td>
                                                 <td><?=$oview_item['o_e_date']?></td>
                                                 <td><?=$oview_item['o_disp_dept']?></td>
                                                 <td><?=$oview_item['o_disp_date']?></td>
                                            </tr>
                                      <?php
                                      $s++;
                                  }
                              // }
                           // }
                            ?>
        </tbody>
            </table><?php
    //  include './viewentrytable.php';
      }
            else{
                
             include './view_old_stock.php';
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
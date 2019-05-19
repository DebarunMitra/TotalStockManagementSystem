<?php
include './header.php';
                                     
?>
<script>
    function specialch(ch)
                         {
                             //alert("yes");
                             var l=/[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
                                     ///\W|_/g;
                             if(ch.match(l))
                             {
                                 alert("ONLY ALPHABETS ARE ALLOWED!");
                                 document.getElementById('demo-form2').reset();
                             }
                             else
                                 return true;
                         }
                         
</script>
        <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Entry Item's <small>add item into stock</small></h3>
                  </div>
                 <div class="col-md-6">
                  </div>
                </div>
                  <script>
                  function set_value(value)
            {
                //alert ('ok');
               var actval=value.split('|');
               document.getElementById('o_c_name').value=actval[0];
               document.getElementById('o_c_code').value=actval[1];
                $('#o_sc_name_db').load('ajax_item_list.php?cat='+actval[1]);
            //    alert(actval[0]);
              //    alert(actval[1]);
            }
            function set_item(value)
    {
        var search=value;
        document.getElementById('o_sc_name').value=search;
    }
            </script>
                  <form id="ief" method="post" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="category-name">Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                            <input type="hidden" id="o_c_name" name="o_c_name" class="form-control"  >
                            <select required="" id="o_c_name_db" name="o_c_name_db" class="form-control" onchange="set_value(this.value)">
                                <option value="">--Select--</option>
                                <?php
                                    //echo category_name($link)
                                $oq= mysqli_query($link,"select c_name,c_code from category_master");
                                while($fetch_oq= mysqli_fetch_array($oq)){
                                ?>
                                <option value="<?=$fetch_oq['c_name'].'|'.$fetch_oq['c_code']?>"><?=$fetch_oq['c_name']?></option>
                                <?php
                                //echo $oq;
                                }
                                
                                ?>
                            </select> 
                      </div>
                         <label class="control-label col-md-2 col-sm-3 col-xs-6" for="subcategory-name">Subcategory Name <span class="required">*</span>
                        </label>
                          <div class="col-md-2 col-sm-6 col-xs-6">
                        <select id="o_sc_name_db" name="o_sc_name_db" class="select2_single form-control" onclick="set_item(this.value)">
                                </select>
                              <!--<input type="text" name="v_sc_name" id="v_sc_name" class="form-control" list="namelist1" onkeyup="">-->
                           <!-- <datalist id="namelist1"></datalist>-->
                           <input type="hidden" name="o_sc_name" id="o_sc_name"
                                  class="form-control" list="namelist1" onkeyup="">                        
                          </div>
                        
                            <input type="hidden"  id="o_c_code" name="o_c_code" readonly="" class="form-control">
                     
                    </div>
                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Entry Fund:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                            <select id="o_fund" name="o_fund" class="form-control">
                                <option value="None">--select--</option>
                                <option value="CLJF">College Fund</option>
                                <option value="TEQIP-I">Technical Education Quality Improvement Programme (TEQIP-I)</option>
                                <option value="TEQIP-II">Technical Education Quality Improvement Programme (TEQIP-II)</option>                     
                             <option value="TEQIP-III">Technical Education Quality Improvement Programme (TEQIP-III)</option>
                            </select>
                        </div> 
                      </div>
                         
                      <div class="form-group">
                        <label for="o_maker" class="control-label col-md-3 col-sm-3 col-xs-12">Item Maker</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="o_maker" class="form-control col-md-7 col-xs-12" type="text" name="o_maker" onkeyup="specialch(this.value)" placeholder="Only alphabets and numbers allowed">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="o_model_no" class="control-label col-md-3 col-sm-3 col-xs-12">Model No</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="o_model_no" class="form-control col-md-7 col-xs-12" type="text" name="o_model_no"  placeholder="Only alphabets and numbers allowed">
                        </div>
                      </div>
                <div class="form-group">
                        <label for="o_des" class="control-label col-md-3 col-sm-3 col-xs-12">Item Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="o_des" class="form-control col-md-7 col-xs-12" type="text" name="o_des" >
                        </div>
                      </div>
              
                      <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-3" for="item-quantity">Item Quantity <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                          <input type="number" id="o_qty" name="o_qty" min="1" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                          <label class="control-label col-md-2 col-sm-3 col-xs-3" for="item-unit">Unit <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                          <!--input type="text" id="i_unit" name="i_unit" required="required" onchange="cal_tprice()" class="form-control col-md-7 col-xs-12"-->
                        <select id="o_unit" name="o_unit" class="select2_single form-control" tabindex="-1">
                             <option>--Select--</option>
                            <option value="lit">lit</option>
                            <option value="ml">ml</option>
                            <option value="kg">kg</option>
                            <option value="gm">gm</option>
                            <option value="meter">meter</option>
                            <option value="foot">foot</option>
                            <option value="pices">pices</option>
                            <option value="coil">coil</option>
                            <option value="rim">rim</option>
                            <option value="pkt">pkt</option>
                            </select>
                        
                        </div>
                          
                      </div>
                      
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="o_uprice">Unit Item Price  <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                          <input type="text" id="o_uprice" name="o_uprice" required="required" onkeyup="cal_tprice()" class="form-control col-md-7 col-xs-12" />
                        </div> 
                            <label class="control-label col-md-2 col-sm-1 col-xs-6" for="total-price">Total Price  <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <input type="text" id="o_tprice" name="o_tprice" required="required" readonly="" class="form-control col-md-7 col-xs-12">
                        </div>
                         </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="o_p_date">Item Purcahse Date   <span class="required">*</span>
                        </label>
                  <div class="col-md-2 col-sm-2 col-xs-6">
                      <div class='input-group date' id='p_date'>
                          <input type='text' id="o_p_date" name="o_p_date" class="form-control" required="" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                           
                        </div>
                   <label class="control-label col-md-2 col-sm-3 col-xs-6" for="o_e_date">Item Entry Date  <span class="required">*</span>
                        </label>
                           <div class="col-md-2 col-sm-2 col-xs-6">
                      <div class='input-group date' id='e_date'>
                            <input type='text' id="o_e_date" name="o_e_date" class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                           
                        </div>
                    </div>
                           <div class="form-group">
                        
                 
                  
                    </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="o_disp_dept">Dispatched to Depatment  <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                          <select id="o_disp_dept" name="o_disp_dept" class="select2_single form-control" tabindex="-1">
                             <option >Choose Department</option>
                            <option value="AS">Account section</option>
                            <option value="EC">Examination Cell</option>
                            <option value="MU">Medical Unit</option>
                            <option value="EE">Electrical Engineering Department</option>
                            <option value="ECE">Electronics Engineering Department</option>
                            <option value="CE">Civil Engineering Department</option>
                            <option value="CSE">Computer Science & Engineering Department</option>
                            <option value="ME">Mechanical Engineering Department</option>
                       </select>
                        
                        </div> 
                            <label class="control-label col-md-2 col-sm-3 col-xs-6" for="o_disp_date">Dispatched Date  <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                            <div class='input-group date' id='disp_date'>
                          <input type='text' id="o_p_date" name="o_p_date" class="form-control" required="" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                         </div>
                 <div class="ln_solid"><br/>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center><button class="btn btn-success" name="sub" type="submit">Save</button></center>
                        </div>
                      </div>
            </div>
                  </form><br/>
                   <?php
                        if(isset($_POST['sub'])){
                           //echo $_POST['o_c_name'];
                           //echo $_POST['o_sc_name_db'];
                                     $q="INSERT INTO `old_stock` (`o_c_name`, `o_sc_name`,`o_fund` ,`o_maker`, `o_model_no`, `o_des`, `o_qty`,`o_unit` ,`o_uprice`, `o_tprice`,`o_p_date`, `o_e_date`, `o_disp_dept`, `o_disp_date`) VALUES"
                                            . " ('".$_POST['o_c_name']."','".$_POST['o_sc_name']."','".$_POST['o_fund']."','".$_POST['o_maker']."','".$_POST['o_model_no']."','".$_POST['o_des']."',"
                                            . "'".$_POST['o_qty']."','".$_POST['o_unit']."','".$_POST['o_uprice']."','".$_POST['o_tprice']."','".$_POST['o_p_date']."','".$_POST['o_e_date']."','".$_POST['o_disp_dept']."','".$_POST['o_disp_date']."')";
                                            $exe= mysqli_query($link,$q) or die(mysqli_error($link));
                                            echo '<center><font color="green">Data Saved Successfully.</font></center>';
                            //echo '<meta http-equiv="refresh" content="0; url=addcategory.php" />';
                            
                        }
                    ?>
                  
              </div>
            </div>
          </div>
        </div>

                 <!-- /page content -->
    <script>
                        /*function set_value_sub(value){
                           var actval=value.split('|');
                           document.getElementById('sc_name').value=actval[0];
                           document.getElementById('sc_code').value=actval[1];
                        }*/
                        
                        function cal_tprice(){
                            var price=document.getElementById("o_uprice").value;
                            var qty=document.getElementById("o_qty").value;
                            document.getElementById("o_tprice").value=price*qty;
                        }
                        
                         if ( window.history.replaceState ) {
                          window.history.replaceState( null, null, window.location.href );
                         }
</script>
<?php
    include './footer.php';
?>
 <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
                  
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script>
 
    $('#p_date').datetimepicker({
         format : 'YYYY-MM-DD'
    });
    $('#e_date').datetimepicker({
         format : 'YYYY-MM-DD'
    });
     $('#disp_date').datetimepicker({
         format : 'YYYY-MM-DD'
    });
</script>
<link href="select2-3.5.3/select2.css" rel="stylesheet" />
    <script src="select2-3.5.3/select2.js"></script>
    <script>
    $(document).ready(function() {
  $("#o_sc_name_db").select2();
});
    </script>
<?php
include './header.php';
  
$curr_q= mysqli_query($link,"SELECT max(i_id) FROM item_entry_data");
//$curr_no= mysqli_num_rows($curr_q);
$curr_no= mysqli_fetch_array($curr_q);
if(!$curr_no[0])
        {
            $curr_no[0]=0;
        }
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
                         function e_code()
                         {
                            // alert('ok');
                             var did,ndid,today,dd,mm,yyyy,fund,ic,ecode;
                             did=<?=$curr_no[0]?>;
                             ndid=did+1;
                            // alert(ndid);
                             today = new Date();
                              dd = String(today.getDate()).padStart(2, '0');
                              mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                               yyyy = today.getFullYear();

                                today = yyyy + '/' + mm + '/' + dd;
                              // document.write(today)
                             // alert(today);
                             fund=document.getElementById('iftype').value;
                           //  ic=document.getElementById('sc_code').value;
                            // ecode=fund+'/'+ic+'/'+today+'/'+ndid;
                             ecode=fund+'/'+today+'/'+ndid;
                             document.getElementById('ie_code').value=ecode;
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
                  <?php// echo $curr_no[0]; ?>
                  <form id="ief" method="post" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="category-name">Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                            <input type="text" id="c_name" name="c_name" class="form-control" readonly="" value='<?=$_GET['icn']?>'>
                      </div>
                          <label class="control-label col-md-2 col-sm-3 col-xs-6" for="category-code">Category Code <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-6">
                            <input type="text" id="c_code" name="c_code" class="form-control" readonly="" value='<?=$_GET['icc']?>'>
                      </div>
                    </div>
                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Entry Fund:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                            <select required="" id="iftype" name="iftype" class="form-control">
                                <option value="">--select--</option>
                                <option value="CLJF">College Fund</option>
                                <option value="TEQIP-I">Technical Education Quality Improvement Programme (TEQIP-I)</option>
                                <option value="TEQIP-II">Technical Education Quality Improvement Programme (TEQIP-II)</option>                     
                             <option value="TEQIP-III">Technical Education Quality Improvement Programme (TEQIP-III)</option>
                            </select>
                        </div> 
                      </div>
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="subcategory-name">Subcategory Name <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                         <input type="hidden" id="sc_name" name="sc_name" class="form-control">
                            <select required="" id="subcategory-name_db" name="sc-name_db" class="form-control" onchange="set_value_sub(this.value)">
                                <option value="">--Select--</option>
                                <?php
                                    //echo category_name($link)
                                $q1= mysqli_query($link,"select sc_name,sc_code from subcategory_master where sc_c_code='".$_GET['icc']."'");
                                while($r1= mysqli_fetch_array($q1)){
                                ?>
                                <option value="<?=$r1['sc_name'].'|'.$r1['sc_code']?>"><?=$r1['sc_name']?></option>
                                <?php
                                }
                                ?>
                            </select>
                         </div>

                        <label class="control-label col-md-2 col-sm-3 col-xs-6" for="entry_code">Item Entry Code <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                            <input type="text" id="ie_code" name="ie_code" readonly="" class="form-control col-md-7 col-xs-12">
                        </div>
                                                      <!--label class="control-label col-md-2 col-sm-3 col-xs-6" for="sc_code">Subcategory Code <span class="required">*</span>
                        </label-->
                        <div class="col-md-2 col-sm-2 col-xs-6">
                            <input type="hidden" id="sc_code" name="sc_code" readonly="" class="form-control col-md-7 col-xs-12">
                        </div>
              </div>
                                    <div class="form-group">
                        <label for="i_maker" class="control-label col-md-3 col-sm-3 col-xs-12">Item Maker</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="i_maker" class="form-control col-md-7 col-xs-12" type="text" name="i_maker" onkeyup="specialch(this.value)" placeholder="Only alphabets and numbers allowed">
                        </div>
                      </div>
                <div class="form-group">
                        <label for="i_des" class="control-label col-md-3 col-sm-3 col-xs-12">Item Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="i_des" class="form-control col-md-7 col-xs-12" type="text" name="i_des" >
                        </div>
                      </div>
               <div class="form-group">
                        <label for="i_model" class="control-label col-md-3 col-sm-3 col-xs-12">Item Model No</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="i_model" class="form-control col-md-7 col-xs-12" type="text" name="i_model" onkeyup="specialch(this.value)" placeholder="Only alphabets and numbers allowed">
                        </div>
                      </div>
                      <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-3" for="item-quantity">Item Quantity <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <input type="number" id="i_qty" name="i_qty" min="0" max="10000" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                          <label class="control-label col-md-2 col-sm-3 col-xs-3" for="item-unit">Unit <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                          <!--input type="text" id="i_unit" name="i_unit" required="required" onchange="cal_tprice()" class="form-control col-md-7 col-xs-12"-->
                        <select required="" id="i_unit" name="i_unit" class="select2_single form-control" tabindex="-1">
                             <option value="">--Select--</option>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="i_price">Unit Item Price  <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                          <input type="text" id="i_price" name="i_price" required="required" onkeyup="cal_tprice()" onchange="e_code()"  class="form-control col-md-7 col-xs-12" />
                        </div> 
                            <label class="control-label col-md-2 col-sm-1 col-xs-6" for="total-price">Total Price  <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <input type="text" id="t_price" name="t_price" required="required" readonly="" class="form-control col-md-7 col-xs-12">
                        </div>
                         </div>
                           <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="i_p_date">Item Purcahse Date   <span class="required">*</span>
                        </label>
                  <div class="col-md-2 col-sm-2 col-xs-6">
                      <div class='input-group date' id='p_date'>
                          <input type='text' id="i_p_date" name="i_p_date" class="form-control" required="" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                           
                        </div>
                   <label class="control-label col-md-2 col-sm-3 col-xs-6" for="i_e_date">Item Entry Date  <span class="required">*</span>
                        </label>
                           <div class="col-md-2 col-sm-2 col-xs-6">
                      <div class='input-group date' id='e_date'>
                            <input required="" type='text' id="i_e_date" name="i_e_date" class="form-control" />
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
                           
                                     $q="INSERT INTO `item_entry_data` (`i_c_name`, `i_c_code`,`fund` ,`i_sc_name`, `i_sc_code`, `i_maker`, `i_des`, `i_model_no`, `i_qty`,`i_unit` ,`i_price_unit`, `i_t_price`,`i_p_date`, `i_e_date`,`i_e_id`) VALUES"
                                            . " ('".$_POST['c_name']."','".$_POST['c_code']."','".$_POST['iftype']."','".$_POST['sc_name']."','".$_POST['sc_code']."','".$_POST['i_maker']."','".$_POST['i_des']."','".$_POST['i_model']."',"
                                            . "'".$_POST['i_qty']."','".$_POST['i_unit']."','".$_POST['i_price']."','".$_POST['t_price']."','".$_POST['i_p_date']."','".$_POST['i_e_date']."','".$_POST['ie_code']."')";
                                            $exe= mysqli_query($link,$q) or die(mysqli_error($link));
                                            echo '<center><font color="green">Data Saved Successfully.</font></center>';
                          //  echo '<meta http-equiv="refresh" content="0; url=item_entry_form.php" />';
                            
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
                 
    
    $('#p_date').datetimepicker({
         format : 'YYYY-MM-DD'
    });
    $('#e_date').datetimepicker({
         format : 'YYYY-MM-DD'
    });
    
    function set_value_sub(value){
                           var actval=value.split('|');
                           document.getElementById('sc_name').value=actval[0];
                           document.getElementById('sc_code').value=actval[1];
                        }
                        
                        function cal_tprice(){
                            var price=document.getElementById("i_price").value;
                            var qty=document.getElementById("i_qty").value;
                            document.getElementById("t_price").value=price*qty;
                        }
                        
                        if ( window.history.replaceState ) {
                          window.history.replaceState( null, null, window.location.href );
                         }

</script>

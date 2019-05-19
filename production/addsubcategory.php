<?php
include './header.php';
include './class/db_connect.php';

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

                <!--div class="row x_title">
                  
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel"-->
                  <div class="row x_title">
                      <div class="col-md-6">
                    <h3>ADD SUB-CATEGORY <small>Stock Management System</small></h3>
                    <!--ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                      </li>
                    </ul-->
                    <!--div class="clearfix"></div-->
                  </div>
                  </div>
                  <!--div class="x_content">
                    <br /-->
        <script>
            function set_value(value)
            {
               var actval=value.split('|');
               document.getElementById('c_name').value=actval[0];
               document.getElementById('sc_c_code').value=actval[1];
            }
        </script>  
                    <form method="post" id="demo-form2"  class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="c_name">Category Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="c_name" id="c_name" class="form-control" >
                            <select required="" id="c_name_db" name="c_name_db" class="form-control" onchange="set_value(this.value)">
                                <option value="">--Select--</option>
                                <?php
                                    //echo category_name($link)
                                $q1= mysqli_query($link,"select c_name,c_code from category_master");
                                while($r1= mysqli_fetch_array($q1)){
                                ?>
                                <option value="<?=$r1['c_name'].'|'.$r1['c_code']?>"><?=$r1['c_name']?></option>
                                <?php
                                }
                                ?>
                            </select> 
                      </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sc_c_code">Category Code <span class="required">*</span>
                        </label>
                        <div   class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text"  id="sc_c_code" name="sc_c_code" readonly="" class="form-control">
                                <!--div id="c_code">
                                      <select required="" id="ssc_c_code" name="sc_c_code" class="form-control col-md-7 col-xs-12">
                                <option value="">--NONE--</option>
                                <?php
                                   // echo category_code($link);
                                ?>
                                                                </select>
                             </div-->
                        </div>
                      </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sc_name">Sub-Category Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="sc_name" id="sc_name" required="required" class="form-control col-md-7 col-xs-12" onkeyup="specialch(this.value)" placeholder="Only alphabets and numbers allowed">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sc_code">Sub-Category Code <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  id="sc_code" name="sc_code" required="required" class="form-control col-md-7 col-xs-12" onkeyup="specialch(this.value)" placeholder="Only alphabets and numbers allowed">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="c_des" class="control-label col-md-3 col-sm-3 col-xs-12">Sub-Category Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" id="sc_des" name="sc_des" class="form-control col-md-7 col-xs-12" onkeyup="specialch(this.value)" placeholder="Only alphabets and numbers allowed">
                        </div>
                      </div>
                        <center>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="submit" id="c_save" name="sub" value="SAVE" class="btn btn-primary">
                        </div>
                      </div>
                        </center>
                    </form><br/>
                     <?php
                        if(isset($_POST['sub'])){
                            $sql_scname="SELECT * FROM subcategory_master where sc_name='".$_POST['sc_name']."'";
                            $sql_sccode="SELECT * FROM subcategory_master where sc_code='".$_POST['sc_code']."'";
                            $q_scname=mysqli_query($link,$sql_scname);
                            $q_sccode=mysqli_query($link,$sql_sccode);
                            $q_scnamecount=mysqli_num_rows($q_scname);
                            $q_sccodecount=mysqli_num_rows($q_sccode);
                            if($q_scnamecount>0)
                                echo '<center><font color="red"> Subcategory name already added </font></center>';
                            if($q_sccodecount>0)
                                echo '<center><font color="red"> Subcategory code already added </font></center>';
                            else
                            {
                                 $q="INSERT INTO `subcategory_master` (`sc_c_code`, `sc_name`, `sc_code`,`sc_des`) VALUES ('".$_POST['sc_c_code']."','".$_POST['sc_name']."','".$_POST['sc_code']."','".$_POST['sc_des']."')";
                            $exe= mysqli_query($link,$q) or die(mysqli_error($link));
                            echo '<center><font color="green">Data Saved Successfully.</font></center>';
                           // echo '<meta http-equiv="refresh" content="0; url=addsubcategory.php" />';
                            }
                           
                        }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- end form -->
              <!--/div>
            </div>
          </div>
        </div>
        </div>
          <br /-->
<script>
 if ( window.history.replaceState ) {
                          window.history.replaceState( null, null, window.location.href );
                         }
</script>
                 <!-- /page content -->
<?php
    include './footer.php';
?>
           
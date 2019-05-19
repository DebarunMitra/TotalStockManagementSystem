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
                    <h3>ADD CATEGORY <small>different form elements</small></h3>
                    
                   
                  </div>
                      
                  </div>
                 
                    <form method="post" id="demo-form2"  class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="c_name">Category Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="c_name" id="c_name" required="required" class="form-control col-md-7 col-xs-12" onkeyup="specialch(this.value)" placeholder="Only alphabets and numbers allowed">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="c_code">Category Code <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  id="c_code" name="c_code" required="required" class="form-control col-md-7 col-xs-12" onkeyup="specialch(this.value)" placeholder="Only alphabets and numbers allowed">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="c_des" class="control-label col-md-3 col-sm-3 col-xs-12" >Category Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" id="c_name" name="c_des" class="form-control col-md-7 col-xs-12" onkeyup="specialch(this.value)" placeholder="Only alphabets and numbers allowed">
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
                            if (strpos($_POST['c_name'], '|') !== false) {
                                echo '<center><font color="red"> | charecter is not allowed.</font></center>';
                            //echo '<meta http-equiv="refresh" content="0; url=addcategory.php" />';
                            }
                            
                            $sql_cname="SELECT * FROM category_master where c_name='".$_POST['c_name']."'";
                            $sql_ccode="SELECT * FROM category_master where c_code='".$_POST['c_code']."'";    
                            $q_cname=mysqli_query($link,$sql_cname);
                            $q_cnamecount=mysqli_num_rows($q_cname);
                            $q_ccode=mysqli_query($link,$sql_ccode);
                            $q_ccodecount=mysqli_num_rows($q_ccode);
                            if($q_cnamecount>0 || $q_ccodecount>0)
                                 echo '<center><font color="red"> Category already added.</font></center>';
                           
                             else{
                            $q="INSERT INTO `category_master` (`c_name`, `c_code`, `c_des`) VALUES ('".$_POST['c_name']."','".$_POST['c_code']."','".$_POST['c_des']."')";
                            $exe= mysqli_query($link,$q) or die(mysqli_error($link));
                            echo '<center><font color="green">Data Saved Successfully.</font></center>';
                            //echo '<meta http-equiv="refresh" content="0; url=addcategory.php" />';
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
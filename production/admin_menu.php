            <!-- /menu profile quick info -->
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                  <h3>
                      <ul class="list-unstyled user_data">
                        
                        <li class="m-top-xs">
                          <i class="fa fa-star user-profile-icon"></i>
                          <?= $_SESSION['smsdesg']?>&nbsp;&nbsp;&nbsp<?php echo ',';?><?=$_SESSION['smsdept_sec']?>
                        </li>
                      </ul>
                  </h3>
                <ul class="nav side-menu">
                   
                    <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                    <li><a><i class="fa fa-edit"></i> Employee Details <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <!--<li><a href="registration.php">Registration Form</a></li>-->
                       <li><a href="useradd.php">Add User</a></li>
                       <li><a href="update_desg.php">Details</a></li>
                    </ul>
                  </li>
                                     
                  
                  <li><a><i class="fa fa-plus-circle"></i> Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="addcategory.php">Add Category</a></li>
                        <li><a href="addsubcategory.php">Add Subcategory</a></li>
                    </ul>
                  </li>
                  <li><a href="itemregister.php"><i class="fa fa-edit"></i> Item Register <!--<span class="fa fa-chevron-down"></span>--></a>
                    <!--<ul class="nav child_menu">
                        <li><a href="add_item.php">Add Item</a></li>
                        
                    </ul>--->
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <!--<li><a href="registration.php">Registration Form</a></li>-->
                      <li><a href="item_entry_form.php">Item Entry Form</a></li>
                      <li><a href="old_stock_entry.php">Old stock entry</a></li>
                      <li><a href="requisition_1.php">Requisition Slip</a></li>
                      <li><a href="dept_requisition.php">DEPT Requisition Slip</a></li>
                    </ul>
                  </li>
                  <li><a><i  class="fa fa-envelope-o"></i> View Requisition <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                      <!--<li><a href="registration.php">Registration Form</a></li>-->
                     
                    <li><a href="fac_req_app.php" >Approve Reuisition</a>
                    <li><a href="item_approval.php" >DEPT Requisition Request</a>
                        <li><a href="req_request.php" >Requisition Request</a>
                          <!--i class="fa fa-envelope-o"  class="fa fa-edit"></i--></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cubes"></i> View Stock <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                      <!--<li><a href="registration.php">Registration Form</a></li>-->
                      <li><a href="view_item_entry.php" >Item Entry Stock</a>
                      <li><a href="view_item_dispatch.php" >Item Dispatch Stock</a>
                          <li><a href="old_stock.php">Old Stock</a></li>
                          <li><a href="available_stock.php">Available Stock</a></li>
                      <!--li><a href="req_request.php" >Requisition Request</a-->
                          <!--i class="fa fa-envelope-o"  class="fa fa-edit"></i--></li>
                    </ul>
                  </li>
                  <li><a href="req_details.php"><i class="fa fa-eye"></i>Your requisitions</a></li>
                  <li><a href="fac_req_details.php"><i class="fa fa-edit"></i>Faulty requisitions</a></li>
                  
                  <li><a><i class="fa fa-cubes"></i>Dispatched Code <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                      <li><a href="generate_code.php" >Generate Code</a>
                      <!--li><a href="view_item_dispatch.php" >Item Dispatch Stock</a>
                          <li><a href="old_stock.php">Old Stock</a></li>
                          <li><a href="available_stock.php">Available Stock</a></li-->
                    </ul>
                  </li>
                  
                  <!--<li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                </ul>-->
                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->

            <!--menu footer buttons -->
             <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="About">
                <span class="glyphicon glyphicon-font" aria-hidden="true"></span>
              </a>
                <a data-toggle="tooltip" data-placement="top" title="Edit Profile" href="edit_profile.php">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
              </a>

              <a data-toggle="tooltip" data-placement="top" title="Help">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              </a>
                              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="images/biet.jpg" alt=""><?php echo $_SESSION['smsname']; ?>
                    <span class=" fa fa-angle-down"></span>
                    </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="edit_profile.php"> Profile</a></li>
                     
                    <li>
                      <!--a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a-->
                    </li>
                    <li><a href="#">Help</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul> 
                </li> 
                <!--faculty requisition start-->
                    <?php
                   // echo $_SESSION['smsdept_sec'];
                        $req="select * from user_requisition where gen_by_dept='CE' AND gen_by_app=1 AND hod_deptinc_app=0 AND hod_dir_app=0 AND gen_date <= now()";
                         $exe_req= mysqli_query($link, $req);
                         $msg=0;$num[0]=0;$i=0;$j=0;
                         $exe_n= mysqli_num_rows($exe_req);
                         if($exe_n>0){
                            while($exe_1= mysqli_fetch_array($exe_req)){
                              $num[$i]=$exe_1['slip_no'];
                              //echo $num[i];
                              $i++;
                            }
                            $i=$i-1;
                            while($j<=$i){  
                                if($num[$j]== $num[$j+1] ){
                                    //echo 0;
                                    $j++;  
                                }
                                else{
                                    $slip[$msg]=$num[$j];
                                    $msg++;
                                   $j++; 
                                }
                            }
                         }
                         
                    ?>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope"></i>
                    <span class="badge bg-red"><?= $msg ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                        for($i=0;$i<$msg;$i++){
                            ?>
                      <li>
                          <a>
                          <span class="image"><img src="images/biet.jpg" alt="Profile Image" />NEW REQUISITION SLIP</span>
                          <a href="req_request.php?slipno=<?=$slip[$i]?>" class="btn-block">Check Slip no <?=$slip[$i]?></a>
                        <span class="message">
                          Please Check The Requisition Form....
                        </span>
                          </a>
                    </li>
                      <?php
                        }
                    ?>
                      
                  </ul>
                </li>
                <!--faculty requisition stop-->
                
                <!--faculty requisition notify  to dept in charge start-->
                    <?php
                   // echo $_SESSION['smsdept_sec'];
                        $req="SELECT rq_sl_no,slip_no,gen_by,gen_by_desg,sc_name,mat_maker,mat_des,mat_qty,mat_unit FROM USER_REQUISITION WHERE hod_deptinc_app=1 AND gen_by_dept='CE' AND gen_by_desg='FACULTY'";
                         $exe_req= mysqli_query($link, $req);
                         $msg=0;$num[0]=0;$i=0;$j=0;
                         $exe_n= mysqli_num_rows($exe_req);
                         if($exe_n>0){
                            while($exe_1= mysqli_fetch_array($exe_req)){
                              $num[$i]=$exe_1['slip_no'];
                              //echo $num[i];
                              $i++;
                            }
                            $i=$i-1;
                            while($j<=$i){  
                                if($num[$j]== $num[$j+1] ){
                                    //echo 0;
                                    $j++;  
                                }
                                else{
                                    $slip[$msg]=$num[$j];
                                    $msg++;
                                   $j++; 
                                }
                            }
                         }
                         
                    ?>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-square"></i>
                    <span class="badge bg-red"><?= $msg ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    
                      <li>
                          <a>
                          <span class="image"><img src="images/biet.jpg" alt="Profile Image" /><strong>APPROVE REQUISITION</strong></span>
                          <a href="fac_req_app.php" class="btn-block">Check Details
                          
                        </span>
                          </a>
                    </li>
                   
                    
                  </ul>
                </li>
                <!--faculty requisition notify to dept in charge stop-->
              <!--req by dept_inc start-->
                   <?php
                   // echo $_SESSION['smsdept_sec'];
                  // $
                        $req="SELECT * from dept_inc_req WHERE gen_by_app=1 AND aer_app=1 AND stock_app=0 AND gen_date<=now()";
                         $exe_req= mysqli_query($link, $req);
                         $msg=0;$num[0]=0;$i=0;$j=0;
                         $exe_n= mysqli_num_rows($exe_req);
                         if($exe_n>0){
                            while($exe_1= mysqli_fetch_array($exe_req)){
                              $num[$i]=$exe_1['slip_no'];
                              $gby[$i]=$exe_1['gen_by'];
                              $dept[$i]=$exe_1['gen_by_dept'];
                              $desg[$i]=$exe_1['gen_by_desg'];
                              //echo $num[i];
                              $i++;
                            }
                            $i=$i-1;
                            $k=$i;
                            while($j<=$i){  
                                if($num[$j]== $num[$j+1] ){
                                    //echo 0;
                                    $j++;  
                                }
                                else{
                                    $slip[$msg]=$num[$j];
                                    $gby[$msg]=$gby[$j];
                                    $dept[$msg]=$dept[$j];
                                    //echo $dept[$msg];
                                    $msg++;
                                   $j++; 
                                }
                                
                            }
                         }
                         
                    ?>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bullhorn"></i>
                    <span class="badge bg-red"><?=$msg?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                        for($i=0;$i<$msg;$i++){
                           // echo $gby[$i];
                            ?>
                      <li>
                          <a>
                          <span class="image"><img src="images/biet.jpg" alt="Profile Image" />NEW REQUISITION SLIP</span>
                          <a href="item_approval.php?slipno=<?=$slip[$i]?>&dept=<?=$dept[$i]?>&gby=<?=$gby[$i]?>&desg=<?=$desg[$i]?>" class="btn-block">Check Slip no <?=$slip[$i]?> from <?=$dept[$i]?> department</a>
                        <span class="message">
                          Please Check The Requisition Form....
                        </span>
                          </a>
                    </li>
                      <?php
                        }
                    ?>
                      
                  </ul>
                </li>
                <!--req by dept_inc stop-->  
                 <!--requisition approved by stock admin start-->
                 <?php    
                 $req="select * from dept_inc_req where gen_by_dept='CE' AND gen_by_app=1 AND stock_app=1 AND stock_app_date <= now()";
                         $exe_req= mysqli_query($link, $req);
                         $appmsg=0;$num[0]=0;$i=0;$j=0;$k;
                         $exe_n= mysqli_num_rows($exe_req);
                         if($exe_n>0){
                            while($exe_app= mysqli_fetch_array($exe_req)){
                              $num[$i]=$exe_app['slip_no'];
                              //echo $num[i];
                              $i++;
                            }
                            $i=$i-1;
                            $k=$i;
                            while($j<=$i){  
                                if($num[$j]== $num[$j+1] && $k>0){
                                    //echo $j;
                                    $k--;
                                    $j++;
                                }
                                else if($num[$j]){
                                    $slipapp[$appmsg]=$num[$j];
                                    //echo $slipapp[$appmsg];
                                    $appmsg++;
                                   $j++; 
                                   $k--;
                                   //echo $j;
                                }
                            }
                         }
                         
                    ?>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-print"></i>
                    <span class="badge bg-green"><?=$appmsg ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                        for($i=0;$i<$appmsg;$i++){
                            ?>
                      <li>
                          <a>
                          <span class="image"><img src="images/biet.jpg" alt="Profile Image" />REQUISITION SLIP APPROVED</span>
                          <a href="invoice_2.php?rawslip=<?=$slipapp[$i]?>" class="btn-block">Check Slip no <?=$slipapp[$i]?></a>
                        <span class="message">
                          Please Check The Requisition Form....
                        </span>
                          </a>
                    </li>
                      <?php
                        }
                    ?>
                      
                  </ul>
                </li>
                 <!--requisition approved by stock admin stop-->
                   <!-- faculty requisition notify start-->
                     <?php
                   // query modified for admin;
                        $req="select ur.*,r.emp_id from user_requisition as ur, registration as r where ur.gen_by_dept='CE' AND ur.dept_disp_app=1 AND ur.gen_date <= now()";
                         $f_req= mysqli_query($link, $req);
                         $fmsg=0;$num[0]=0;$i=0;$j=0;
                         $exe_n= mysqli_num_rows($f_req);
                         if($exe_n>0){
                            while($exe_f= mysqli_fetch_array($f_req)){
                              $num[$i]=$exe_f['slip_no'];
                              //echo $num[i];
                              $i++;
                            }
                            $i=$i-1;
                            while($j<=$i){  
                                if($num[$j]== $num[$j+1] ){
                                    //echo 0;
                                    $j++;  
                                }
                                else{
                                    $slip[$fmsg]=$num[$j];
                                    $fmsg++;
                                   $j++; 
                                }
                            }
                         }
                         
                    ?>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="badge bg-green"><?= $fmsg ?></span>
                  </a>
                    
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                        for($i=0;$i<$fmsg;$i++){
                            ?>
                      <li>
                          <a>
                          <span class="image"><img src="images/biet.jpg" alt="Profile Image" />NEW REQUISITION SLIP</span>
                          <a href="invoice_faculty.php?rawslip=<?=$slip[$i]?>" class="btn-block">Check Slip no <?=$slip[$i]?></a>
                        <span class="message">
                          Please Check The Requisition Form....
                        </span>
                          </a>
                    </li>
                      <?php
                        }
                    ?>
                     
                  </ul>
                </li>
                      <!-- faculty requisition notify stop-->
                      
                      <!--faculty requisition notify start-->
                    <?php
                   ////query modified for admin
                        $req="SELECT rq_sl_no,slip_no,gen_by,gen_by_desg,sc_name,mat_maker,mat_des,mat_qty,mat_unit FROM USER_REQUISITION WHERE hod_deptinc_app=1 AND gen_by_desg='FACULTY'";
                         $exe_req= mysqli_query($link, $req);
                         $msg=0;$num[0]=0;$i=0;$j=0;
                         $exe_n= mysqli_num_rows($exe_req);
                         if($exe_n>0){
                            while($exe_1= mysqli_fetch_array($exe_req)){
                              $num[$i]=$exe_1['slip_no'];
                              //echo $num[i];
                              $i++;
                            }
                            $i=$i-1;
                            while($j<=$i){  
                                if($num[$j]== $num[$j+1] ){
                                    //echo 0;
                                    $j++;  
                                }
                                else{
                                    $slip[$msg]=$num[$j];
                                    $msg++;
                                   $j++; 
                                }
                            }
                         }
                         
                    ?>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-red"><?= $msg ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    
                      <li>
                          <a>
                          <span class="image"><img src="images/biet.jpg" alt="Profile Image" /><strong>APPROVE REQUISITION</strong></span>
                          <a href="fac_req_app.php" class="btn-block">Check Details
                          
                        </span>
                          </a>
                    </li>
                   
                    
                  </ul>
                </li>
                <!--faculty requisition notify stop-->
                     <!--print aer req start-->
                <?php    
                 $req="select * from dept_inc_req where gen_by_dept='ACCOUNT-SECTION' OR gen_by_dept='EXAM-CELL' OR gen_by_dept='REGISTRAR' AND gen_by_app=1 AND  aer_app=1 AND stock_app=1 AND stock_app_date <= now()";
                         $exe_req= mysqli_query($link, $req);
                         $appmsg=0;$num[0]=0;$i=0;$j=0;$k;
                         $exe_n= mysqli_num_rows($exe_req);
                         if($exe_n>0){
                            while($exe_app= mysqli_fetch_array($exe_req)){
                              $num[$i]=$exe_app['slip_no'];
                              //echo $num[i];
                              $i++;
                            }
                            $i=$i-1;
                            $k=$i;
                            while($j<=$i){  
                                if($num[$j]== $num[$j+1] && $k>0){
                                    //echo $j;
                                    $k--;
                                    $j++;
                                }
                                else if($num[$j]){
                                    $slipapp[$appmsg]=$num[$j];
                                    //echo $slipapp[$appmsg];
                                    $appmsg++;
                                   $j++; 
                                   $k--;
                                   //echo $j;
                                }
                            }
                         }
                         
                    ?>
               <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-print"></i>
                    <span class="badge bg-green"><?=$appmsg ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                        for($i=0;$i<$appmsg;$i++){
                            ?>
                      <li>
                          <a>
                          <span class="image"><img src="images/biet.jpg" alt="Profile Image" />REQUISITION SLIP APPROVED</span>
                          <a href="invoice_aer_print.php?rawslip=<?=$slipapp[$i]?>" class="btn-block">Check Slip no <?=$slipapp[$i]?></a>
                        <span class="message">
                          Please Check The Requisition Form....
                        </span>
                          </a>
                    </li>
                      <?php
                        }
                    ?>
                      
                  </ul>
                </li>
                <!--print aer req stop-->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

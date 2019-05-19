<?php
include './class/db_connect.php';
?>      

<!-- /menu profile quick info -->
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>
                      <ul class="list-unstyled user_data">
                        
                        <li class="m-top-xs">
                          <i class="fa fa-user user-profile-icon"></i>
                          <?= $_SESSION['smsdesg']?>&nbsp;&nbsp;&nbsp<?php echo ',';?><?=$_SESSION['smsdept_sec']?>
                        </li></font>
                      </ul>
                      
                  </h3>
                <ul class="nav side-menu">
                    <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                                      <!--li><a href="useradd.php"><i class="fa fa-home"></i>Add User</a></li-->
                  
                  <!--li><a href="itemregister.php"><i class="fa fa-edit"></i> Item Register <!--<span class="fa fa-chevron-down"></span>--></a-->
                    <!--<ul class="nav child_menu">
                        <li><a href="add_item.php">Add Item</a></li>
                        
                    </ul>--->
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <!-- <li><a href="requisition_1.php">Requisition Slip</a></li>-->
                      <li><a href="dept_requisition.php">Departmental Requisition Slip</a></li>
                    </ul>
                  </li>
                  <li><a><i  class="fa fa-eye"></i> View Requisition <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                      
                      
                      <!--<li><a href="req_request.php" >Requisition Request</a></li>-->
                      <li><a href="fac_req_app.php" >Approve Reuisition</a></li>
                      <li><a href="fac_req_details.php" >Faculty Reuisition</a></li>
                    </ul>
                  </li>
                <li><a href="dept_req_details.php"><i class="fa fa-eye"></i>Your requisitions</a></li>
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

            <!-- /menu footer buttons -->
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
                    <!--li><a href="javascript:;"> Profile</a></li-->
                    <!--li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li-->
                    <!--li><a href="javascript:;">Help</a></li-->
                    <li><a href="edit_profile.php"><i class="fa fa-user pull-right"></i> Profile</a></li>
                    <li><a href="edit_profile.php"><i class="fa fa-male pull-right"></i> Help</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    
                  </ul> 
                </li>
                <!--faculty requisition notify  to dept in charge start-->
                    <?php
                   // echo $_SESSION['smsdept_sec'];
                        $req="SELECT rq_sl_no,slip_no,gen_by,gen_by_desg,sc_name,mat_maker,mat_des,mat_qty,mat_unit FROM USER_REQUISITION WHERE hod_deptinc_app=1 AND gen_by_dept='".$_SESSION['smsdept_sec']."' AND gen_by_desg='FACULTY'";
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
                <!--faculty requisition notify  to dept in charge stop-->
                <!--dept requisition invoice notify start-->
                 <?php    
                 $req="select * from dept_inc_req where gen_by_dept='".$_SESSION['smsdept_sec']."' AND gen_by_app=1 AND stock_app=1 AND stock_app_date <= now()";
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
                      <!--dept requisition invoice notify stop-->
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

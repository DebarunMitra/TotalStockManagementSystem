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
                  <!--<li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="requisition_1.php">Requisition Slip</a></li>
                      <li><a href="requisition_1.php">Requisition Slip</a></li>
                    </ul>
                  </li>-->
                  <li><a><i class="fa fa-eye"></i> View Stock <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="view_item_entry.php">Entry Stock</a></li>
                        <li><a href="view_item_dispatch.php">Dispatch Stock</a></li>
                    </ul>
                  </li>
                
                 
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
                    <li><a href="edit_profile.php"><i class="fa fa-user pull-right"></i> Profile</a></li>
                    <li><a href="edit_profile.php"><i class="fa fa-male pull-right"></i> Help</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul> 
                </li> 
                <?php
                   // echo $_SESSION['smsdept_sec'];
                        $req="SELECT rq_sl_no,slip_no,gen_by,gen_by_desg,sc_name,mat_maker,mat_des,mat_qty,mat_unit FROM USER_REQUISITION WHERE hod_dir_app=1";
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
                          <a href="fac_req_app_bydir.php" class="btn-block">Check Details
                          
                        </span>
                          </a>
                    </li>
                   
                    
                  </ul>
                </li>
                  </ul>
                </li>
                 <!--requisition approved by stock admin stop-->
                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

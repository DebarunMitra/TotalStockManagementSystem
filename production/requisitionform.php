<?php
include './header.php';
/*$fq=mysqli_query($link,"select'".  base64_decode($_GET['token'])."'");
$fr=  mysqli_fetch_array($fq);
$birth_child_name =$fr['child_nm'];
	$birth_father_name = $fr['f_nm'];
	$birth_mother_name = $fr['m_nm'];
	$birth_date = $fr['dob'];
	$birth_sex = $fr['sex'];
	$birth_place = $fr['pob'];
	$birth_reg_date = $fr['b_reg_dt'];
	$birth_remarks = $fr['b_mark'];
	$birth_perm_add = $fr['adress_per'];
	$birth_curr_add = $fr['address_opt'];
	$birth_reg_no = $fr['b_regno'];*/
?>
<style>
    body{
        font-family:"Palatino Linotype";
    src:url("Palatino Linotype.ttf");
    }
input[readonly] {
	border:hidden;
  background-color: white;
}
.no-border
{
	font-size: 16px;
        font-family:'Palatino Linotype';
}
.print
 {
    font-weight: bold;
font-size:14px;
border: 4px solid ;
 -webkit-box-shadow: 0px 0px 0px 1px #000;
    -moz-box-shadow: 0px 0px 0px 1px #000;
    box-shadow: 0px 0px 0px 1px #000;
padding:8px;
}
</style>
<script>
            function printDiv(divID,px) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
        
        </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Catagory <small>Graph title sub-title</small></h3>
                  </div>
                 <div class="col-md-6">
                    <!--<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>-->

                  </div>
                                       
                </div>
                  <center>
<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #000000">
<div style="width:750px; font-family:times new roman; height:550px; padding:20px; text-align:center; border: 5px solid #000000">
    <center> <p style="font-size:50px; font-weight:bold ">Certificate of Completion</p></center>
       <br><br>
       <!--span style="font-size:25px"><i>This is to certify that</i></span>
       <br><br>
       <span style="font-size:30px"><b>$student.getFullName()</b></span><br/><br/>
       <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
       <span style="font-size:30px">$course.getName()</span> <br/><br/>
       <span style="font-size:20px">with score of <b>$grade.getPoints()%</b></span> <br/><br/><br/><br/>
       <span style="font-size:25px"><i>dated</i></span><br>
      #set ($dt = $DateFormatter.getFormattedDate($grade.getAwardDate(), "MMMM dd, yyyy"))
      <span style="font-size:30px">$dt</span-->
       <span style=""
       <table border=10 width="100%">
           <tr width="50">sl no:</tr>
           <tr>DESCRIPTION</tr>
       </table>
</div>
</div>
                  </center>
                  
                  
                  
                  
                  
                  
                    <div class="box-footer">
            <center><input type="button" class="btn btn-info" onclick="return printDiv('print')" value="Print"> &nbsp;
                <a href="birthrawcertificate?token=<?=$_GET['token']?>" target="_blank" class="btn btn-success">Preview Raw File</a>
                <input type="button" class="btn btn-danger" onclick="window.close()" value="Close"></center>
        </div>
              </div>
              
            </div>
              
          </div>
        </div>

  <?php
  include './footer.php';
  ?>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>  
<!--script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script-->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php
    include './header.php';
    include './class/db_connect.php';
    $item="SELECT * FROM dept_inc_req WHERE slip_no=".$_GET['rawslip']."";
    $qexe= mysqli_query($link, $item);
    $result= mysqli_fetch_array($qexe);
    $req_name=$result['gen_by'];
    $req_desg=$result['gen_by_desg'];
    $date=$result['gen_date'];
?>

    <script>
            function printDiv(divID,px) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body><style></style>" + 
              divElements + "</body></html>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
        }
        </script>
    <body>
            <style>
   /* body{
        font-family:"sans-serif";
   /* src:url("Palatino Linotype.ttf"); 
    }*/
input[readonly] {
	border:hidden;
  background-color: white;
}
/*input[type=button]
{
    height: 30px;
    width: 80px;
    border: 2px solid seagreen ;
    /*border-radius: 50px;
    border-color: seagreen;
    background-color: lightgray;
    color: black;
}*/
 /*input:hover[type=button]
 {
     background-color: seagreen;
     color: white;
 }*/
.no-border
{
	font-size: 16px;
        font-family:'Palatino Linotype';
}
.print
 {
    font-weight: bold;
font-size:14px;
border: 5px solid ;
 -webkit-box-shadow: 0px 0px 0px 1px #000;
    -moz-box-shadow: 0px 0px 0px 1px #000;
    box-shadow: 0px 0px 0px 1px #000;
padding:8px;
}
span[contenteditable] { display: inline-block; }

/* heading */

h1 { font: bold 100%  sans-serif; word-spacing: 0.3em; font-size: 20px; text-align: center; text-transform: uppercase; }
h2{font:bold 80% sans-serif; word-spacing: 0.3em; font-size: 18px}

/* table */

table { font-size: 100%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; font-size: 120% ; padding: 0.5em; position: relative; text-align: center; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }
header { margin: 0 0 2em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: left; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 3em); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */
table.meta1{ float: left; width: 100%; }
table.meta1 th{ width: 80%; height: 10%; }
table.meta1 td { width: 150%; }
table.meta2{ float:right; width: 60%; }
table.meta2 th{ width: 70%; }
table.meta2 td { width: 90%; }
table.meta1:after, table.meta2:after { clear: both; content: ""; display: table; }
table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; padding: 10px;content: "  "; display: table; }

/* table meta */

table.meta th { width: 50%; text-align: center;}
table.meta td { width: 50%; text-align: center;}

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold;  }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: left; width: 12%; }
table.inventory td:nth-child(4) { text-align: center; width: 12%; }
table.inventory td:nth-child(5) { text-align: center; width: 12%; }

</style>
        <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                    <div id="print" style="max-width: 1800px; overflow-x: auto; width:100%;">
                <div class="print">
                    <center><p><h1><u>BIRBHUM INSTITUTE OF ENGINEERING AND TECHNOLOGY</u></h1></p><br>
                   <p style="font-weight: 10px"><u>SURI, BIRBHUM,PIN-731101</u></p>
</center>
               
            <form method="post">
                
            <h1><img src=""></h1>
		<header>
                    <center><h2><u>REQUISITION SLIP</u></h2></center>
		</header>
		<article>
                    
			<table class="meta1">
				<tr>
                                    	<th>MATERIAL REQUIRED BY :</th>
					<td><?=$req_name?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      </td>
                                       	
					<th>SLIP NO:</th>
					<td><?=$_GET['rawslip']?></td>
                                        
				</tr>
                        </table>
                    			<table class="meta1">
				<tr>
                                    	<th>DESIGNATION:</th>
					<td><?=$req_desg?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                       	
					<th>Date & Time:</th>
					<td><?=$date?></td>
                                        
				</tr>
                        </table>
                        
                       <br/><br/><br/><br/><br/>
                       <div><center><h2><u>Recipent</u></h2></center></div>
                       <br>
                       <table class="inventory" border="1" style="border-color:gray;">
				<thead>
					<tr>
                                            <th width="8%"><u>Sl No</u></th>
                                            <th width="15%"><u>Item Name</u></th>
                                            <th width="50%"><u>Item Description</u></th>
                                            <th width="8%"><u>Quantity</u></th>
                                            <th width="8%"><u>Unit</u></th>
					</tr>
				</thead>
				<tbody> 
                                    <?php
                                    $item_2="SELECT * FROM dept_inc_req WHERE slip_no=".$_GET['rawslip']."";
                                    $qexe_2= mysqli_query($link, $item_2);
                                    $sl=1;
                                    while($items= mysqli_fetch_array($qexe_2)){
                                          // $i_name=
                                           //$i_maker=$items['mat_maker'];
                                         //  $i_des=$items['mat_des'];
                                          // $i_qty=$items['mat_qty'];
                                          // $i_unit=$items['mat_unit'];
                                    ?>
					<tr>
						<td width="8%"><?=$sl?></td>
						<td width="15%"><?=$items['sc_name']?></td>
						<td width="50%"><?=$items['disp_des']?></td>
						<td width="8%"><?=$items['disp_qty']?></td>
						<td width="8%"><?=$items['mat_unit']?></td>
					</tr>
                                        <?php
                                        $sl++;
                                    }
                                        ?>
				</tbody>
			</table>
		</article>
            <aside>
                    <br/><br/><br/><br/><br/><br/>
			
                <center><div>
                            <p>______________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________</p><br>
                            <p>Issued By Store Keeper&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Received By&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approved By</p>
                            
                    </div></center>
		</aside>
            <br>
            </form>
              </div>
            </div>
          </div>
        </div>
          <br />
          </div>
            
    <div class="box-footer">
            <center><input type="button" class="btn btn-info" onclick="return printDiv('print')" value="Print"> &nbsp;
                <a href="invoice_3.php" target="_blank" class="btn btn-success">Preview Raw File</a>
                <input type="button" class="btn btn-danger" onclick="window.close()" value="Close"></center>
        </div>
        </div>
        <!-- /page content -->

    <?php
    include './footer.php';
    ?>
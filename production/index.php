<?php
include './header.php';
include './class/db_connect.php';                                   
?>
<style>
    
    .marquee {
    height: 260px; /* or any value */
    overflow-y: auto;
}
.about
{
    width: 133%;
    overflow-y: auto;
}
</style>
<script>
    function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        h = date.getHours();
        if(h>=12)
        ampm='PM';
        else
            ampm='AM';
        h=h%12;
        if(h==0)
            h=12;
        else if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+' '+d+' '+months[month]+'  '+year+' '+h+':'+m+':'+s+''+ampm ;
        res=result.fontcolor("gray");
        document.getElementById(id).innerHTML=res;
        
        
        setTimeout('date_time("'+id+'");','1000');
        return true;
}
 /*Image sliding*/
                          var i=0;
                          var images=[];
                          var time=2000;
                          images[0]='images/college.jpg';
                         // images[1]='images/stock2.jpg';
                         images[1]='images/stat.jp.jpg';
                          images[2]='images/stock.jpg';
                          // images[3]='images/stock1.jpg';
                           images[3]='images/fur.jpg';
                          function changeImage()
                          {
                              document.slide.src=images[i];
                              if(i<images.length-1){
                                  i++;
                          }else{
                              i=0;
                          }
                          setTimeout("changeImage()",time);
                      }
                      

    
    </script>
     
    
        <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-12">
              <!--div class="dashboard_graph"-->
                <div class="row x_title">
                  <div class="col-md-9">
                     <!-- <marquee scrollamount="5" direction="left" >-->
                    <h3 >Total Stock Management System<small> everything is here...</small></h3>
                    <!--</marquee>-->
                  </div><br/>
                 <div class="title_right">
                     <div class="col-md-3 form-group pull-right top_search" >
                   <span id="date_time" style=" font-size: medium"></span>
            <script >window.onload = date_time('date_time');</script>
                  </div>
                </div>
              </div>
                <!--/div-->
              </div>
              
                  <div class="row">
              <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="x_panel">     
                    <div class="clearfix"></div>
                  
                    <div class="x_content">
                      <script>window.onload=changeImage;</script>
                      <img name="slide" width="100%" height="300">
                  </div>
                 
                </div>
                  
                <div class="row">
                    <div class="about">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <h2>About </h2>
                  <div class="x_title">
                    
                  </div>
                  <div class="x_content">
                        <p style font-size="2px">
                          Total Stock Management System computerizes and automate the entire everyday work process related to managing  the stock of Birbhum Institute of Engineering and Technology (BIET). Efficient stock control requires understanding and acknowledging the demands on that stock and this system fulfills the said.                          This system will be helpful to stock manager, employees and faculties who are incharge of stock in the respective department.<br/><br/> 
                          Functionalities of Total Stock Management System:<br/>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;Entry of items according to category and sub-category.<br/>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;Users can request for items from stock via proposed channel.<br/>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;Detailed view of  item entry and  item dispatch Register.<br/>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;Provision for entry of old stock.<br/>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;Provision for adding and verification of the proposed users.<br/>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;Password protected Login System.<br/><br/>
                          Total Stock Management System have a leveled structure in accordance with user. Each level of user have been proposed with specific facilities according to their designation in the institution. Transparency of stock have been maintained dutifully.<br/> Proposed users of the Total Stock Management System:<br/>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;Teaching and non-teaching staff of BIET who have been authority to use this system.<br/>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;Head of Department of respective department.<br/>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;Stock incharge of the respective department.<br/>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;Stock Manager of the Institution.<br/>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;Head of the Institution.<br/>
                        </p>
                  </div>
                </div>
              </div> 
                    </div>
            </div>
              </div>
                      
                      <div class="col-md-3 col-sm-9 col-xs-3">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Notification </h2>
                    <div class="clearfix"></div>
                  </div>
                    <div class="marquee">
                         <marquee scrollamount="10" direction="up" >
                  <?php
                           $sql=mysqli_query($link,"SELECT `name`, `dept_sec`, `desg`, `contact_no` FROM `registration`");
                            $exe= mysqli_num_rows($sql);
                    if($exe>0)
                    {
                    ?>
                    
                  <ol class="list-unstyled top_profiles">
                       <?php
                        while($exesql=mysqli_fetch_array($sql))
                        {
                    ?>
                          <li class="media event">
                            <a class="pull-left border-blue profile_thumb">
                              <i class="fa fa-user blue"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#"><?=$exesql['name']?></a>
                              <p><strong><?=$exesql['dept_sec']?>
                                      <br></strong><?=$exesql['desg']?></p>
                              <!--p> <small><?=$exesql['email_id']?></small><br-->
                                  <small><?=$exesql['contact_no']?></small>
                              </p>
                            </div>
                          </li>
                           <?php
                        }
                    }
                        ?>  
                   </ol>
                         </marquee>
                  </div>
                   
                     
                </div>
              </div>
            </div>
              
                  
              
          </div>
          </div>
       

                 <!-- /page content -->
<?php
    include './footer.php';
?>
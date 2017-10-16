<?php
   include("superAdminHeader.php");
?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
</head>
<body>
      <div class="col-md-8" style="left:-15px">
      <div class="col-md-12">
         <div class="col-md-8" id="dashboard_panel">
               <div style="position:relative;top:10px;color:#004445;font-weight:bold;left:0px;">
                  <h1><span class="glyphicon glyphicon-dashboard"></span><b></b></h1>
               </div>
            <h1 style="color:#004445;font-weight:bold;position:relative;left:50px;top:-50px;"> | DASHBOARD</h1>
            <hr style="height:1px;background-color:#336b87;position:relative;top:-30px;" width="50%" align="right">
            <div class="row" style="position: relative;right:-10%;">
               <a href="#">
               <div class="col-md-3" style="background-color:green;left:250px;color:white;box-shadow:10px 10px 1px silver;position:relative;bottom-margin:100px;">
                        <h6 class="text-center">Add <br> Admins</h6>
                        <hr>
                        <font size="10px"><span class="glyphicon glyphicon-plus"></span></font>
                        <center><font size="15px" id="dir_count" style="position:absolute;top:70px"></font></center>
               </div></a>
              
               <a href="#">
               <div class="col-md-3" style="background-color:orange;left:300px;color:white;box-shadow:10px 10px 1px silver;">
                        <h6 class="text-center">Manage<br>Admins</h6>
                        <hr>
                        <font size="10px"><span class="glyphicon glyphicon-user"></span></font>
                        <center><font size="15px" id="educ_count" style="position:absolute;top:70px"></font></center>
               </div></a>
            </div>

         </div>

      </div>
      </center>
</div>
</body>
</html>
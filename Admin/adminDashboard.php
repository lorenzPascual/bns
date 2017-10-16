<?php
   include("headerAdmin.php");
?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
</head>
<body>
      <div class="col-md-10" style="left:-15px">
         
      <div class="col-md-10">
         <div class="col-md-8" id="dashboard_panel">
               <div style="position:relative;top:10px;color:#004445;font-weight:bold;left:0px;">
                  <h1><span class="glyphicon glyphicon-dashboard"></span><b></b></h1>
               </div>
            <h1 style="color:#004445;font-weight:bold;position:relative;left:50px;top:-50px;"> | DASHBOARD</h1>
            <hr style="height:1px;background-color:#336b87;position:relative;top:-30px;" width="50%" align="right">
            <div class="row" style="position: relative;right:-10%;">
               <a href="#">
               <div class="col-md-3" style="background-color:green;left:50px;color:white;box-shadow:10px 10px 1px silver;position:relative;bottom-margin:100px;">
                        <h6 class="text-center">Add <br>Category</h6>
                        <hr>
                        <font size="10px"><span class="glyphicon glyphicon-plus"></span></font>
                        <center><font size="15px" id="cat_count" style="position:absolute;top:70px"></font></center>
               </div></a>
               <div></div>
               <a href="adminManager.php">
               <div class="col-md-3" style="background-color:orange;left:100px;color:white;box-shadow:10px 10px 1px silver;">
                        <h6 class="text-center">Total<br>Users</h6>
                        <hr>
                        <font size="10px"><span class="glyphicon glyphicon-user"></span></font>
                        <center><font size="15px" id="user_count" style="position:absolute;top:70px"></font></center>
               </div></a>
               <a href="#">
               <div class="col-md-3" style="background-color:purple;left:150px;color:white;box-shadow:10px 10px 1px silver">
                        <h6 class="text-center">Product<br>Report</h6>
                        <hr>
                        <font size="10px"><span class="glyphicon glyphicon-stats"></span></font>
                        <center><font size="15px" id="pro_count" style="position:absolute;top:70px"></font></center>
               </div></a>
               <a href="#">
               <div class="col-md-3" style="background-color:red;left:200px;color:white;box-shadow:10px 10px 1px silver">
                        <h6 class="text-center">Manage Reported <br>Users</h6>
                        <hr>
                        <font size="10px"><span class="glyphicon glyphicon-alert"></span></font>
                        <center><font size="15px" id="mngt_count" style="position:absolute;top:70px"></font></center>
               </div></a>
            </div>

         </div>

      </div>
      </center>
</div>
<?php
   include("modalAddCategory.php");
?>


<script>
  $("#openCategoryAdd").click(function(){
    $('#modalAddCategory').modal('show');
  });
  $(function(){
         function loadCategoryCount()
         {
            $("#cat_count").load("ajaxGetCategoryCount.php");
         } 
         function loadUserCount()
         {
            $("#user_count").load("ajaxGetTotalUserCount.php");
         }
         loadCategoryCount();
         loadUserCount();
  });
</script>
</body>
</html>
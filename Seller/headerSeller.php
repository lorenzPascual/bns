<!DOCTYPE html>
<html>
<head>
	<title>BNSSC</title>
     <meta charset="utf-8">
	<meta name="viewport" content="width=device-width ,intial-scale=1">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery.js"></script>
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
  <style type="text/css" rel="stylesheet">
    button > span,small
    {
      color:white;
    }
    .background{
      background-color:black;
    }
  </style>
   <?php
         require_once('ajaxGetUserInfo.php');
          
          include('modalPostItem.php');

    ?> 
    </head>
<body>
  <div class="container-fluid">
     <div class="row">
       	  <div class="col-md-12" >
          	   <div class="col-md-4">
          		    <!-- <font color="#2fb1cb" size="5px" face="tahoma" id="logo"><b>Buy And Sell<br>Shopping Center</b></font> -->
                   <a href="viewDisplayitems.php"><img src="../admin/logo.png" width="150px" height="100px"></a>
                  <br><br>
          	   </div>
                <div class="col-md-2">
                    <br><div class="input-group">
                       <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                       <input id="search" type="search" class="form-control" name="search" placeholder="Search Item">
                    </div>
                </div> 
                <div class="col-md-2">
                    <br><div class="input-group">
                  <select id='sltCategory' onchange="changePage()" class="form-control">
                    <?php 
                        require_once('..\functions\Admin.php');

                        $adminService = new AdminServices();
                        $returnval= $adminService->getCategories();
                        $getcategory = $adminService->getCategory($_GET['category']);
                        
                        // var_dump($_GET['category']);
                        if(isset($_GET['category']))
                        {
                        echo "<option selected>".$getcategory['categoryName']."</option>";

                        }
                        else
                        {
                        echo "<option selected>All Items</option>";

                        }
                        
                        echo "<option value='all'>All Items</option>";

                        foreach ($returnval as $key => $value) {
                          
                          echo "<option value='".$value['id']."'>".$value['categoryName']."</option>";
                        }
                    ?>
                  </select>
                </div>
                </div>       
        	     <div class="col-md-4">
                    <br><div class="input-group">
                		<button type="button" class="btn pull-right btn-info" id="btn_logout" ><span class="glyphicon glyphicon-log-out"></span>Logout</button>
                		<button type="button" class="btn pull-right">
                			<span class="glyphicon glyphicon-user"></span>&nbsp;<b>Hi&nbsp;<?php echo $_COOKIE['user']?></b>
                		</button>
                		 <div class="btn-group pull-right">
          				        <button type="button" id="post" class="btn background"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;<small>POST an Item</small></button>
      					          <a href="viewMyItems.php"><button type="button" id="myitem" class="btn background"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;<small>My Items</small></button></a>
                  		    <a href="viewMyProfile.php"><button type="button" id="myprofile" class="btn background"><span class="glyphicon glyphicon-user"></span>&nbsp;<small>My Profile</small></button></a>
      					         <a href="viewMyMessages.php"><button type="button" id="message" class="btn background"><span class="glyphicon glyphicon-envelope"></span>&nbsp;<small>My Messages</small></button></a>
           			    </div>
          
                </div>       
        	     </div>	
             </div>  
      </div> 
  </div>
     <script>
          function changePage()
    {
      var category = $('#sltCategory').val();
      alert($('#sltCategory').val());
        if(category=='all')
        {
          window.location.href = "viewDisplayItems.php";
        }
        else
        {
          window.location.href = "viewDisplayItems.php?category="+category;
        }
          // var xdata = 'event_action=loadCategory';ss
            // alert(xdata);
           
           // jQuery.ajax
           // ({
           //    url:"ajaxHome.php",
           //    dataType:"json",
           //    type:"POST",
           //    data:xdata,
           //    success:function(xobj)
           //    {
           //      $.each(xobj, function(key, value)
           //      {
           //      $('#sltCategory').append("<option id='1' value='"+value['id']+"' >"+value['categoryName']+"</option>");
           //      })
           //    }
           // });
    }
    function search()
    {
      var category = $('#sltCategory').val();
      var search = $('#search').val();
      
      window.location.href = "viewDisplayItems.php?category="+category+"&search="+search;


    }
          $("#post").click(function(){
          $('#ModalPostItem').modal('show'); 

       });
        $("#btn_logout").click(function(){
           var logout ="logout"; 
           var dataString = "logout="+logout;

           $.ajax({
               url:"ajaxLogOutSeller.php",
               type:"POST",
               data:dataString,
               success:function(data)
               {
                  window.location ="../index.php";
               },
               error:function(error)
               {
                console.log("error");
               }
            });
           
        });
     </script>
</body>
</html>
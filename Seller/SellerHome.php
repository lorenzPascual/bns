<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width ,intial-scale=1">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery.js"></script>
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
   <?php
         include('ajaxGetUserInfo.php');
    ?> </head>
<body>
  <div class="container-fluid">
     <div class="row">
       	<div class="col-md-12" >
        	<div class="col-md-4">
        		<font color="#2fb1cb" size="5px" face="tahoma" id="logo"><b>Buy And Sell<br>Shopping Center</b></font>
        	</div>
        	<div class="col-md-8">
        		<br>
          		<button type="button" class="btn pull-right btn-info" id="btn_logout" ><span class="glyphicon glyphicon-log-out"></span>Logout</button>
          		<button type="button" class="btn btn-link pull-right">
          			<span class="glyphicon glyphicon-user"></span>&nbsp;<b>Hi&nbsp;<?php echo $value['name']?></b>
          		</button>
        	</div>	
        </div>  
      </div> </div>
   <div class="container"> 	
     <div class="row">
        <br>
        <div class="btn-group pull-right">
    		<button type="button" id="post" class="btn btn-primary" style="border-radius:15px 0px 0px 0px"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;POST an Item</button>
			<button type="button" id="myitem" class="btn btn-success"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;My Items</button>
            <button type="button" id="myprofile" class="btn btn-warning"><span class="glyphicon glyphicon-user"></span>&nbsp;My Profile</button>
			<button type="button" id="message" class="btn btn-danger" style="border-radius:0px 15px 0px 0px"><span class="glyphicon glyphicon-envelope"></span>&nbsp;My Messages</button>
     	</div>
     	<div class="col-md-12">
          <div class="col-md-12 panel panel-success" id="myItem_panel" style="border:solid 2px #5cb85c;height:450px;border-radius:50px 0px 50px 0px;position:absolute;">
               
          </div>
          <div class="col-md-12 panel panel-primary" id="post_panel" style="border:solid 2px #337ab7;height:450px;border-radius:50px 0px 50px 0px;position:absolute;">
               
          </div>
          <div class="col-md-12 panel panel-warning" id="profile_panel" style="border:solid 2px #f0ad4e;height:450px;border-radius:50px 0px 50px 0px;position:absolute;">
          	
            <div class="col-md-12">
            	<br>
             	<div class="col-md-2">
                    <label style="position:absolute;top:7px;left:75%">Name:</label>
             	</div>
             	<div class="col-md-8">
                   <input type="text" placeholder="Name" class="form-control" id="name" value="<?php echo $value['name']?>" disabled>
             	</div>	
            </div>
            <div class="col-md-12">
            	<br>
             	<div class="col-md-2">
                    <label style="position:absolute;top:7px;left:60%">Mobile No:</label>
             	</div>
             	<div class="col-md-8">
                   <input type="text" placeholder="Mobile No" class="form-control" id="mobile" value="<?php echo $value['mobile']?>">
             	</div>	
            </div>
            <div class="col-md-12">
            	<br>
             	<div class="col-md-2">
                    <label style="position:absolute;top:7px;left:65%">Location:</label>
             	</div>
             	<div class="col-md-8">
                   <select class="form-control" placeholder="Location" id="location" value="<?php echo $value['location']?>">
                     <option>Caloocan</option>
                     <option>Las Piñas‎</option>
                     <option>Makati</option>
                     <option>Malabon</option>
                     <option>Mandaluyong</option>
                     <option>Manila</option>
                     <option>Marikina</option>
                     <option>Muntinlupa</option>
                     <option>Navotas</option>
                     <option>Parañaque</option>
                     <option>Pasay</option>
                     <option>Pasig</option>
                     <option>Quezon City</option>
                     <option>San Juan</option>
                     <option>Taguig</option>
                     <option>Valenzuela</option>
                 </select>
             	</div>	
            </div>
            <div class="col-md-12">
            	<br>
             	<div class="col-md-2">
                    <label style="position:absolute;top:7px;left:44%">Email Address:</label>
             	</div>
             	<div class="col-md-8">
                   <input type="email" placeholder="Email Address" class="form-control" id="email" value="<?php echo $value['email']?>">
             	</div>	
            </div>
            <div class="col-md-12">
            	<br>
             	<div class="col-md-2">
                    <label style="position:absolute;top:7px;left:61%">Password:</label>
             	</div>
             	<div class="col-md-8">
                   <input type="password" placeholder="Password" class="form-control" id="password" value="<?php echo $value['password']?>">
             	</div>	
            </div>
            <div class="col-md-12">
            	<br>
              <button type="button" class="btn btn-success pull-right" id="update"><span class="glyphicon glyphicon-check"></span>&nbsp;Update</button>
            </div>	
          </div>
             
          <div class="col-md-12 panel panel-danger" id="message_panel" style="border:solid 2px #d9534f;height:450px;border-radius:50px 0px 50px 0px;position:absolute;">
               
          </div>	
     	</div>   
     </div>	
   </div>	
   <script>
   	 $(function(){
        loadMyItems();
        $("#message_panel,#profile_panel,#myItem_panel").hide();
       
        $("#post").click(function(){
           $("#post_panel").show();
           $("#myItem_panel,#message_panel,#profile_panel").hide();
        }); 

         $("#myitem").click(function(){
           $("#myItem_panel").show();
           $("#post_panel,#message_panel,#profile_panel").hide();
        });
        
         $("#message").click(function(){
           $("#message_panel").show();
           $("#post_panel,#myItem_panel,#profile_panel").hide();
        });
          $("#myprofile").click(function(){
           $("#profile_panel").show();
           $("#post_panel,#myItem_panel,#message_panel").hide();
        });
        
        $("#update").click(function(){
         	 var name     = $("#name").val();
         	 var mobile   = $("#mobile").val();
         	 var location = $("#location").val();
         	 var email    = $("#email").val();
         	 var password = $("#password").val();
           var dataString = "name="+name+"&mobile="+mobile+"&location="+location+"&email="+email+"&password="+password;
             $.ajax({
                 url:"ajaxUpdateInfo.php",
                 type:"POST",
                 data:dataString,
                 success:function(data)
                 {
                 	alert(data);
                 }   
             }); 
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
                alert(data);
               },
               error:function(error)
               {
                console.log(error);
               }
            });
           
        });
        function loadMyItems()
        {
           $("#myItem_panel").load("viewDisplayItems.php");
        }
   	 });
   </script>
</body>
</html>
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
         include('headerSeller.php');
         require_once('ajaxGetUserInfo.php');
    ?> 
  </head>
  <body>
    <hr>
     <div class="container">
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
 
     <script>
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
     </script>       
  </body>
  </html>
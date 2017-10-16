<?php 
include('superAdminHeader.php');
include('..\functions\superAdmin.php');
$superAdminService = new SuperAdminServices();
if(isset($_POST['register'])){
$return = $superAdminService->addAdmin($_POST['name'],$_POST['username'],$_POST['location']
  ,$_POST['contact'],$_POST['email'],$_POST['password']);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width ,intial-scale=1">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery.js"></script>
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../stylesheet.css"/>
	<style>
		input{
			border-radius: 
			5px 5px 5px 5px;
		}
	</style>
</head>
<body>
	<div class="col-md-10" style="background-color:#e0e0e0;">
		<h1 style="color:#004445;"><span class="glyphicon glyphicon-plus"></span> Add Admin</h1>
	</div>

	<div class="col-md-10">
		<h2 class="text-center"><span class="glyphicon glyphicon-ok"> Registration</span></h6>
	</div>

	<div class="col-md-9 col-md-offset-1" style="position:relative;top:20px;">
		<form id="getInfo">  
    <div class="col-md-5">
      
    			     <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="username" id="username" type="text" class="form-control" placeholder="Username">
        		    </div> 
        		    <br>
            		<div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
                          <input name="password" id="password" type="password" class="form-control" placeholder="Password">
            		</div> 
            		<br>
                <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
                          <input name="repassword" id="repassword" type="password" class="form-control" placeholder="Retype Password">
                </div>
                <br>
            		<div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input name="name" id="name" type="text" class="form-control" placeholder="Full Name">
           			 </div>
    </div>
   	<div class="col-md-5">
        		<div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                      <input name="contact" id="contact" type="text" class="form-control" placeholder="Mobile Number">
        		</div> 
        		<br>
        		<div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                      <input name="email" id="email" type="text" class="form-control" placeholder="E-Mail">
       			</div>
       			 <br> 
        		<div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                      <input name="location" id="location" type="text" class="form-control" placeholder="Location">
        		</div>
            <br>
               <input type='submit' id='register' value="Register" class="btn btn-block btn-success" style="position: relative;">
      </div>

     </form>
   </div>
	-- 	<div class="col-md-2">
	  <br><br>
	</div>
  </form>
 -->
</body>
</html>

<script>
        $(function(){
            
             TextValidation();
             $("#getInfo").submit(function(){
              // ------------------------Data ------------------------//
                  var username = $("#username").val();
                  var password = $("#password").val(); 
                  var repass   = $("#repassword").val();
                  var name     = $("#name").val();
                  var contact  = $("#contact").val();
                  var email    = $("#email").val();
                  var location = $("#location").val();
              //-----------------------------------------------------//
              var datas = $(this).serialize();
              if(username!=="" || password!=="" || repass!=="" || name!=="" || contact!=="" || email!=="" || location!=="")
              {
                 if(password==repass)
                 {
                    $.ajax({
                         url:"ajaxSuperAdminAddAdmin.php",
                         type:"POST",
                         data:datas,
                         success:function(data)
                         {
                             alert(data);
                         },
                         error:function(error)
                         {
                            console.log(error);
                         }
                    });
                 }  
                 else{
                    alert("Your password didn't match!");
                 } 
              }   
              else
              {
                alert("Please fillup all fields!");
              }
              return false;
              
           });           
               function TextValidation()
               {
                  $("#contact").keypress(function(e){
                if(e.keyCode < 47 || e.keyCode > 57)
                        {   
                          e.preventDefault();
                        }
                   var number = $("#contact").val();
                   if(number.length==11)
                   {
                      e.preventDefault();
                   }       
               });

                $("#password").keypress(function(e){
                   var number = $("#password").val();
                   if(number.length==24)
                   {
                      e.preventDefault();
                   }       
               });

                $("#repassword").keypress(function(e){
                   var number = $("#repassword").val();
                   if(number.length==24)
                   {
                      e.preventDefault();
                   }       
               });
               }
        });     


</script>


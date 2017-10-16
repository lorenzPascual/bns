<?php 

include('..\functions\Seller.php');
$sellerService = new SellerServices();
if(isset($_POST['register'])){
$sellerService->RegisterSeller($_POST['name'],$_POST['password'],$_POST['location'],$_POST['mobile'],$_POST['email']);
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
</head>
<body>
  <form method='post'>
	 <div class="container">
        <div class="rows" style="position:absolute;top:20%;left:26%">
           <div class="col-md-12">
	           	<div class="col-md-2">
                    <label class="pull-right">Name:</label>
	           	</div>	
	           	<div class="col-md-4">
	           		<input type='text' name='name' class="form-control"/>
	           	</div>
	       </div>    	
	       <div class="col-md-12">
	           	<div class="col-md-2">
                    <label class="pull-right">Password:</label>
	           	</div>	
				<div class="col-md-4">
					<input type='password' name='password' class="form-control"/>
				</div>
		  </div>
		  <div class="col-md-12">		
				<div class="col-md-2">
                    <label class="pull-right">Location:</label>
	           	</div>
				<div class="col-md-4">
					<input type='text' name='location' class="form-control"/>
				</div>
		  </div>
		  <div class="col-md-12">		
				<div class="col-md-2">
                    <label class="pull-right">Mobile No:</label>
	           	</div>
				<div class="col-md-4">
					<input type='text' name='mobile' class="form-control"/>
				</div>
		</div>	
		<div class="col-md-12">	
				<div class="col-md-2">
                    <label class="pull-right">Email:</label>
	           	</div>
				<div class="col-md-4">
					<input type='text' name='email' class="form-control"/>
				</div>
		</div>
		<div clss="col-md-12">
		      <div class="col-md-4 col-md-offset-2">		
				<input type='submit' name='register' value='register' class="btn btn-block btn-success"/>
			  </div>
		</div>	  		 
      </div> 
	</div> 
  </form>
</body>
</html>

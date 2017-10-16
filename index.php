<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width ,intial-scale=1">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
    	<div class="rows">
      			<div class="col-md-12" >
        			<div class="col-md-3">
        				<!-- <font color="#2fb1cb" size="5px" face="tahoma" id="logo"><b>Buy And Sells<br>Shopping Center</b></font> -->
          				<img src="./admin/logo.png" width="150px" height="100px">
        			</div>
        			<div class="col-md-9">
					        <div class="col-md-4">
					           <br>
					           <div class="input-group">
					                 <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
					                 <input id="search" type="search" class="form-control" name="search" placeholder="Search Item">
					              </div>
					          </div> 
					          <div class="col-md-4">
					            <br>
					            <div class="input-group">
					                 <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
					                 <input id="location" type="text" class="form-control" name="location" placeholder="Location">
					             </div>
					          </div>
				          	<div class="col-md-2">
				                 <br><button type="button" class="btn btn-success">Searchs</button>
				          	</div> 
				            <div class="col-md-2">
				          		<br><button type="button" class="btn pull-right btn-info" data-toggle="modal" data-target="#loginModal" id="btn_login"><span class="glyphicon glyphicon-user"></span>&nbsp;Login</button>
				           </div>
				          <!-- <form method="post">
				            <input type="submit" class="btn pull-right" id="sellitem" name="sellitem" value="Sell your item now">     
				          </form> -->
				          <!-- Login Modal -->
				           <?php 
				            include('home/modalLogin.php');
				            include('home/modalRegister.php');
				           ?>
                          <!-- End of Login Modal -->
                    </div>	
               </div>  
         </div>
         
    </div>
       
 
	<?php 

   include('home\bodyIndex.php');

?>
</div>
</div>
</html>
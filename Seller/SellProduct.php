<!DOCTYPE html>
<html>
<head>
    <title>BNSSC</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width ,intial-scale=1">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="stylesheet.css"/>
</head>
<body>

 <?php 
  
 ?>
  <div class="container-fluid">
    <div class="rows">
       <div class="col-md-12">
           <div class="col-md-2">
            <font color="#2fb1cb" size="5px" face="tahoma" id="logo"><b>Buy And Sell<br>Shopping Center</b></font>
          </div>
          <div class="col-md-9">
            
          </div>
       </div>
     </div> 
    <div class="rows">
     <form id="postitem" enctype="multipart/form-data"> 
        <div class="col-md-8 col-md-offset-2" style="height:550px;position:absolute;top:10%;">
              <div class="col-md-12">
                <b>Choose Image</b>
               </div>
               <div class="col-md-12">
                  <input type="file" value="Upload" name="value" id="value">
               </div>
               <div class="col-md-12">
                  <b>What are you selling ?</b>
               </div>	
               <div class="col-md-12">
                  <input type="text" name="name" placeholder="title" class="form-control" id="name">
               <br>
               </div>
               <!-- <div class="col-md-12">
               	<b>Category</b>
                  <select class="form-control">
                  	<option>Mobile Phones and Tablets</option>
                  	<optgroup>Computers</optgroup> 
                  </select>
               </div> -->
               <div class="col-md-12">
                   <b>Price</b>
               </div>
               <div class="col-md-12">
                  <input type="text" name="price" class="form-control" id="price">
               </div>
               <div class="col-md-12">
                   <b>Description</b>
                   <textarea class="form-control" style="height:150px" name="desc" id="desc"></textarea><br>
               </div>
               <!-- <div class="col-md-12">
                 <b>Location</b>
                 <select class="form-control">
                     <option>Metro Manila</option>
                 </select>  
                 <br>
               </div> -->
               <div class="col-md-12">
                 <b>Owner</b>
               </div>
               <div class="col-md-12">
                 <input type="text" class="form-control" name="owner" id="owner" value="
                 <?php 
                    if($_COOKIE['user'])
                    {
                       echo $_COOKIE['user'];
                    }
                    else{
                      echo '';
                    } 
                 ?>" disabled="disabled">
               <br>
               </div>
               <div class="col-md-12">
                 <input type="submit" class="btn btn-block" value="Sell your Item now">
               </div>
         </div>
      </form>	
     </div>	
  </div>	
  <script>
   $(function(){
       $("#postitem").submit(function(e){
           var dataString = $(this).serialize();    
           // var img1 =   $("#value").val();
           // var res  = img1.slice(12,100);
           $.ajax({
              url:"Seller/PostItem.php",
              type:"POST",
              data:dataString,
              success:function(data)
              {
                console.log(data);
              }
           });
           e.preventDefault(); 
       });
       
   });
  </script> 
</body>
</html>
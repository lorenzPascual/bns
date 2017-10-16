<!DOCTYPE html>
<html>
<head>
	<title></title>
 <style type="text/css" rel="stylesheet">
 ::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(250,0,0,0.8); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
#banner{
  top:-15px;
  width:100%;
  height:400px;
  position:relative;
}
#category_wrapper
{
	position:relative;
}
html{
	overflow-x:hidden;
}
div[class="col-md-2 col-md-offset-1 panel panel-primary"]:hover
{
  background-color:#e9edef;
  cursor:pointer;
  -webkit-animation:hoverEffect 1.5s;
  -moz-animation:hoverEffect 1.5s;
  -o-animation:hoverEffect 1.5s;
}

@-webkit-keyframes hoverEffect
{
  0%{
  	 transform:rotate(30deg);
  }
}	
 </style>



</head>
<body>

<div class="container-fluid">
 <div class="row">
   <br><<br><div class="col-md-12">
      <img src="Image/banner.jpg" id="banner">
   </div>
   <div class="col-md-12" id="category_wrapper">
      <div class="container">
<?php

include('\functions\admin.php');

$adminServices = new AdminServices();
$categories = $adminServices->getCategories();

?>
<?php
foreach ($categories as $key => $value) 
{
?>
         <div class="col-md-2 col-md-offset-1 panel panel-primary">
            <br>
            <a href="home/viewDisplayItems.php?category=<?php echo $value['id']; ?>"><img src="data:image;base64,<?php echo $value['categoryImg'];?>" class="center-block" style="width:60px;height:60px;"></a>
            <center><b><?php echo $value['categoryName']; ?></b></center><br>
         </div>
<?php
}
?>

   </div>
 </div>	
</div>	
</body>
   <?php 
                    require_once('modalLogin.php');
                    include('modalRegister.php');
                   ?>
</html>
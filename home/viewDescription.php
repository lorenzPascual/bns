 <?php 
    include('headerIndex.php');
    include('..\functions\Item.php');
	include('..\functions\Seller.php');
  		$itemService = new ItemServices();
	    $returnval= $itemService->GetItem($_GET['id']);
	    $sellerServices = new SellerServices();
	    $returnseller= $sellerServices->getSeller($returnval['ItemOwner']);

		/*var_dump($returnval);*/
?>
<!-- <input type="text" value="<?php echo $_GET['id']?> "> -->
<style type="text/css">

	  b{
       	color:#004445;
       }
       :not(b){
       	font-family: Arial;
   
       }
       button:focus{
       	border:2px solid #021c1e;
       }

   </style>
 		<div class="col-md-12" style="background-color:black;height:500px;"> 
         	<center><img src="data:image;base64,<?php echo $returnval['itemImage'];?>" height="500" width="400"  id="imgModal"></center>
        </div>
        <div class="col-md-12" style="background-color:#eeeeee;height:200px;position:relative;">
         	<div class="col-md-8 bg bg-danger" style="height:100%;margin-left:4%;">
         			<label id="price" style="margin-left:4%;font-size:90px;position:relative;left:-50px;">&#8369;<?php echo $returnval['ItemPrice'];?></label><br>             
          		<b><span id="imageName" style="font-family:Arial;font-size:50px"><?php echo $returnval['ItemName'];?></span></b>
      		</div>
      	</div>
      		<div  class="col-md-4" style="background-color:#021c1e;height:50%;width:17%;position:relative;float:right;top:-160px;margin-right:200px;border:3px solid #86ac41;border-radius: 15px 15px 0px 0px">
      			<br>
      			<center>
      			<span><img src="../images/moira.jpg" width="80" height="80" style="border-radius:100px 100px 100px 100px;border:3px solid white"></span><br>
      			<hr color="white">
      			<img src="../images/sellerName.png" width="30" height="30"  style="margin-left:-160px;margin-top:10px;">
      			<b><span style="color:white;margin-top:-50px;position:absolute;top:190px;">&nbsp;&nbsp;&nbsp;<?php echo $returnseller['SellerName'];?></span><br><br>
      			<img src="../images/sellerCall.png" width="30" height="30"  style="margin-left:-160px;margin-top: ">
      			<span style="color:white;margin-top:-50px;position:absolute;top:245px;">&nbsp;&nbsp;&nbsp;<?php echo $returnseller['SellerMobile'];?></span><br><br></b>
      			<button id="chatSeller" class=btn btn-block btn-lg btn-success" style="background-color:#86ac41;width:200px;height:50px;border:2px solid #021c1e"><b style="color:white;font-size:25px;">Chat Seller</b></button>
      			</center>
      		</div>
     	</div>
     <br>
     <div class="col-md-12">
          <b style="margin-left:4%;">Owner</b><br>
          <span id="itemOwner" style="margin-left:4%;"><?php echo $returnval['ItemOwner'];?></span>
          <br>
          
          <br>
          <b style="margin-left:4%;">Category</b>
          <p id="itemCategory" style="margin-left:4%;"><?php echo $returnval['ItemCategory'];?></p>
          <b style="margin-left:4%;">Description</b> 
          <p id="itemDescription" style="margin-left:4%;text-align:justify;"><?php echo $returnval['ItemDescription'];?></p>
          <br>
	</div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

       $("#chatSeller").click(function(){
        alert('Please Login First');
       });

</script>
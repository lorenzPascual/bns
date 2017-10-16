<div class="modal fade" id="productModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg bg-primary">
         <button class="close" data-dismiss="modal">&times;</button>
         <h1 id="imageName" class="modal-header"><?php echo $value['ItemName']?></h1>        
      </div>
      <div class="modal-body">
         <img height="300" width="100%" id="imgModal" src="data:image;base64,<?php echo base64_encode($value['itemImage'])?> ">   
         <br>   
          <b>Owner</b>
          <p id="itemOwner"><?php echo $value['ItemOwner']?></p>
          <b>Price</b><br>
          &#8369;&nbsp;<label id="price"></label><label><?php echo $value['ItemPrice']?></label>
          <br>
          <b>Category</b>
          <p id="itemCategory"><?php echo $value['ItemCategory']?></p>
          <b>Description</b> 
          <pre id="itemDescription"><?php echo $value['ItemDescription']?></pre>
          <textarea id="msgContent" style="width:100%;height:200px" placeholder="Message"></textarea>
          <br>
          
      </div>
      <div class="modal-footer">
         <input type="button" id="sendMsg" value='Send' style="align:right;" class="btn btn-block btn-success">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#sendMsg").click(function(){
    alert("Please Login");
  });
</script>
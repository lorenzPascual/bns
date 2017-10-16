<div class="modal fade" id="productModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <button class="close" data-dismiss="modal">&times;</button>
         <h1 id="imageName" class="modal-header"></h1>        
      </div>
      <div class="modal-body">
         <img height="260" width="500"  id="imgModal">   
         <br>   
          <b>Owner</b>
          <p id="itemOwner"></p>
          <b>Price</b><br>
          &#8369;&nbsp;<label id="price"></label>
          <br>
          <b>Category</b>
          <p id="itemCategory"></p>
          <b>Description</b> 
          <p id="itemDescription"></p>
          <textarea id="msgContent" placeholder="Message Seller" style="width:400px;"></textarea>
          <br>
          <input type="button" id="sendMsg" value='Send' style="align:right;">
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#sendMsg").click(function(){
    $.ajax({
      alert($("#msgContent").val());
      var xdata = 'Owner='+$("#itemOwner").html()+'&event_action=SendMsg&msgContent='+$("#msgContent").html()+'&about='+$("#imageName").html();
      
      url:"ajaxSeller.php",
      dataType:"json",
      type:"POST",
      data:xdata,
      success:function(data)
      {
        alert('asd')
      }
    });
  });
</script>
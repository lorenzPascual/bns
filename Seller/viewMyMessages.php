<?php
include('headerSeller.php');
require_once('..\functions\Seller.php');
include('..\functions\msg.php');

$sellerServices = new SellerServices();
$itemServices = new MsgServices();
$msg = $itemServices->getMyMsgs($_COOKIE['id']);
// var_dump($msg);
?>
<!-- <div id="messagesList">
	<button class="btnSltMsg"></button>
</div>
<div id="messageContent">
	
</div> -->
<style type="text/css">
  html
  {
    overflow-x:hidden;
  }
</style>
<!-- ali -->
<div class="container-fluid">
  <div class="row">
     <div class="col-md-2" style="height:87%;position:absolute;border-right:2px solid silver;border-top:2px solid silver">
        <div class="col-md-12 bg bg-primary" style="position:absolute;left:0">
           <h4 style="color:white">Chats</h4>
        </div>
        <br><br>
<?php 
  foreach ($msg as $key => $value) {
  $sender = '';
  if($value['sender'] == $_COOKIE['id'])
  {
    $sender = $value['reciever'];
  }
  else
  { 
    $sender = $value['sender'];
  }
  $senders = $sellerServices->getSeller($sender);

?>

<button type="button" onclick="loadMessages2(this.id)" id="<?php echo $value['id']; ?>">
        <div class="col-md-12" style="border-bottom:2px solid silver;width:100%;">
          <br>
           <img src="../deguzman.jpg" width="20px" height="20px" style="border-radius:10px" style="position:absolute;">
           <font style="font-weight:bolder">&nbsp;<?php echo $senders['SellerName']; ?></font>
           <br>
        </div>
</button>
<?php
  }
?>
               
     </div>
     <div class="col-md-10" style="height:87%;position:absolute;border-right:2px solid silver;border-top:2px solid silver;left:16.6%">
        <div class="col-md-12 bg bg-primary" style="position:absolute;left:0;height:39px">
             <img src="../pascual.jpg" width="30px" height="30px" style="position:absolute;border-radius:15px;left:10px;top:5px">
             <font style="font-weight:bolder;position:absolute;left:48px;top:7px">&nbsp;<?php echo $senders['SellerName'];?></font>
        </div>
        //lagayan ng mga messages
        <div class="col-md-12" style="position:abssolute;top:50px;black;height:470px;overflow-y:scroll" id="MsgContent">
        </div>
        
        <div class="col-md-12" style="position:absolute;top:95%;left:-15px">
           <div class="col-md-11">
              <input type="text" class="form-control" id="replyContent">
           </div>
           <div class="col-md-1"> 
            <button type="button" onclick="SendMessages()" class="btn btn-primary">Send</button>
           </div> 
        </div> 
   </div> 
 </div> 
<script type="text/javascript">
// window.onload=function(){
//   console.log('hello');
//   loadImages();
//   alert(imageObj[0]);
//   selectPage();
// };
var convoId = 0;

function loadMessages() {
        $('#MsgContent').html("");
      
        var xdata = 'event_action=getMsg&msgId='+convoId;

        // alert(xdata);
           $.ajax({
              url:"ajaxSeller.php",
              type:"POST",
              dataType: 'json',
              data:xdata,
              success:function(xobj)
              {
                $.each(xobj, function(key, value)
                {
              
                  $('#MsgContent').append(value['msgContent']+"<br>");
                })

              }
           });
      

}

function loadMessages2(clicked_id) {
        alert('asd');
        $('#MsgContent').html("");
                
        var xdata = 'event_action=getMsg&msgId='+clicked_id;
        convoId = clicked_id;
        // alert(xdata);
           $.ajax({
              url:"ajaxSeller.php",
              type:"POST",
              dataType: 'json',
              data:xdata,
              success:function(xobj)
              {
                // alert(xobj);

                $.each(xobj, function(key, value)
                {
              
	                $('#MsgContent').append(value['msgContent']+"<br>");
                })
              }
           });

}
function SendMessages()
{
      var xdata = 'event_action=SendMsg&content='+$("#replyContent").val()+'&msgId='+convoId;
        // alert(xdata);
           $.ajax({
              url:"ajaxSeller.php",
              type:"POST",
              dataType: 'json',
              data:xdata,
              success:function(xobj)
              {
                alert(xobj);
                  // $('#MsgContent').append(xobj['SellerName']);
                loadMessages();
              }
           });


}
setInterval(function(){loadMessages();} , 2500);
</script>
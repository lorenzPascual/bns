<?php
    include('..\functions\Admin.php');
    include('..\functions\item.php');
    include('..\functions\msg.php');

    // var_dump($_FILES);


	if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'loadCategory') 
	{
	  $adminService = new AdminServices();
	  $returnval= $adminService->getCategories();
	  echo json_encode($returnval);
	}

	if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'sendMessage') 
	{
	  $msgService = new MsgServices();
	  var_dump($_POST);
	  $returnval= $msgService->sendMsg($_POST['content'],$_POST['sender'],$_POST['reciever']);
	  echo json_encode($returnval);
	}

	if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'loadImages') 
	{
	  $itemService = new ItemServices();
	  $returnval= $itemService->DisplaySellerItem($_POST['Owner']);
	  echo json_encode($returnval);
	}
	if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'SaveItem') 
	{
    var_dump($_POST);

	       $image=addslashes($_FILES['file']['tmp_name']);
                // $name=addslashes($_FILES['image']['name']);
                $image = file_get_contents($image);
                $image= base64_encode($image);
		echo $image;           
	  $itemService = new ItemServices();
	  $returnval= $itemService->addItem($_POST['itemName'],$image,$_POST['itemOwner'],$_POST['itemCategory'],$_POST['itemPrice'],$_POST['itemDescription']);
	  echo json_encode($returnval);
	}
	if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'loadMessages') 
	{
	  $msgService = new MsgServices();
	  $returnval= $msgService->getMyMsgs($_COOKIE['id']);
	  
	  echo json_encode($returnval);
	}
	if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'getMsg') 
	{
	  $msgService = new MsgServices();
	  $returnval= $msgService->getConvo($_POST['msgId']);
	  // var_dump($returnval);
	  echo json_encode($returnval);
	}

	if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'SendMsg') 
	{
	  $msgService = new MsgServices();
	  $returnval= $msgService->replyMsg($_COOKIE['id'],$_POST['msgId'],$_POST['content']);
	  echo json_encode($returnval);
	}
	
?>
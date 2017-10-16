<?php
    include('..\functions\Item.php');
    include('..\functions\Admin.php');
    


	if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'chooseImage') 
	{
	  // echo "<script>alert('".$_POST."');</script>";
	  $itemService = new ItemServices();
	  $returnval= $itemService->GetItem($_POST['itemid']);
	 // echo "<pre>";
	  echo json_encode($returnval);
	}


	if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'loadCategory') 
	{
	  $adminService = new AdminServices();
	  $returnval= $adminService->getCategories();
	  echo json_encode($returnval);
	}
// if($_POST['logout'] == "logout")
// {
//   setcookie("user",$name,time()-1);
// }
// echo $_POST['logout'];
?>
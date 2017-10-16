<?php
    include('..\functions\admin.php');
    include('..\functions\seller.php');


	if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'addCategory') 
	{

    // var_dump($_POST);

	       $image=addslashes($_FILES['file']['tmp_name']);
                // $name=addslashes($_FILES['image']['name']);
                $image = file_get_contents($image);
                $image= base64_encode($image);
		// echo $image;           

	  $adminService = new adminServices();
	  $returnval= $adminService->addCategory($_POST['name'],$image);
	 // echo "<pre>";
	  echo json_encode($returnval);
	}
	if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'loadCategory') 
	{
		var_dump($_POST);
	  // echo "<script>alert('".$_POST."');</script>";
	  $sellerService = new sellerServices();
	  $returnval= $sellerService->getCategories();
	 // echo "<pre>";
	  echo json_encode($returnval);
	}

	//seller
if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'getSeller') 
{
   $sellerServices = new adminServices();
   $returnval = $sellerServices->getSeller($_POST['id']);
   echo json_encode($returnval);
}

if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'update') 
{
   $sellerServices = new adminServices();
   $sellerServices->UpdateSeller($_POST['id'],$_POST['name'],$_POST['location'],$_POST['contact'],$_POST['email'],$_POST['password']);
}

if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'delete') 
{
   $sellerServices = new adminServices();
   $sellerServices->Deleteseller($_POST['id']);
}

if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'loadTableData') 
{ 
   $sellerServices = new adminServices();
   $return = $sellerServices->Displaysellers();
   echo json_encode($return);
}

if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'loadSearch') 
{ 
   $sellerServices = new adminServices();
   $return = $sellerServices->SearchSeller($_POST['searchContent']);
   echo json_encode($return);
}
?>
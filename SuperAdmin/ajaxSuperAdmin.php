<?php
  include('..\functions\SuperAdmin.php');
  

if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'getAdmin') 
{
   $SuperAdminServices = new SuperAdminServices();
   $returnval = $SuperAdminServices->getAdmin($_POST['id']);
   echo json_encode($returnval);
}

if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'update') 
{
   $SuperAdminServices = new SuperAdminServices();
   $SuperAdminServices->UpdateAdmin($_POST['id'],$_POST['name'],$_POST['username'],$_POST['location'],$_POST['contact'],$_POST['email'],$_POST['password']);
}

if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'delete') 
{
   $SuperAdminServices = new SuperAdminServices();
   $SuperAdminServices->DeleteAdmin($_POST['id']);
}

if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'loadTableData') 
{ 
   $SuperAdminServices = new SuperAdminServices();
   $return = $SuperAdminServices->DisplayAdmins();
   echo json_encode($return);
}

if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'loadSearch') 
{ 
   $SuperAdminServices = new SuperAdminServices();
   $return = $SuperAdminServices->SearchAdmins($_POST['searchContent']);
   echo json_encode($return);
}


?>
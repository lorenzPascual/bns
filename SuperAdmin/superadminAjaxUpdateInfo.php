<?php
  include('..\functions\SuperAdmin.php');
  var_dump($_POST);
   $SuperAdminServices = new SuperAdminServices();
   $SuperAdminServices->UpdateAdmin($_POST['name'],$_POST['username'],$_POST['location'],$_POST['contact'],$_POST['email'],$_POST['password']);


?>
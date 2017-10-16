<?php
include('..\functions\SuperAdmin.php');
$SuperAdminServices = new SuperAdminServices();
$SuperAdminServices->addAdmin($_POST['name'],$_POST['username'],$_POST['location'],$_POST['contact'],$_POST['email'],$_POST['password']);
?>
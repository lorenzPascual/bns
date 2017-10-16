<?php
  require_once('..\functions\Seller.php');
   $SellerServices = new SellerServices();
   $SellerServices->UpdateUserInfo($_POST['name'],$_POST['mobile'],$_POST['location'],$_POST['email'],$_POST['password']);
   

?>
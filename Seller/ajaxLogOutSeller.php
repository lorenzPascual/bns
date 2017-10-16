<?php
    include('..\functions\Seller.php');
  if(isset($_POST['logout']))
  {
     $SellerServices = new SellerServices();
     $SellerServices->LogOutSeller();
    
  }
?>
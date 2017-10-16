<?php
      include('..\functions\Seller.php');
   if(isset($_COOKIE['id']))
    {
      $SellerServices = new SellerServices();
     $items = $SellerServices->GetUserInfo($_COOKIE['id']);
     foreach ($items as $key => $value) {
     
     }

    }
?>
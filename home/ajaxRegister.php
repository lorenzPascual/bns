<?php 
include('..\functions\Seller.php');
$sellerService = new SellerServices();
$sellerService->RegisterSeller($_POST['name'],$_POST['pass'],$_POST['location'],$_POST['number'],$_POST['email']);

?>

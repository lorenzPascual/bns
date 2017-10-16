<?php 
	include('..\functions\Seller.php');
	$sellerService = new SellerServices();
	$sellerService->LoginSeller($_POST['name'],$_POST['password']);

	$returnval= $sellerService->LoginSeller($_POST['name'],$_POST['password']);
	echo json_encode($returnval);
?>



<?php
include('..\functions\Seller.php');
$sellerService = new SellerServices();

$products = $sellerService->DisplayItem();
echo '<table>';
foreach ($products as $key => $value) {

	echo '<tr>
			<td>'.$value['ItemId'].'</td>
			<td>'.$value['ItemName'].'</td>
			<td>'.$value['ItemPrice'].'</td>
			<td>'.$value['ItemDescription'].'</td>

						  
		  </tr>';
}
echo '</table>';
?>
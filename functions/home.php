<?php 
require_once("conn.php");
include("Buyer.php");
include("Seller.php");
include("Admin.php");




class HomeServices extends Connection
{
public $link;
        // $sellerService = new SellerServices();
 
// $buyerService = new BuyerServices();
// $adminService = new AdminServices();
    protected $seller;
    protected $buyer;
    protected $admin;
    function __construct()
    {

    	$conn = new Connection();
      	$this->link = $conn->Connect();
        $this->seller = new SellerServices;
        $this->buyer = new BuyerServices;
        $this->admin = new AdminServices;
      	// return $this->link; 
    }
	public function LoginAccount($name,$pass) 
	{
        $res = '';
    	if($this->seller->LoginSeller($name,$pass)==true)
    	{
    		$res = 'Seller';
    	}
    	elseif ($this->admin->LoginAdmin($name,$pass)==true) 
    	{
    		$res = 'Admin';
    	}
        return $res;
    }

    public function LogOutSeller($cookievalue)
    { 
        setcookie('user',$cookievalue, time() -1, "/");
    }
    
	public function DisplayItem() 
	{
	  $items = array();
	  $query = mysqli_query($this->link,"SELECT * FROM  items ");
	  while($rows = mysqli_fetch_array($query))
	  {
            array_push($items, $rows);
	  }
	  return $items;
	}	
   

}
?>
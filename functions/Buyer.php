<?php 
require_once("conn.php");

class BuyerServices extends Connection
{
   
public $link;
 
 function __construct()
  {
  	$conn = new Connection();
    $this->link = $conn->Connect();
    return $this->link; 
  }
 //  public function ShowMessage() 
 //  {
	// echo'asd';

 //  }
  public function RegisterBuyer($name,$username,$pass,$location,$mobile,$email) 
  {
    $query = mysqli_query($this->link,"INSERT INTO buyer(buyerName,buyerUsername,buyerPassword,buyerLocation,buyerMoile,buyerEmail) VALUES ( '$name','$username',$pass','$location','$mobile','$email')");
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  public function LoginBuyer($name,$pass) 
  {
       
    $query = mysqli_query($this->link,"SELECT * FROM  buyer WHERE buyerUsername='".$name."' AND buyerPassword='".$pass."' ");
        if(mysqli_num_rows($query) > 0)
        {
           setcookie('user',$name, time() + 86400, "/");       
          return true;
        }
        else
        {
          return false;
          // echo json_encode($result['wrong']);
        }  
  }
  	public function SendMessage() 
	{
	  $query = mysqli_query($this->link,"INSERT INTO items(ItemName,ItemPrice,ItemDescription,ItemOwner) VALUES ( '$name','$price','$desc','$owner')");

	}
}
?>
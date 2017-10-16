<?php 
require_once("conn.php");

class SellerServices extends Connection
{
   
public $link;
 
	function __construct()
  	{
	  	$conn = new Connection();
	    $this->link = $conn->Connect();
	    return $this->link; 
	}

	public function ShowAllSeller() 
	{
	    $query = mysqli_query($this->link,"SELECT * FROM  seller ");
	    while($rows = mysqli_fetch_array($query))
		{
			echo  $rows['SellerId'];
		}

	}

	public function RegisterSeller($name,$pass,$location,$mobile,$email) 
	{
		// ,S,SellerMoile,SellerEmail
	  $query = mysqli_query($this->link,"
	  	INSERT INTO seller(SellerName,SellerPassword,SellerLocation,SellerMobile,SellerEmail) 
	  	VALUES ( '$name','$pass','$location','$mobile','$email')");
	  if($query)
	  {
	  	// return true;
	  	echo 'Register Successfully';
	  }
	  else
	  {
	  	echo 'Register Failed';
	  }
	}

	public function getSeller($id) 
	{
	 	$query = mysqli_query($this->link,"SELECT * FROM  seller WHERE SellerId='".$id."' ");
	 	if($rows = mysqli_fetch_assoc($query)){
	 		return $rows;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	}

	public function LoginSeller($name,$pass) 
	{
       
	  $query = mysqli_query($this->link,"SELECT * FROM  seller WHERE SellerName='".$name."' AND SellerPassword='".$pass."' ");
	 
	  		if(mysqli_num_rows($query) > 0)
				{
					$rows = mysqli_fetch_assoc($query);	 	
				   	//Create Cookie for Application
				   	setcookie('user',$name, time() + 86400, "/"); 
				   	setcookie('id',$rows['SellerId'], time() + 86400, "/");      
					return true;
				}
				else
				{
					return false;
				}  
	}

	public function PostItem($name,$price,$desc,$owner) 
	{

	  $query = mysqli_query($this->link,"INSERT INTO items(ItemName,ItemPrice,ItemDescription,ItemOwner) VALUES ( '$name','$price','$desc','$owner')");
	  if($query)
	  {
	  	return true;
	  }
	  else
	  {
	  	return false;
	  }
	
	}	

	public function GetMyItem($name,$pass,$location,$mobile,$email) 
	{
	  $query = mysqli_query($this->link,"INSERT INTO seller(SellerName,SellerPassword,SellerLocation,SellerMoile,SellerEmail) VALUES ( '$name','$pass','$location','$mobile','$email')");
 		echo "Record Inserted!<br/><br/><br/>";
        	
	}
    
    public function LogOutSeller()
    { 
    	//Destroy Cookie
         $cookieId =  setcookie('id',$_COOKIE['id'], time() -1, "/");
         $cookieUser = setcookie('user',$_COOKIE['user'], time() -1, "/");
         if($cookieId && $cookieUser)
         {
         	echo 'success';

         }
         else{
            return 'failed';
         }
    }
    public function DisplayMyItem()
	{
	  $items = array();
	  $query = mysqli_query($this->link,"SELECT * FROM  items");
	  while($rows = mysqli_fetch_array($query))
	  {
            array_push($items, $rows);
	  }
	  return $items;
	
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
   public function GetUserInfo($id)
   {
      $items = array();
	  $query = mysqli_query($this->link,"SELECT * FROM  seller WHERE SellerId='$id'");
	  while($rows = mysqli_fetch_array($query))
	  {      
	         //---------------------Fetch Data----------------------// 
	  	      $fetchdata = array(
		  	    	               'id'          => $rows['SellerId'],
		  	    	               'name'	     => $rows['SellerName'],
		  	    	               'location'    => $rows['SellerLocation'],
		  	    	               'mobile'      => $rows['SellerMobile'],
		  	    	               'email'       => $rows['SellerEmail'],
		  	    	               'password'    => $rows['SellerPassword']

	  	                        );
	  	    //--------------------------------------------------//
            array_push($items, $fetchdata);
	  }
	  return $items;    
   } 
  public function UpdateUserInfo($name,$mobile,$location,$email,$password)
  {
  	 $query = mysqli_query($this->link,"UPDATE seller 
  	 	                                SET SellerMobile	= '$mobile',
  	 	                                SellerLocation		= '$location',
  	 	                                SellerEmail  		= '$email',
  	 	                                SellerPassword		= '$password' 
  	 	                          WHERE SellerName          ='$name'  ");
  	 
  	 if($query)
  	 {
        echo 'Update Successfully';
  	 }
  	 else
  	 {
  	   echo 'Failed to update'; 	
  	 }
  	
  }
}
?>

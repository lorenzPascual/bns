<?php
require_once("conn.php");

class adminServices extends Connection
{
   
public $link;
 
  function __construct()
  {
  	$conn = new Connection();
    $this->link = $conn->Connect();
    return $this->link; 
  }

  public function addCategory($name,$image) 
  {
    $query = mysqli_query($this->link,"INSERT INTO category (categoryName,categoryImg) VALUES ( '$name','$image')");
          if($query){
            return true;
           }
          else{
            return false;
          }
  }
  public function getCategories() 
  {
    $items= array();
    $query = mysqli_query($this->link,"SELECT * FROM  category ");
    while($rows = mysqli_fetch_assoc($query))
    { 
      // echo $rows;
            array_push($items, $rows);
    }
    return $items;
  }

  public function getCategory($id) 
  {
    $items= array();
    $query = mysqli_query($this->link,"SELECT * FROM  category WHERE id='$id' ");
    $rows = mysqli_fetch_assoc($query);
  
    return $rows;
  }
  public function LoginAdmin($name,$pass) 
  {
        
    $query = mysqli_query($this->link,"SELECT * FROM  admin WHERE adminUsername='".$name."' AND adminPassword='".$pass."' ");
   
    		if(mysqli_num_rows($query) > 0)
  			{
  			   setcookie('user',$name, time() + 86400, "/");       
  				return true;
  			}
  			else
  			{
  				return false;
  			}  
  }

  public function GetCountCategory()
  {
       $query = mysqli_query($this->link,"SELECT * FROM category");
       $count = mysqli_num_rows($query);
       echo $count; 
  }
  public function GetCountTotalUser()
  {
       $query = mysqli_query($this->link,"SELECT * FROM seller");
       $count = mysqli_num_rows($query);
       echo $count;    
  }
  public function DisplaySellers()
  {
   $admin = array();
    $query = mysqli_query($this->link,"SELECT * FROM  seller ");
    while($rows = mysqli_fetch_array($query))
    {
            array_push($admin, $rows);
    }
    return $admin;   
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
  public function addSeller($name,$location,$mobile,$email,$password) 
  {
    $query = mysqli_query($this->link,"INSERT INTO seller(SellerName,SellerLocation,SellerMobile,SellerEmail,SellerPassword) VALUES ('$name','$location','$mobile','$email','$password')");   
   if($query)
    {
      return true;
    }
    else
    {
      return false;
    } 
  }
  public function SearchSeller($name)
  {
   $admin = array();
    $query = mysqli_query($this->link,"SELECT * FROM  seller WHERE SellerName LIKE '$name%'LIMIT 5 ");
    while($rows = mysqli_fetch_array($query))
    {
            array_push($admin, $rows);
    }
    return $admin; 
 }
  public function UpdateSeller($id,$name,$location,$mobile,$email,$password)
  {
     $query = mysqli_query($this->link,"UPDATE seller 
                                      SET
                                      SellerName  = '$name' ,
                                      SellerLocation = '$location',
                                      SellerMobile     = '$mobile',
                                      SellerEmail =      '$email',
                                      SellerPassword    = '$password'
                                      
                                WHERE SellerId = '$id'");
     if($query)
     {
        echo 'Update Successfully!';
     }
     else
     {
       echo 'Failed to Update!';   
     }
    
  }

  public function DeleteSeller($id)
  {
     $query = mysqli_query($this->link,"DELETE from 
                                      seller WHERE
                                      SellerId = '$id'");
     if($query)
     {
        echo 'Delete Successfully!';
     }
     else
     {
       echo 'Failed to Delete!';   
     }
    
  }
}
?>
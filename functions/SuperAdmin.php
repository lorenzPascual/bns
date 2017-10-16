<?php
require_once('conn.php');

class SuperAdminServices extends Connection
{
public $link;
 
  function __construct()
    {
      $conn = new Connection();
      $this->link = $conn->Connect();
      return $this->link; 
  }

  public function getAdmin($id) 
  {
    $query = mysqli_query($this->link,"SELECT * FROM  admin WHERE AdminId='".$id."' ");
    if($rows = mysqli_fetch_assoc($query)){
      return $rows;
    }
    else
    {
      return false;
    }
  }

public function addAdmin($name,$user,$location,$mobile,$email,$password) 
  {
    $query = mysqli_query($this->link,"INSERT INTO admin(AdminName,AdminUsername,AdminLocation,AdminMobile,AdminEmail,AdminPassword) VALUES ('$name','$user','$location','$mobile','$email','$password')");   
   if($query)
    {
      return true;
    }
    else
    {
      return false;
    } 
  }

public function DisplayAdmins()
  {
   $admin = array();
    $query = mysqli_query($this->link,"SELECT * FROM  admin ");
    while($rows = mysqli_fetch_array($query))
    {
            array_push($admin, $rows);
    }
    return $admin; 
 }

 public function SearchAdmins($name)
  {
   $admin = array();
    $query = mysqli_query($this->link,"SELECT * FROM  admin WHERE AdminName LIKE '%$name%' OR AdminUsername LIKE '%$name%' ");
    while($rows = mysqli_fetch_array($query))
    {
            array_push($admin, $rows);
    }
    return $admin; 
 }

 public function UpdateAdmin($id,$name,$user,$location,$mobile,$email,$password)
  {
     $query = mysqli_query($this->link,"UPDATE admin 
                                      SET 
                                      AdminUsername    = '$user',
                                      AdminLocation = '$location',
                                      AdminMobile     = '$mobile',
                                      AdminEmail =      '$email',
                                      AdminPassword    = '$password',
                                      AdminName  = '$name'
                                WHERE AdminId = '$id'");
     if($query)
     {
        echo 'Update Successfully!';
     }
     else
     {
       echo 'Failed to Update!';   
     }
    
  }

  public function DeleteAdmin($id)
  {
     $query = mysqli_query($this->link,"DELETE from 
                                      admin WHERE
                                      AdminId = '$id'");
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
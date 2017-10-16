<?php 
require_once("conn.php");

class ItemServices extends Connection
{
   
public $link;
 
 function __construct()
  {
    $conn = new Connection();
    $this->link = $conn->Connect();
    return $this->link; 
  }
  function saveimage($name,$image)
    {
      $conn=mysql_connect("localhost","root","");
      mysql_select_db("buynsell",$conn);
      $qry="INSERT into items (ItemName,ItemImage) values ('$name','$image')";
      $result=mysql_query($qry,$conn);
      if ($result) 
      {
        echo"image uploaded";

      }
      else
      {
        echo"failes";
      }
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



      // $conn=mysql_connect("localhost","root","");
      //       mysql_select_db("buynsell",$conn);
      //       $qry="Select * From image";
      //       $result=mysql_query($qry,$conn);
      //       while($row = mysql_fetch_array($result))
      //       {
      //           array_push($items, $rows);
      //           echo'<img height="300" width="300" src="data:image;base64,'.$row[2].' " >';

      //       }
  
  } 
  public function addItem($name,$image,$owner,$category,$price,$desc) 
  {
    $query = mysqli_query($this->link,"INSERT INTO items(ItemName,itemImage,ItemOwner,ItemCategory,ItemPrice,ItemDescription) VALUES ( '$name','$image','$owner','$category','$price','$desc')");
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    } 
  }
  public function DisplaySellerItem($owner)
  {
    $items = array();
    $query = mysqli_query($this->link,"SELECT * FROM  items Where itemOwner='$owner'");
    while($rows = mysqli_fetch_assoc($query))
    {
            array_push($items, $rows);
    }
    return $items;
  
  }
  public function DisplaySellerItemCategory($owner,$category)
  {
    $items = array();
    $query = mysqli_query($this->link,"SELECT * FROM  items Where itemOwner='$owner' ItemCategory='$category'");
    while($rows = mysqli_fetch_assoc($query))
    {
            array_push($items, $rows);
    }
    return $items;
  
  }
  public function DisplayItemCategory($category)
  {
    $items = array();
    $query = mysqli_query($this->link,"SELECT * FROM  items Where ItemCategory='$category' ");
    while($rows = mysqli_fetch_assoc($query))
    {
            array_push($items, $rows);
    }
    return $items;
  
  } 
   public function GetItem($id)
  {
    $query = mysqli_query($this->link,"SELECT * FROM  items WHERE ItemId='$id' ");
    $rows = mysqli_fetch_assoc($query);
    return $rows;
  
  } 
  public function GetItemCategory($category)
  {
    return 'asd';
  }

  public function GetItemPage($id)
  {
    $items = array();
    $query = mysqli_query($this->link,"SELECT * FROM  items LIMIT $id , 12 ");
   while($rows = mysqli_fetch_assoc($query))
    {
            array_push($items, $rows);
    }
    return $items;
  
  } 
  
  public function GetItemPageNum()
  {
    $items = array();
    $query = mysqli_query($this->link,"SELECT * FROM  items ");
    
    while($rows = mysqli_fetch_assoc($query))
    {
            array_push($items, $rows);
    }
    $total =count($items);
    return $total;
  
  }

  public function GetItemPageCat($id,$cat)
  {
    $items = array();
    $query = mysqli_query($this->link,"SELECT * FROM  items WHERE ItemCategory='$cat' LIMIT $id , 12 ");
   while($rows = mysqli_fetch_assoc($query))
    {
            array_push($items, $rows);
    }
    return $items;
  
  } 
  
  public function GetItemPageNumCat($cat)
  {
    $items = array();
    $query = mysqli_query($this->link,"SELECT * FROM  items WHERE ItemCategory='$cat' ");
    
    while($rows = mysqli_fetch_assoc($query))
    {
            array_push($items, $rows);
    }
    $total =count($items);
    return $total;
  
  }

public function GetItemPageSeller($id,$sellerId)
  {
    $items = array();
    $query = mysqli_query($this->link,"SELECT * FROM  items WHERE ItemOwner='$sellerId' LIMIT $id , 12 ");
   while($rows = mysqli_fetch_assoc($query))
    {
            array_push($items, $rows);
    }
    return $items;
  
  } 
  
  public function GetItemPageNumSeller($id)
  {
    $items = array();
    $query = mysqli_query($this->link,"SELECT * FROM  items WHERE ItemOwner='$id' ");
    
    while($rows = mysqli_fetch_assoc($query))
    {
            array_push($items, $rows);
    }
    $total =count($items);
    return $total;
  
  } 
  
}

?>

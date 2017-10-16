<?php 
require_once("conn.php");

class MsgServices extends Connection
{
   
public $link;
 
 function __construct()
  {
    $conn = new Connection();
    $this->link = $conn->Connect();
    return $this->link; 
  }


  public function getConvo($msgId) 
  {
    $items = array();
    $query = mysqli_query($this->link,"SELECT * FROM  replys WHERE msgId='$msgId' ");
    while($rows = mysqli_fetch_assoc($query))
    {
      array_push($items, $rows);
    }
    return $items;
  }
  public function getMyMsgs($owner) 
  {
    $items = array();
    $query = mysqli_query($this->link,"SELECT * FROM  messages WHERE reciever='$owner' OR sender='$owner' ");
    while($rows = mysqli_fetch_assoc($query))
    {
      array_push($items, $rows);
    }
    return $items;
  }

  public function sendMsg($content,$sender,$reciever,$about) 
  {
    $query = mysqli_query($this->link,"INSERT INTO messages(content,sender,reciever,about) VALUES ( '$content','$sender','$reciever','$about')");
    if($query)
    {
      return true;
    } 
    else
    {
      return false;
    }         
  }
  public function replyMsg($replyer,$msgId,$msgContent) 
  {
    $query = mysqli_query($this->link,"INSERT INTO replys(replyer,msgId,msgContent) VALUES ( '$replyer','$msgId','$msgContent')");
    if($query)
    {
      return true;
    } 
    else
    {
      return false;
    }              
  }


}

?>

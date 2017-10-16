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

  public function sendMsg($content,$sender,$reciever) 
  {

    $return = false;

    $query = mysqli_query($this->link,"SELECT * FROM  messages WHERE (reciever='$reciever' AND sender='$sender') OR (sender='$reciever' AND reciever='$sender') ");
    if(mysqli_num_rows($query) > 0)
    {
      $return = false;
    } 
    else
    {
      $return = true;
        $query3 = mysqli_query($this->link,"INSERT INTO messages(content,sender,reciever) VALUES ( '$content','$sender','$reciever')");
        if($query3)
        {
            $last_id = $this->link->insert_id;
            $query2 = mysqli_query($this->link,"INSERT INTO replys(replyer,msgId,msgContent) VALUES ( '$sender','$last_id','$content')");
            if($query2)
            {
              $return = true;
            } 
            else
            {
              $return = false;
            }
        } 
        else
        {
          $return = false;
        }
    }
    return $return;
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

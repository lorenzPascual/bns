<?php
    include('..\functions\home.php');
    if(isset($_POST['event_action']) && trim($_POST['event_action']) == 'login') 
    {
      // echo "<script>alert('".$_POST."');</script>";
      $homeService = new HomeServices();
      $returnval= $homeService->LoginAccount($_POST['name'],$_POST['password']);
      echo json_encode($returnval);
    }



?>
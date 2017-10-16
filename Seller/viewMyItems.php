<style type="text/css" rel="stylesheet">
  ::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(250,0,0,0.8); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
  a:hover img
  {
     -webkit-animation:ImageEffect 1s;
     -moz-animation:ImageEffect 1s;
     -o-animation:ImageEffect 1s; 
  }
  @-webkit-keyframes ImageEffect{
     0%{
        transform:rotate(30deg);
     }
  }
</style>
<?php

include('headerSeller.php');

include('..\functions\item.php');

$itemServices = new ItemServices();
if(isset($_GET['page'])){
 $prod = ($_GET['page']-1)*12;
$products = $itemServices->GetItemPageSeller($prod,$_COOKIE['id']);

}
else
{
$products = $itemServices->GetItemPageSeller(0,$_COOKIE['id']);
}
$productNum = $itemServices->GetItemPageNumSeller($_COOKIE['id']);
$pages = $productNum/12;
?>
  <html>
  <head>
  </head>
  <body>
   <hr>
    <center>
<?php
foreach ($products as $key => $value) 
{
?>
  <div class="col-md-4">
  <a href="viewDescription.php?id=<?php echo $value['ItemId']; ?> "><img src='data:image;base64,<?php echo $value['itemImage'];?>' id='<?php echo $value['ItemId'];?>' class='img img-thumbnail' style='width:220px;height:200px;border-radius:10px;border-color:gray' id="img"/></a>
          <br>
          <span><h4><?php echo $value['ItemName']; ?></h4></span>
          <br>
          <span style="position:absolute;background-color:black;color:white;left:60%;z-index:1;top:170px">₱&nbsp;<?php echo $value['ItemPrice']; ?></span>
          <span class=""></span>
  </div>
<?php

}

?>
  <div class="col-md-12" style="background-color:#004a90;height:100px;margin-top:50px;">
        <br><br>
            <span style="font-size:20px;font-weight:bold;color:#eeeeee;margin-bottom:90px;">
        <?php
          if($pages<=1){
        ?>  
                <a href="#" style="color:#eeeeee;">1</a>&nbsp; 
        <?php
          }
          else
          {
            for($a=1;$a<=$pages+1;$a++)
            {
        ?>
                <a href="viewMyItems.php?page=<?php echo $a;?>" style="color:#eeeeee;"><?php echo $a;?></a>&nbsp;
        <?php
            }
          }
          ?>
              </span>
        <br><br><br><br>
  </div>
  <div id="pages">
  
</div>

<?php

?>

</table>
<script type="text/javascript">
       $("#add").click(function(){
          $('#ModalPostItem').modal('show'); 

       });
</script>
  <center>
  </body>
  </html>


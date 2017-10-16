
<?php
include('headerIndex.php');

include('..\functions\item.php');

$itemServices = new ItemServices();
$catstring = "";

if(isset($_GET['search']))
{
$catstring = "&category=".$_GET['category']."&search=s".$_GET['search'];

}
if(isset($_GET['category']))
{
$catstring = "&category=".$_GET['category'];

  if(isset($_GET['page'])){
   $prod = ($_GET['page']-1)*12;
  $products = $itemServices->GetItemPageCat($prod,$_GET['category']);

  }
  else
  {
  $products = $itemServices->GetItemPageCat(0,$_GET['category']);
  }

  $productNum = $itemServices->GetItemPageNumCat($_GET['category']);
  $pages = $productNum/12;

}
else
{

  if(isset($_GET['page'])){
   $prod = ($_GET['page']-1)*12;
  $products = $itemServices->GetItemPage($prod);

  }
  else
  {
  $products = $itemServices->GetItemPage(0);
  }
  $productNum = $itemServices->GetItemPageNum();
  $pages = $productNum/12;

}

?>
    <div class="col-md-12" style="background-color:#004445;height:100px;margin-top:20px;">
      <br>
          <span style="color:#eeeeee;font-size:35px;margin-left:100px;"><b>Browse Items</b></span>
    </div>
    <center>
<?php
foreach ($products as $key => $value) 
{
?>
  <br>
  <br>
  <div class="col-md-4" >
  <!-- <a href=""> -->
  <a href="viewDescription.php?id=<?php echo $value['ItemId']; ?> "><img src='data:image;base64,<?php echo $value['itemImage'];?>' id='<?php echo $value['ItemId'];?>' class='img' style='width:220px;height:200px'/></a>
          <br>
          <span><b><?php echo $value['ItemName']; ?></b></span>
          <br>
          <span> <?php echo $value['ItemPrice']; ?></span>
  </div>
<?php

}

?>
  <div class="col-md-12" style="background-color:#004445;height:100px;margin-top:50px;">
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
                <a href="viewDisplayItems.php?page=<?php echo $a.$catstring;?>" style="color:#eeeeee;"><?php echo $a;?></a>&nbsp;
        <?php
            }
          }
          ?>
              </span>
        <br><br><br><br>
  </div>
  <center>

<div id="pages">
  
</div>
<script type="text/javascript">
//   var productsSize=0;
//   var pages=0;
//   var imageObj = new Array(2);
//   window.onload=function(){
//   console.log('hello');
//   loadImages();
//   alert(imageObj[0]);
//   selectPage();
// };
// function selectPage(){
//   for(var a=1;a<12;a++){
//     $('#divImg'+a).append("<button type='button' id='btn"+a+"' value'"+a+"'>"+a+"</button>");
//     $('#divImg'+a).append("<img src='data:image;base64,"+imageObj[a]['itemImage']+"' id='"+imageObj[a]['itemImage']+"' class='img' style='width:100px;height:100'/>"); 
  
//   }
        
// }
// function loadImages() {
//         var xdata = 'Owner=1&event_action=loadImages';
//         // alert(xdata);
//         $('#DivImageLoader').html("");           
//            $.ajax({
//               url:"ajaxSeller.php",
//               type:"POST",
//               dataType: 'json',
//               data:xdata,
//               success:function(xobj)
//               {
//                 pages = xobj.length / 3;
//                 imageObj = xobj;
//                 alert(pages);

                
//                 $.each(xobj, function(key, value)
//                 {
//                   xobj.push(value);
//                 })
//                 // var initcounter = pages
//                 // for(var a=pages){
                  
//                 // }
//                 $.each(xobj, function(key, value)
//                 {
//                 // alert(value['ItemId']);

//                 $('#DivImageLoader').append("<img src='data:image;base64,"+value['itemImage']+"' id='"+value['ItemId']+"' class='img' style='width:100px;height:100'/>"); 
//                 })
//               }
//            });

// }

       $("#add").click(function(){
          $('#ModalPostItem').modal('show'); 

       });
</script>
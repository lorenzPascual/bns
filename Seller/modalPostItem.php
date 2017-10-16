 <div class="modal fade" id="ModalPostItem">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#2fb1cb">
        <button type="button" data-dismiss="modal" class="close">&times;</button>
        <h1 class="modal-title" style="color:white">Add</h1>
      </div>
      <div class="modal-body">
        <div id="DivSave">
          <div class="container">
             <div class="row">
               <div class="col-md-12">
                   <div class="col-md-1"><b>Image</b></div>
                   <div class="col-md-4"><input type="file" name="itemImage" id="file" class="form-control"/></div>
               </div>
               <div class="col-md-12">
                   <div class="col-md-1"><b>Name</b></div>
                   <div class="col-md-4"><input type="text" name="itemName" id="itemName" class="form-control"/></div>
               </div>
               <div class="col-md-12">
                   <div class="col-md-1"><b>Category</b></div>
                   <div class="col-md-4">
                     <select id="sltItemCat" name='itemCategory' class="form-control"></select>
                   </div>
               </div>
               <div class="col-md-12">
                   <div class="col-md-1"><b>Item Description</b></div>
                   <div class="col-md-4">
                     <input type="text" name="itemDescription" id="itemDescription" class="form-control"/>
                   </div>
               </div>
               <div class="col-md-12">
                   <div class="col-md-1"><b>Item Price</b></div>
                   <div class="col-md-4">
                   <input type="text" name="itemPrice" id="itemPrice" class="form-control"/>
                   </div>
               </div>
               <div class="col-md-12">
                   <div class="col-md-12">
                      <input type="text" name="itemOwner" id="itemOwner" style="display:none" value="<?php echo $_COOKIE['id']?>" >
                   </div>
               </div>
               <div class="container">
                 <div class="col-md-12">
                    <div class="col-md-2">
                            <input type="button" id="UpItem" name="sumit" value="Upload" class="btn-block btn btn-success" style="margin-left:275px">
                     </div> 
               </div> 
               </div>

             </div>
           </div> 
        </div>


      </div>
      <div class="modal-footer">

      </div>  
    </div>
   </div> 
 </div>
<script type="text/javascript">
$('#ModalPostItem').on('shown.bs.modal', function (e) {
  loadCategory();
})

    function loadCategory()
    {
          var xdata = 'event_action=loadCategory';
         
           jQuery.ajax
           ({
              url:"ajaxSeller.php",
              dataType:"json",
              type:"POST",
              data:xdata,
              success:function(xobj)
              {
                $.each(xobj, function(key, value)
                {
                   $('#sltItemCat').append("<option id='1' value='"+value['id']+"' >"+value['categoryName']+"</option>");
                })
              }
           });
    }

        $("#UpItem").click(function(){
          // dataobject

          //-----------------
          var property = document.getElementById("file").files[0];
          var form_data= new FormData();
          form_data.append("file",property);
          form_data.append("event_action","SaveItem");
          form_data.append("itemName",$("#itemName").val());
          form_data.append("itemDescription",$("#itemDescription").val());
          form_data.append("itemOwner",$("#itemOwner").val());
          form_data.append("itemPrice",$("#itemPrice").val());
          form_data.append("itemCategory",$("#sltItemCat").val());
             
            $.ajax({
              url:"ajaxSeller.php",
              dataType:"json",
              type:"POST",
              data:form_data,
              cache: false,
              contentType: false,
              processData: false,
              success:function(data)
              {
                window.href="viewMyItems.php";
              },
              error:function(error)
              {
                console.log(error);
              }
           });

        });

</script>
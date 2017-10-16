 <div class="modal fade" id="modalAddCategory">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#2fb1cb">
      	<button type="button" data-dismiss="modal" class="close">&times;</button>

        
        <center><h1 class="modal-title" style="color:white">Add Category</h1></span></center>
        </div>
      <div class="modal-body">
        <div id="DivCategory">          
					<!-- <input type='text' name='category' id="category" placeholder="Category" class="form-control"/><br> -->
           <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
            <input id="category" type="text" class="form-control" name="category" placeholder="Category">
          </div>
          <br>
				  <input type="file" name="image" id="image"><br>
        	<input type='button' name='Add' value='Add Category' id="add" class="btn btn-block btn-success" />
        </div>
      </div>
      <div class="modal-footer">

      </div>	
    </div>
   </div>	
 </div>
</div>
<script>
  $(function(){

     $("#add").click(function(){
          var property = document.getElementById("image").files[0];
          var form_data= new FormData();
          form_data.append("file",property);
          form_data.append("name",$("#category").val());
          alert(form_data);
          form_data.append("event_action","addCategory");
          console.log(form_data); 
           $.ajax({
              url:"ajaxAdmin.php",
              dataType:"json",
              type:"POST",
              data:form_data,
              cache: false,
              contentType: false,
              processData: false,
              success:function(data)
              {
                
              },
              error:function(error)
              {
                console.log(error);
              }
           });                
      });
  });
</script>
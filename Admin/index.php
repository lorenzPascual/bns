<?php 
include("headerAdmin.php");
include("modalAddCategory.php");
?>
<button type="button" id='btnCategory'>Add Category</button>

<script type="text/javascript">
	 $(function(){
       $("#btnCategory").click(function(){
       	alert(this.id);
         
                $('#modalAddCategory').modal('show'); 

       });
        
  });
</script>
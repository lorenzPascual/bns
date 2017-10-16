 <div class="modal fade" id="loginModal">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#2fb1cb">
      	<button type="button" data-dismiss="modal" class="close">&times;</button>
        <h1 class="modal-title" style="color:white">Login</h1>
      </div>
      <div class="modal-body">
        <div id="DivLogin">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="name" type="text" class="form-control" name="name" placeholder="Username">
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
          </div> 
          <br>  
					<input type='button' name='login' value='Login' id="login" class="btn btn-block btn-success" />
          <input type='button' name='register' value='Register' id="register" class="btn btn-block btn-warning" data-dismiss="modal"/>
        </div>
      </div>
      <div class="modal-footer">

      </div>	
    </div>
   </div>	
 </div>
<script>
  $(function(){
       $("#register").click(function(){
        
         $('#registerModal').modal('show');
       });
       $("#login").click(function(){
          var xdata = $("#DivLogin *").serialize()+'&event_action=login';
          var name = $("#name").val();
          var pass = $("#password").val();
          
          if(name!=="" || pass!=="")
          {
             $.ajax({
              url:"home/ajaxLogin.php",
              type:"POST",
              dataType:"json",
              data:xdata,
              success:function(data)
              {
                 if(data == "Seller")
                 {
                    alert("Welcome Seller");
                    window.location.href = "Seller/bodyIndex.php";
                 }
                 else if(data == "Admin")
                 {
                    alert("Welcome Admin");
                     window.location = "Admin/AdminDashboard.php";
                 }
                 else if(data == "")
                 {
                    alert("wrong username or password");
                 }
              }
            });
          }  
          else{

            alert("Please Fillup Required Field");
          } 

       });
       $("#username").click(function(){
            window.location.href = "SellProduct.php";
       });
               
  });
</script>
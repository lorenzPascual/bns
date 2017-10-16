<!-- <div class="modal fade" id="editmodal-<?php echo $value['AdminId']?>">
                   <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                                
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input id="name" type="text" class="form-control" name="name" placeholder="Username" value="<?php echo $value['AdminUsername']?>" id="<?php echo $value['AdminId']?>">
                           </div>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                          <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                           value="<?php echo $value['AdminPassword']?>" id="<?php echo $value['AdminId']?>">
                       </div> 
                    <br>  
                <input type='button' name='login' value='Login' id="login" class="btn btn-block btn-success" />
                      <input type='button' name='register' value='Register' id="register" class="btn btn-block btn-warning" data-dismiss="modal"/>
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
        alert(xdata);
           
           $.ajax({
              url:"home/ajaxLogin.php",
              type:"POST",
              dataType:"json",
              data:xdata,
              success:function(data)
              {
                // alert(data);
                // if(data=='Seller')
                // {
                //   alert("im am a seller");
                // }
                 if(data == "Seller")
                 {
                    alert("Welcome Seller");
                    window.location.href = "Seller/SellerHome.php";
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

       });
       $("#username").click(function(){
            window.location.href = "SellProduct.php";
       });
               
  });
</script> -->
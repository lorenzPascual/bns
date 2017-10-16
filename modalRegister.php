 <div class="modal fade" id="registerModal">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#2fb1cb">
        <button type="button" data-dismiss="modal" class="close" id="close">&times;</button>
        <h2 class="modal-title" style="color:white"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Registration</h2>
      </div>
      <div class="modal-body">
        <div id="DivRegister">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="names" type="text" class="form-control" placeholder="Name">
                </div>
              
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="passwords" type="password" class="form-control" placeholder="Password">
                </div> 
         
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
                <input id="repasswords" type="password" class="form-control"  placeholder="Retype Password">
              </div>

              <div class="input-group"> 
                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                <select class="form-control" placeholder="Location" id="locations">
                     <option>Caloocan</option>
                     <option>Las Piñas‎</option>
                     <option>Makati</option>
                     <option>Malabon</option>
                     <option>Mandaluyong</option>
                     <option>Manila</option>
                     <option>Marikina</option>
                     <option>Muntinlupa</option>
                     <option>Navotas</option>
                     <option>Parañaque</option>
                     <option>Pasay</option>
                     <option>Pasig</option>
                     <option>Quezon City</option>
                     <option>San Juan</option>
                     <option>Taguig</option>
                     <option>Valenzuela</option>
                 </select>
              </div>

              <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span> 
               <input id="number" type="text" class="form-control" placeholder="Phone Number">  
              </div> 
             <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span> 
               <input id="email" type="email" class="form-control" placeholder="Email Address">  
             </div>

             <button type='button' id="registers" class="btn btn-block btn-success">Register</button> 
          </div>
       
     </div>
      <div class="modal-footer">

      </div>  
    </div>
   </div> 
 </div>
<script>
  $(function(){
       $("#login").click(function(){
          var xdata = $("#DivLogin *").serialize()+'&event_action=login';
        // alert(xdata);
           
           $.ajax({
              url:"home/ajaxLogin.php",
              type:"POST",
              data:xdata,
              success:function(data)
              {
                console.log(data);
                 if(data == 'Seller')
                 {
                    alert("Welcome Seller");

                    window.location = 'Seller/SellerHome.php';
                 }
                 if(data == "Admin")
                 {
                    alert("Welcome Admin");
                    window.location = 'Admin/Index.php';
                 }
                 if(data == '')
                 {
                    alert("wrong username or password");
                 }
              }
           });
         
       });
       $("#username").click(function(){
            window.location.href = "SellProduct.php";
       });

       //register
       $("#registers").click(function(){
          var name = $('#names').val();
          var pass = $("#passwords").val();
          var repas = $("#repasswords").val();
          var loc = $("#locations").val();
          var number = $("#number").val();
          var email = $("#email").val();
          var dataString = "name="+name+"&pass="+pass+"&repas="+repas+"&location="+loc+"&number="+number+"&email="+email;
       if(name!==""||pass!==""||repas!==""||loc!==""||number!==""||email!=="")
       {
          if(pass==repas)
          {
             $.ajax({
               url:"home/ajaxRegister.php",
               type:"POST",
               data:dataString,
               success:function(data){
                  ClearData();
                  alert(data);
                        
                } 
             });
             alert("Correct");
          }
          else
          {
            alert("password did not match");
          }
        }
        else{
          alert("Please Fillup Require Field");
        }  
       });

      function ClearData()
      {
        document.getElementById('names').value ="";
        document.getElementById('passwords').value ="";
        document.getElementById('repasswords').value ="";
        document.getElementById('locations').value ="Caloocan";
        document.getElementById('number').value ="";
        document.getElementById('email').value ="";
      }

      inputValidation();
      // $("#email").keypress(function(){
      //         var regexEmail =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      //            var email = $(this);

      //             if (regexEmail.test(email.val())) {
      //                 alert("It's Okay")
      //             } else {
      //                 alert("Not Okay")

      //             }    
      // });
     function inputValidation()
     {      
                $("#number").keypress(function(e){
                if(e.keyCode < 47 || e.keyCode > 57)
                        {   
                          e.preventDefault();
                        }
                   var number = $("#number").val();
                   if(number.length==11)
                   {
                      e.preventDefault();
                   }       
               });
             
             
                // $("#search_house").keypress(function(e){
                //    if(e.keyCode != 8 &&  e.keyCode!=32 &&(e.keyCode < 65 || e.keyCode > 90) && (e.keyCode < 97 || e.keyCode >122))
                //         {   
                //           e.preventDefault();
                //         }
                //   });
               //  $("#member").keypress(function(e){
               
      }
  });
</script>
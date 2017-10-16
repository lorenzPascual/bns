<?php
include('headerAdmin.php');
include('..\functions\Admin.php');
include('modalUpdate.php');
$adminServices = new adminServices();
$products = $adminServices->DisplaySellers();

?>	

<style type="text/css">

table {  
    color: #333;
    font-family: Helvetica, Arial, sans-serif;
    width: 640px; 
    border-collapse: 
    collapse; border-spacing: 0; 
}

td, th {  
    border: 1px solid transparent; /* No more visible border */
    height: 30px; 
    transition: all 0.3s;  /* Simple transition for hover effect */
}

th {  
    background: #DFDFDF;  /* Darken header a bit */
    font-weight: bold;
}

td {  
    background: #FAFAFA;
    text-align: center;
}


/* Cells in even rows (2,4,6...) are one color */        
tr:nth-child(even) td { background: #F1F1F1; }   

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */        
tr:nth-child(odd) td { background: #FEFEFE; }  

tr td:hover { background: #666; color: #FFF; }  
/* Hover cell effect! */

	/*th{
		padding: 20px 5px 20px 5px;
		text-align:center;
		border:1px solid black;
	}
	tr{
		text-align: center;
		border:1px solid black;
		font-family: sans-serif;
		height: 59px;
		font-size:15px;
	}
	input{
    outline:none;
}*/
</style>
<div class="col-md-9">
<h1 style="color:#4b4345;" align="left"><span class="glyphicon glyphicon-list-alt"></span> | View Sellers</h1>
			<div class="input-group" style="width:50%;left:30%;">
				<input type="text" id="searchBox" class="form-control" placeholder="Search" onkeyup="loadSearch()">
                  <span class="input-group-addon" id="search" onkeypress="loadSearch()" type="button"><i class="glyphicon glyphicon-search"></i></span>
    		</div> 
    		<br>

<div id="table">
   <!--  style="padding-left: 10px;width:110%;" -->
	<table id="tablee" class="table" class="table table-bordered table-striped">		
		<tr>
		<th>ID</th>
		<th>Full Name</th>
		<th>Location</th>
		<th>Contact No.</th>
		<th>E-Mail</th>
		<th>Password</th>
		<th colspan="2">Tools</th>
       <th colspan="2">Delete</th>
       
		</tr>
         
	</table>
</div>   





<script type="text/javascript">

	window.onload=function(){
	  loadTableData();
	};

	$("#openModal").click(function(){
		$("#editmodal").modal("show");
	});
function loadModal(click_id){
       var dataString = "id="+click_id+"&event_action=getSeller";
             $.ajax({
                 url:"ajaxAdmin.php",
                 type:"POST",
                 dataType:"json",
                 data:dataString,
                 success:function(data)
                 {
             		$("#id").val(data['SellerId']);
             		$("#name").val(data['SellerName']);
             		$("#location").val(data['SellerLocation']);
             		$("#contact").val(data['SellerMobile']);
             		$("#email").val(data['SellerEmail']);
             		$("#password").val(data['SellerPassword']);
					$("#editmodal").modal("show");
		
                 }   
             }); 
     

}

	$("#update").click(function(){
			var id     = $("#id").val();
         	 var name     = $("#name").val();
         	 var location = $("#location").val();
         	 var contact   = $("#contact").val();
         	 var email    = $("#email").val();
         	 var password = $("#password").val();
		

           var dataString = "id="+id+"&name="+name+"&location="+location+"&contact="+contact+"&email="+email+"&password="+password+"&event_action=update";
             $.ajax({
                 url:"ajaxAdmin.php",
                 type:"POST",
                 data:dataString,
                 success:function(data)
                 {
                 	alert(data);
                 	loadTableData();
                 }   
             }); 
        });

	function deleteItem(click_id){
		var dataString = "id=" + click_id + "&event_action=delete";
		$.ajax({
                 url:"ajaxAdmin.php",
                 type:"POST",
                 data:dataString,
                 success:function(data)
                 {
                 	alert(data);
                 	loadTableData();
                 }   
             });
	}

	function loadSearch(){
		$("#tablee").html("");
		$("#tablee").append('<tr><th>ID</th><th>Full Name</th><th>Location</th><th>Contact No.</th><th>E-Mail</th><th>Password</th><th colspan="2">Tools</th><th>Delete</th></tr>');
		var searchdata = $("#searchBox").val();
		var dataString = "event_action=loadSearch"+ "&searchContent=" + searchdata;
		
		$.ajax({
                 url:"ajaxAdmin.php",
                 type: "POST",
                 data: dataString,
                 dataType: "json",
                 success: function(data)
                 {
                 	
                 	$.each(data, function(key, value)
                	 	{

              				 $('#tablee').append("<tr><td>" + value["SellerId"] + "</td><td>" + value["SellerName"] + "</td><td>" + value["SellerLocation"] + "</td><td>" + value["SellerMobile"] + "</td><td>" + value["SellerEmail"] + "</td><td>" + value["SellerPassword"] + "</td><td><button onclick='loadModal(this.id)' id='"+value["SellerId"]+"' type='button' class='openModal'><span class='glyphicon glyphicon-edit' style='position:relative;margin-left:10px;margin-right:10px;'></span></button></td><td><td><button onclick='deleteItem(this.id)' type='button' id='"+value["SellerId"]+"'><span class='glyphicon glyphicon-erase' style='position:relative;margin-left:10px;margin-right:10px;color:red;'></span></button></td></tr>");     			
              		    })
                 	
                 }   
             });
		
	}

	

	function loadTableData(){
		$("#tablee").html("");
		$("#tablee").append('<tr><th>ID</th><th>Full Name</th><th>Location</th><th>Contact No.</th><th>E-Mail</th><th>Password</th><th colspan="2">Tools</th><th colspan="2">Delete</th></tr>');
		var dataString = "event_action=loadTableData";
		
		$.ajax({
                 url:"ajaxAdmin.php",
                 type: "POST",
                 data: dataString,
                 dataType: "json",
                 success: function(data)
                 {
                 	
                 	$.each(data, function(key, value)
                	 	{

              				 $('#tablee').append("<tr><td>" + value["SellerId"] + "</td><td>" + value["SellerName"] + "</td><td>" + value["SellerLocation"] + "</td><td>" + value["SellerMobile"] + "</td><td>" + value["SellerEmail"] + "</td><td>" + value["SellerPassword"] + "</td><td><button onclick='loadModal(this.id)' id='"+value["SellerId"]+"' type='button' class='openModal'><span class='glyphicon glyphicon-edit' style='position:relative;margin-left:10px;margin-right:10px;'></span></button></td><td><td><button onclick='deleteItem(this.id)' type='button' id='"+value["SellerId"]+"'><span class='glyphicon glyphicon-erase' style='position:relative;margin-left:10px;margin-right:10px;color:red;'></span></button></td></tr>");     			
              		    })
                 	
                 }   
             });
		
	}



</script>
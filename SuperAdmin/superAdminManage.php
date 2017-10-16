<?php
include('superAdminHeader.php');
include('..\functions\superAdmin.php');
include('modalUpdate.php');
$superAdminServices = new superAdminServices();
$products = $superAdminServices->DisplayAdmins();

?>	

<style type="text/css">
	th{
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
}
</style>
<div class="col-md-9">
<h1 style="color:#4b4345;" align="left"><span class="glyphicon glyphicon-list-alt"></span> | View Admins</h1>
			<div class="input-group" style="width:50%;left:30%;">
				<input type="text" id="searchBox" class="form-control" placeholder="Search" onkeyup="loadSearch()">
                  <span class="input-group-addon" id="search" onkeypress="loadSearch()" type="button"><i class="glyphicon glyphicon-search"></i></span>
    		</div> 
    		<br>

<div id="table">
	<table id="tablee" style="padding-left: 10px;width:110%;" border="5">
		
		<tr>
		<th>ID</th>
		<th>Full Name</th>
		<th>Username</th>
		<th>Location</th>
		<th>Contact No.</th>
		<th>E-Mail</th>
		<th>Password</th>
		<th colspan="2">Tools</th>
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
	alert(click_id);
       var dataString = "id="+click_id+"&event_action=getAdmin";
             $.ajax({
                 url:"ajaxSuperAdmin.php",
                 type:"POST",
                 dataType:"json",
                 data:dataString,
                 success:function(data)
                 {
             		$("#id").val(data['AdminId']);
             		$("#name").val(data['AdminName']);
             		$("#username").val(data['AdminUsername']);
             		$("#location").val(data['AdminLocation']);
             		$("#contact").val(data['AdminMobile']);
             		$("#email").val(data['AdminEmail']);
             		$("#password").val(data['AdminPassword']);
					$("#editmodal").modal("show");
		
                 }   
             }); 
     

}

	$("#update").click(function(){
			var id     = $("#id").val();
         	 var name     = $("#name").val();
         	 var username = $("#username").val();
         	 var location = $("#location").val();
         	 var contact   = $("#contact").val();
         	 var email    = $("#email").val();
         	 var password = $("#password").val();
		

           var dataString = "id="+id+"&name="+name+"&username="+username+"&location="+location+"&contact="+contact+"&email="+email+"&password="+password+"&event_action=update";
             $.ajax({
                 url:"ajaxSuperAdmin.php",
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
		alert(click_id);

		var dataString = "id=" + click_id + "&event_action=delete";
		$.ajax({
                 url:"ajaxSuperAdmin.php",
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
		$("#tablee").append('<tr><th>ID</th><th>Full Name</th><th>Username</th><th>Location</th><th>Contact No.</th><th>E-Mail</th><th>Password</th><th colspan="2">Tools</th></tr>');
		var searchdata = $("#searchBox").val();
		var dataString = "event_action=loadSearch"+ "&searchContent=" + searchdata;
		
		$.ajax({
                 url:"ajaxSuperAdmin.php",
                 type: "POST",
                 data: dataString,
                 dataType: "json",
                 success: function(data)
                 {
                 	
                 	$.each(data, function(key, value)
                	 	{

              				 $('#tablee').append("<tr><td>" + value["AdminId"] + "</td><td>" + value["AdminName"] + "</td><td>" + value["AdminUsername"] + "</td><td>" + value["AdminLocation"] + "</td><td>" + value["AdminMobile"] + "</td><td>" + value["AdminEmail"] + "</td><td>" + value["AdminPassword"] + "</td><td><button onclick='loadModal(this.id)' id='"+value["AdminId"]+"' type='button' class='openModal'><span class='glyphicon glyphicon-edit' style='position:relative;margin-left:10px;margin-right:10px;'></span></button></td><td><td><button onclick='deleteItem(this.id)' type='button' id='"+value["AdminId"]+"'><span class='glyphicon glyphicon-erase' style='position:relative;margin-left:10px;margin-right:10px;color:red;'></span></button></td></tr>");     			
              		    })
                 	
                 }   
             });
		
	}

	

	function loadTableData(){
		$("#tablee").html("");
		$("#tablee").append('<tr><th>ID</th><th>Full Name</th><th>Username</th><th>Location</th><th>Contact No.</th><th>E-Mail</th><th>Password</th><th colspan="2">Tools</th></tr>');
		var dataString = "event_action=loadTableData";
		
		$.ajax({
                 url:"ajaxSuperAdmin.php",
                 type: "POST",
                 data: dataString,
                 dataType: "json",
                 success: function(data)
                 {
                 	
                 	$.each(data, function(key, value)
                	 	{

              				 $('#tablee').append("<tr><td>" + value["AdminId"] + "</td><td>" + value["AdminName"] + "</td><td>" + value["AdminUsername"] + "</td><td>" + value["AdminLocation"] + "</td><td>" + value["AdminMobile"] + "</td><td>" + value["AdminEmail"] + "</td><td>" + value["AdminPassword"] + "</td><td><button onclick='loadModal(this.id)' id='"+value["AdminId"]+"' type='button' class='openModal'><span class='glyphicon glyphicon-edit' style='position:relative;margin-left:10px;margin-right:10px;'></span></button></td><td><td><button onclick='deleteItem(this.id)' type='button' id='"+value["AdminId"]+"'><span class='glyphicon glyphicon-erase' style='position:relative;margin-left:10px;margin-right:10px;color:red;'></span></button></td></tr>");     			
              		    })
                 	
                 }   
             });
		
	}



</script>
    <div class="modal fade" id="editmodal">
                   <div class="modal-dialog">
                          <div class="modal-content">
			                     <div class="modal-header bg bg-primary">
			                        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			                             <h1 class="modal-title">Edit Mode</h1> 
			                      </div>
			                      <div class="modal-body">
			                      	<div class="input-group">
			            					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			            					<input id="id" type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $value['']?>" id="<?php echo $value['SellerId']?>">
			          					</div>
			                            <div class="input-group">
			            					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			            					<input id="name" type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $value['SellerName']?>" id="<?php echo $value['SellerId']?>">
			          					</div>
			          					<div class="input-group">
			            					<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
			            					<input id="location" type="text" class="form-control" name="location" placeholder="Location"
			            					 value="<?php echo $value['SellerLocation']?>" id="<?php echo $value['SellerId']?>">
			          					</div> 
			          					<div class="input-group">
			            					<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
			            					<input id="contact" type="text" class="form-control" name="contact" placeholder="Contact"
			            					 value="<?php echo $value['SellerMobile']?>" id="<?php echo $value['SellerId']?>">
			          					</div>
			          					<div class="input-group">
			            					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			            					<input id="email" type="text" class="form-control" name="email" placeholder="Email"
			            					 value="<?php echo $value['SellerEmail']?>" id="<?php echo $value['SellerId']?>">
			          					</div>
			          					<div class="input-group">
			            					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			            					<input id="password" type="password" class="form-control" name="password" placeholder="Password"
			            					 value="<?php echo $value['SellerPassword']?>" id="<?php echo $value['SellerId']?>">
			          					</div>
			          					<br>  
											<button type='button' id="update" class="btn btn-block btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-edit"></span>&nbsp;Update</button>

			                         </div>
			                         <div class="modal-footer">

			                         </div>	
                           </div>	
                     </div>
		</div>
</div>
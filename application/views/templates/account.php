<div class="row-fluid">
	<script src="<?php echo base_url(); ?>js/jquery-1.8.3.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.min.js"></script>
	<link href="<?php echo base_url('css/bootstrap-datepicker.css') ?>" rel="stylesheet">
	<script>
	    $(function() {
		    var tooltips = $( "[title]" ).tooltip();
		    $(document)(function() {
		    	tooltips.tooltip( "open" );
		    })
	    });
	</script>
	<script type="text/javascript">
	 $(document).ready(function(){
	 	$('.pick').datepicker({
			minDate: 0,
			dateFormat: "M d, yy"
		});
	 }
	</script>
	<style>
		.pick .dropdown-menu {
		  visibility: visible;
		  opacity: 1;
		  width: auto;
		} 
	</style>
	<?php include_once($_SERVER['DOCUMENT_ROOT'] .'/eupeval/application/views/templates/sidebar.php')?>
	<?php $this->load->helper('form'); ?>
	<div class="span9">
		<div class="topliner">
			<div class="content">
				<?php if(!empty($message)){ ?>
					<?php if($success){?><div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<h4><strong>Success!</strong></h4>
					<?php } else{?>
					<div class="alert alert-block alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4><strong>Oooops!</strong></h4><?php }?>					
					  
					  <?php echo $message; ?>
					</div>
				<?php }?>

				<?php $class=array('class'=>'form form-horizontal');?>
				<?php echo form_open('settings/saveDetails', $class); ?>
					<input type="hidden" name='user_id' value="<?php echo $user_id; ?>" />
					<img class="title-icons" src="<?php echo base_url('images/icons/png/user.png'); ?>" >
					<h3 class="title">Profile</h3>

					<div class="control-group">
						<label class="control-label" for="level">User Name</label>
						<div class="controls">
							<input class="span9" type="text" placeholder="Required" name='username' value='<?php if(!empty($username)) echo $username?>' />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">Email</label>
						<div class="controls">
							<input class="span9" style="color: #F39C12" placeholder="Required" type="text" name='email' value='<?php if(!empty($email)) echo $email?>' />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">Last Name</label>
						<div class="controls">
							<input class="span9" type="text" style="color: #F39C12" placeholder="Required" name='lastname' value='<?php if(!empty($lastname)) echo $lastname?>' />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">First Name</label>
						<div class="controls">
							<input class="span9" type="text" style="color: #F39C12" placeholder="Required" name='firstname' value='<?php if(!empty($firstname)) echo $firstname?>' />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">Middle Name</label>
						<div class="controls">
							<input class="span9" type="text" style="color: #F39C12" placeholder="Required" name='middle' value='<?php if(!empty($middle)) echo $middle?>' />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">Designation</label>
						<div class="controls">
							<input class="span9" type="text" readonly name='designation' placeholder="To be filled by Admin" value='<?php if(!empty($designation)) echo $designation; ?>' />
						</div>
					</div>
					<div class="control-group" >
						<label class="control-label"for="level">Date Hired</label>
						<div class="controls">
						    <input class="span9 pick" type="text" placeholder="To be filled by Admin" name="date_hired" value="<?php if(!empty($date_hired)) echo $date_hired; ?>" readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">Length of Service</label>
						<div class="controls">
							<input class="span9" type="text" readonly placeholder="To be filled by Admin" name='length_of_service' value='<?php if(!empty($length_of_service)) echo $length_of_service; ?>' />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">New Position</label>
						<div class="controls">
							<input class="span9" placeholder="To be filled by Admin" type="text" readonly name='new_position' value='<?php if(!empty($new_position)) echo $new_position; ?>' />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">Monetary Equivalent</label>
						<div class="controls">
							<input class="span9" type="text" placeholder="To be filled by Admin" readonly name='monetary_equivalent' value='<?php if(!empty($monetary_equivalent)) echo $monetary_equivalent; ?>' />
						</div>
					</div>
					<hr>
					<div class="form-action"><center>
						<button type="submit" class="btn btn-success">Save New Details<span class="fui-lock"></span></button>
						<button class="btn btn-warning" type="reset">Reset <span class="fui-pause"></span></button>
					</div>
				<?php echo form_close();?>
				<br/>

				<?php echo form_open('settings/savePassword', $class); ?>
					<?php $this->form_validation->set_error_delimiters('<p class="text-error">', '</p>'); ?>
					<img class="title-icons" src="<?php echo base_url('images/icons/password_manager.png'); ?>" >
					<h3 class="title">Password Manager</h3>
					<div class="control-group">
						<label class="control-label" for="level">Old Password</label>
						<div class="controls">
							<input type="hidden" name='old' value="<?php echo $password; ?>" />
							<input type="hidden" name='user_id' value="<?php echo $user_id; ?>" />
							<input class="span9" type="password" placeholder="Enter your old Password" name='old_password' value='' />
							<?php if(form_error('old_password') !== ''){ ?>
								<?php echo form_error('old_password'); ?>
							<?php }?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">New Password</label>
						<div class="controls">
							<input class="span9" type="password" placeholder="Required" name='new_password' value='' />
							<?php if(form_error('new_password') !== ''){ ?>
								<?php echo form_error('new_password'); ?>
							<?php }?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">Confirm Password</label>
						<div class="controls">
							<input class="span9" type="password" placeholder="Required" name='conf_password' value='' />
							<?php if(form_error('conf_password') !== ''){ ?>
								<?php echo form_error('conf_password'); ?>
							<?php }?>
						</div>
					</div>
					<hr>
					<div class="form-action"><center>
						<button type="submit" class="btn btn-success">Save New Password <span class="fui-lock"></span></button>
						<button class="btn btn-warning" type="reset">Reset <span class="fui-pause"></span></button>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
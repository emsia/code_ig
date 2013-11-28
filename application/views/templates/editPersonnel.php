<div class="row-fluid">
	<link href="<?php echo base_url('css/bootstrap-datetimepicker.css') ?>" rel="stylesheet">
	<script>
	    $(function() {
		    var tooltips = $( "[title]" ).tooltip();
		    $(document)(function() {
		    	tooltips.tooltip( "open" );
		    })
	    });
	</script>
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

				<p class="pull-right">
					<?php if($person['role']==2){ ?>
						<a href="#promoteOnly" role="button" data-role="<?php echo '6';?>" data-toggle="modal" data-placement="left" title data-original-title="Promote as Team Deputy" class="btn btn-warning promote"><i class="fui-arrow-left"></i></a>
						<a href="#promoteOnly" role="button" data-role="<?php echo '5';?>" data-toggle="modal" data-placement="left" title data-original-title="Promote as part of Management Committee" class="btn btn-warning promote"><i class="fui-cmd"></i></a>
						<a href="#promoteOnly" role="button" data-role="<?php echo '1';?>" data-toggle="modal" data-placement="left" title data-original-title="Promote as Team Leader" class="btn btn-warning promote"><i class="fui-arrow-right"></i></a>
					<?php }elseif($person['role']==1 || $person['role']==4){?>
						<a href="#demoteOnly" data-role="<?php echo '2';?>" role="button" data-toggle="modal" data-placement="left" title data-original-title="Demote as Team Member" class="btn btn-warning demote"><i class="fui-arrow-left"></i></a>
						<a href="#demoteOnly" role="button" data-role="<?php echo '6';?>" data-toggle="modal" data-placement="left" title data-original-title="Demote as Team Deputy" class="btn btn-warning demote"><i class="fui-cmd"></i></a>
						<a href="#promoteOnly" data-role="<?php echo '5';?>" role="button" data-toggle="modal" data-placement="left" title data-original-title="Promote as part of Management Committee" class="btn btn-warning"><i class="fui-arrow-right"></i></a>
					<?php }elseif($person['role']==6) {?>
						<a href="#demoteOnly" data-role="<?php echo '2';?>" role="button" data-toggle="modal" data-placement="left" title data-original-title="Demote as Team Member" class="btn btn-warning demote"><i class="fui-arrow-left"></i></a>
						<a href="#promoteOnly" role="button" data-role="<?php echo '5';?>" data-toggle="modal" data-placement="left" title data-original-title="Promote as part of Management Committee" class="btn btn-warning promote"><i class="fui-cmd"></i></a>
						<a href="#promoteOnly" role="button" data-role="<?php echo '1';?>" data-toggle="modal" data-placement="left" title data-original-title="Promote as Team Leader" class="btn btn-warning promote"><i class="fui-arrow-right"></i></a>
					<?php }?>
				</p>

				<?php 
				 	if($person['role']==2){ $pos = 'Team Member'; }
					elseif($person['role']==1 || $person['role']==4){ $pos='Team Leader'; }
					elseif($person['role']==5){ $pos='Management Committee'; }
					elseif($person['role']==6){ $pos='Team Deputy'; }
					else{ $pos='Director';}
				?>

				Personnel Details: <h3><?php echo $person['lastname'].", ".$person['firstname']." ".$person['middle']; ?> - <span class="text-error"><?php echo $pos; ?></span></h3><br/>

				<?php $class=array('class'=>'form form-horizontal');?>
				<?php echo form_open('teams/saveDetailsFilled', $class); ?>
					<input type="hidden" name='user_id' value="<?php echo $person['id']; ?>" />
					<input type="hidden" name='user_slug' value="<?php echo $person['slug']; ?>" />
					<input type="hidden" name="team_slug" value="<?php echo $num; ?>">

					<img class="title-icons" src="<?php echo base_url('images/icons/png/user.png'); ?>" >
					<h3 class="title">Profile</h3>

					<div class="control-group">
						<label class="control-label" for="level">User Name</label>
						<div class="controls">
							<input class="span9" type="text" name='username' value='<?php if(!empty($person['username'])) echo $person['username']; ?>' readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">Email</label>
						<div class="controls">
							<input class="span9" style="color: #F39C12" type="text" name='email' value='<?php if(!empty($person['email'])) echo $person['email']; ?>' readonly />
						</div>
					</div>					
					<div class="control-group">
						<label class="control-label" for="level">Designation</label>
						<div class="controls">
							<input class="span9" type="text" name='designation' placeholder="To be filled by Admin" value='<?php if(!empty($designation)) echo $designation; ?>' />
						</div>
					</div>
					<div class="control-group" >
						<label class="control-label"for="level">Date Hired</label>
						<div class="controls">
						    <input class="span9 form_date" type="text" placeholder="To be filled by Admin" name="date_hired" value="<?php if(!empty($date_hired)) echo $date_hired; ?>" readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">Length of Service</label>
						<div class="controls">
							<input class="span9" type="text" placeholder="To be filled by Admin" name='length_of_service' value='<?php if(!empty($length_of_service )) echo $length_of_service; ?>' />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">New Position</label>
						<div class="controls">
							<input class="span9" placeholder="To be filled by Admin" type="text" name='new_position' value='<?php if(!empty($new_position)) echo $new_position; ?>' />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="level">Monetary Equivalent</label>
						<div class="controls">
							<input class="span9" type="text" placeholder="To be filled by Admin" name='monetary_equivalent' value='<?php if(!empty($monetary_equivalent)) echo $monetary_equivalent ; ?>' />
						</div>
					</div>
					<hr>
					<div class="form-action"><center>
						<a href="<?php echo base_url('index.php/teams/eachMember/')."/".$num; ?>" class="btn btn-danger">Back<span class="fui-cross"></span></a>
						<button type="submit" class="btn btn-success">Save Personnel Details<span class="fui-lock"></span></button>
						<button class="btn btn-warning" type="reset">Reset <span class="fui-pause"></span></button>
					</div>
				<?php echo form_close();?>				
			</div>
		</div>
	</div>
</div>

	<?php $class = array('class' => 'form form-horizontal'); ?>
	<?php echo form_open('teams/promoteMe', $class);?>
	<div id="promoteOnly" class="modal hide fade" data-backdrop="static">
		<div class="modal-header palette-orange">
			<h3 class="text-white">Confirm Promotion</h3>
		</div>
		<div class="modal-body">
			<p>Are you sure you want to promote this personnel from the team?</p>
			<input type="hidden" id="personnel_slug" name="personnel_slug" value="<?php echo $person['slug']; ?>">
			<input type="hidden" id="team_slug" name="team_slug" value="<?php echo $num; ?>">
			<input type="hidden" id="promoted" name="promoted" value="" />
		</div>
		<div class="modal-footer">
			<button type="submit" name="gradesys-delete" class="btn btn-warning pull-left">Promote <span class="fui-check"></span></button>
			<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
	<?php echo form_close();?>

	<?php echo form_open('teams/demoteMe', $class);?>
	<div id="demoteOnly" class="modal hide fade" data-backdrop="static">
		<div class="modal-header palette-alizarin">
			<h3 class="text-white">Confirm Demotion</h3>
		</div>
		<div class="modal-body">
			<p>Are you sure you want to demote this personnel from the team?</p>
			<input type="hidden" id="personnel_slug" name="personnel_slug" value="<?php echo $person['slug']; ?>">
			<input type="hidden" id="team_slug" name="team_slug" value="<?php echo $num; ?>">
			<input type="hidden" id="demoted" name="demoted" value="" />
		</div>
		<div class="modal-footer">
			<button type="submit" name="gradesys-delete" class="btn btn-danger pull-left">Demote <span class="fui-check"></span></button>
			<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
	<?php echo form_close();?>

	<script src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.js"></script>
	
	<script type="text/javascript">
	    $(".form_date").datetimepicker({
	    	format: "yyyy-m-dd",
	        autoclose: true,
	        todayBtn: true,
	        minuteStep: 10
    	});
	</script>

<script type="text/javascript">
	$(document).on("click", ".promote", function () {
	    var role = $(this).data('role');	    
	    $("#promoted").val( role );	    
	});
</script>

<script type="text/javascript">
	$(document).on("click", ".demote", function () {
	    var role = $(this).data('role');	    
	    $("#demoted").val( role );	    
	});
</script>
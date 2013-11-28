<div class="row-fluid">
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
					<a href="#inviteMem" role="button" data-toggle="modal" data-placement="left" title data-original-title="Invite a Member" class="btn btn-warning"><i class="fui-plus"></i></a>
					<a href="#editTeam" role="button" data-toggle="modal" data-placement="left" title data-original-title="Edit Team Info" class="btn btn-success"><i class="fui-new"></i></a>
				</p>

				<img class="title-icons" src="<?php echo base_url('images/icons/svg/compas.svg'); ?>" >
				<h3 class="title">Team Members</h3>
				<?php if($count){ ?>
						<h3 class="title"><?php echo $name;?></h3>
						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width: 30%">Full Name</th>
									<th style="width: 26%">Email</th>
									<th style="width: 24%">Position</th>
									<th style="width: 10%">Edit</th>
									<th style="width: 10%">Remove</th>
								</tr>
							</thead>
							<tbody>
								<?php for($i=0;$i<$count; $i++){ ?>
									<tr>
										<td><?php echo $fullName[$i]?></td>
										<td><?php echo $mail[$i]?></td>
										<td><?php if($roles[$i]==4 || $roles[$i]==1){ echo '<span class="text-error">Team Leader</span>'; } elseif($roles[$i]==5) { echo '<span class="text-error">Management Committee</span>'; } elseif($roles[$i]==6){ echo '<span class="text-error">Deputy Leader</span>'; }else{ echo 'Team Member'; } ?></td>
										<td><a href="<?php echo base_url('index.php/teams/editPosition/')."/".$slug[$i]."/".$slugTeam;?>"><span class="fui-new"></span></a></td>										
										<td><a href="#remove" class="removeMe" data-id="<?php echo $slug[$i]; ?>" role="button" data-toggle="modal"><i class="fui-cross"></i></a></a></td>
									</tr>
								<?php }?>
							</tbody>
						</table>
				<?php }else {?>
					<div class="alert alert-block alert-error">
					  <h4><strong>Oops!</strong></h4>
					  There are no individuals yet.
					</div>
				<?php }?>
			</div>
		</div>	
	</div>

<?php echo form_open('teams/inviteMember');?>
	<div id="inviteMem" class="modal hide fade" data-backdrop="static">
		<div class="modal-header palette-orange">
			<h3 class="text-white">Make Invitation</h3>
		</div>
		<div class="modal-body">
			<div class="control-group">
				<label class="control-label"><p>Please seperate each person by comma. For example:</p></label>
				<div class="controls">
						<center><i>master@ittc.upd.edu.ph, member@yahoo.com</i></center><br/>
						<textarea name="textArea" class="span3" rows="5"></textarea>
					<br/>					
					<?php if(!empty($message)){?><p class="text-error"><?php echo $message; ?></p><?php }?>
				</div>		
			</div>
			<input type="hidden" name="team_name" value="<?php echo $name; ?>" />
			<input type="hidden" name="slug" value="<?php echo $slugTeam; ?>" />
		</div>
		<div class="modal-footer"> 
			<button type="submit" name="gradesys-send"  class="btn btn-warning pull-left" >Make Invitation <span class="fui-check"></span></button>
			<button type="button" class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Cancel <i class="fui-cross"></i></button>
		</div>
	</div>
<?php echo form_close();?>

	<?php $class = array('class' => 'form form-horizontal'); ?>
	<?php echo form_open('teams/removeMe', $class);?>
	<div id="remove" class="modal hide fade" data-backdrop="static">
		<div class="modal-header palette-alizarin">
			<h3 class="text-white">Confirm Removal</h3>
		</div>
		<div class="modal-body">
			<p>Are you sure you want to remove this personnel from the team?</p>
			<input type="hidden" id="personnel_slug" name="personnel_slug" value="">
			<input type="hidden" name="team_slug" value="<?php echo $slugTeam; ?>" />
		</div>
		<div class="modal-footer">
			<button type="submit" name="gradesys-delete" class="btn btn-danger pull-left">Remove <span class="fui-cross"></span></button>
			<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
	<?php echo form_close();?>

	<?php $class = array('class' => 'form form-horizontal'); ?>
	<?php echo form_open('teams/editTeam', $class);?>
	<div id="editTeam" class="modal hide fade" data-backdrop="static">
		<div class="modal-header palette-orange">
			<h3 class="text-white">Edit Team Information</h3>
		</div>
		<div class="modal-body">
			<div class="control-group">
				<label class="control-label" for="level">Team Name</label>
				<div class="controls">
					<input class="span9" type="text" placeholder="Required" name='teamFullName' value='<?php echo $name ?>' required />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="level">Short Name</label>
				<div class="controls">
					<input class="span9" type="text" name='teamShortName' value='<?php if(!empty($shortname)) echo $shortname ?>' />
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<input type="hidden" name="team_slug" value="<?php echo $slugTeam; ?>" />
			<button type="submit" name="gradesys-delete" class="btn btn-warning pull-left">Save <span class="fui-check"></span></button>
			<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
	<?php echo form_close();?>

<script type="text/javascript">
	$(document).on("click", ".removeMe", function () {
	    var slug = $(this).data('id');	    
	    $("#personnel_slug").val( slug );	    
	});
</script>
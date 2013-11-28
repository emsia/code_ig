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
				<p class="pull-right">
					<a href="#startEval" role="button" data-toggle="modal" data-placement="left" title data-original-title="Add New Team" class="btn btn-warning"><i class="fui-plus"></i></a>
				</p>

				<img class="title-icons" src="<?php echo base_url('images/icons/svg/clipboard.svg'); ?>" >
				<h3 class="title">Team List</h3>
				<?php if($count){ ?>
						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width: 55%">Team Name</th>
									<th style="width: 25%">Short Name</th>
									<th style="width: 10%">View</th>
									<th style="width: 10%">Remove</th>
								</tr>
							</thead>
							<tbody>
								<?php for($i=0;$i<$count; $i++){ ?>
									<tr>
										<td><?php echo $name[$i]?></td>
										<td><?php echo $short_name[$i]?></td>
										<td><a href="<?php echo base_url('index.php/teams/eachMember')."/".$slug[$i]; ?>"><span class="fui-search"></span></a></td>
										<td><a href="#confirmDelete" class="roling" role="button" data-slug="<?php echo $slug[$i]; ?>" data-toggle="modal"><span class="fui-cross"></span></a></td>
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
	
	<?php $class = array('class'=>'form form-horizontal'); ?>
	<?php echo form_open('teams/addNewTeam', $class);?>
	<div id="startEval" class="modal hide fade" data-backdrop="static">
		<div class="modal-header palette-emerald">
			<h3 class="text-white">Add New Team</h3>
		</div>
		<div class="modal-body">
			<div class="control-group">
				<label class="control-label" for="level">Team Name</label>
				<div class="controls">
					<input type="text" autofocus placeholder="Required" name="teamNameFull" class="input span12" required />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="level">Short Name</label>
				<div class="controls">
					<input type="text" placeholder="Required" name="teamNameshort" class="input span12" required />
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" name="gradesys-delete" class="btn btn-success pull-left">Save <span class="fui-check"></span></button>
			<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
	<?php echo form_close();?>

	<?php echo form_open('teams/deleteTeam', $class);?>
	<div id="confirmDelete" class="modal hide fade" data-backdrop="static">
		<div class="modal-header palette-alizarin">
			<h3 class="text-white">Confirm Deletion</h3>
		</div>
		<div class="modal-body">
			<div class="control-group">
				<p>Are you sure you want to delete this team?</p>
			</div>
		</div>
		<div class="modal-footer">
			<input type="hidden" value="" name="team_slug" id="team_slug">
			<button type="submit" name="gradesys-delete" class="btn btn-danger pull-left">Delete <span class="fui-cross"></span></button>
			<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
	<?php echo form_close();?>

	<script type="text/javascript">
	$(document).on("click", ".roling", function () {
	    var slug = $(this).data('slug');	    
	    $("#team_slug").val( slug );	    
	});
</script>
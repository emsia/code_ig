<div class="row-fluid">
	<script>
	    $(function() {
		    var tooltips = $( "[title]" ).tooltip();
		    $(document)(function() {
		    	tooltips.tooltip( "open" );
		    })
	    });
	</script>
	<script type="text/javascript">
        $(window).on('load', function () {

            $('.selectpicker').selectpicker({
                'selectedText': 'cat'
            });

            // $('.selectpicker').selectpicker('hide');
        });
    </script>
	<?php include_once($_SERVER['DOCUMENT_ROOT'] .'/eupeval/application/views/templates/sidebar.php')?>
	<?php $this->load->helper('form'); ?>
	<div class="span9">
		<div class="topliner">
			<div class="content">
				<?php if(!empty($message) && $count>0){ ?>
					<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
					  <h4><strong>Success!</strong></h4>
					  <?php echo $message; ?>
					</div>
				<?php }?>
				<?php if($role==1 || $role==0){?>
					<p class="pull-right">
						<a href="#enter" role="button" data-toggle="modal" data-placement="left" title data-original-title="Enter a Team" class="btn btn-success"><i class="fui-gear"></i></a>
						<a href="#myModal" role="button" data-toggle="modal" data-placement="left" title data-original-title="Invite a Member" class="btn btn-warning"><i class="fui-plus"></i></a>
					</p>
				<?php }else{?>
					<p class="pull-right">
						<a href="#myModal" role="button" data-toggle="modal" data-placement="left" title data-original-title="Enter a Group" class="btn btn-warning"><i class="fui-cmd"></i></a>
					</p>
				<?php }?>
				<img class="title-icons" src="<?php echo base_url('images/icons/svg/clocks.svg'); ?>" >
				<h3 class="title">Personnel Evaluation</h3>
				
				<br/>
				<div class="palette palette-orange">
					<center>
						<h3>Instruction</h3>
					</center>
				</div>
				<div id="preview" class="demo-text-box prl"><br/>
					 <p>
						The performance evaluation shall be conducted by eUP Personnel to ensure that fair evaluation of all aspects is implemented.  Team Leaders and Deputy Team Leaders will have to evaluate each team member and vice versa. Team members should also evaluate their co-team members.
						<br/><br/>
						Please click on the evaluate link for each member to answer the form.
					 </p>
				</div>
				<br/>
				<?php if($count>0){ ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th style="width: 45%">Team</th>
							<th style="width: 40%">Name</th>
							<th style="width: 15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php for( $i = 0; $i < $count; $i++){ ?>
							<tr>
								<td><?php echo $team_name[$i]; ?></td>
								<td><?php echo $lastname[$i].", ".$firstname[$i]." ".substr($middlename[$i],0,1)."."; ?></td>
								<td>
									<?php if($done[$i]){ ?>
										<span style="color: #F1C40F">Done <span class="fui-check-inverted-2"></span></span>
									<?php } else{?>
										<a href="<?php echo base_url('index.php/answer/FormEvaluate')."/".$slug[$i]; ?>" type="submit">Evaluate</a>
									<?php }?>
								</td>
							</tr>
						<?php }?>
					</tbody>
				</table>
				<?php } elseif($count==0){?>
					<div class="alert alert-block alert-error">
					  <h4><strong>Oops!</strong></h4>
					  You don't have team members yet.
					</div>
				<?php }else{?>
					<div class="alert alert-block alert-error">
					  <h4><strong>Oops!</strong></h4>
					  <?php echo $message; ?>
					</div>
				<?php }?>
				<?php if($role==1 || $role==0){ ?>
					<?php if($countOtherTeam){ ?>
							<hr>
							<h2 class="title">Leaders of Different Teams</h2>
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="width: 45%">Team</th>
										<th style="width: 40%">Name</th>
										<th style="width: 15%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php for( $i = 0; $i < $countOtherTeam; $i++){ ?>
										<tr>
											<td><?php echo $team_nameOther[$i]; ?></td>
											<td><?php echo $lastnameOther[$i].", ".$firstnameOther[$i]." ".substr($middlenameOther[$i],0,1)."."; ?></td>
											<td>
												<?php if($doneOther[$i]){ ?>
													<span style="color: #F1C40F">Done <span class="fui-check-inverted-2"></span></span>
												<?php } else{?>
													<a href="<?php echo base_url('index.php/answer/FormEvaluate')."/".$slugOther[$i]; ?>" type="submit">Evaluate</a>
												<?php }?>
											</td>
										</tr>
									<?php }?>
								</tbody>
							</table>
					<?php }elseif($count==0){?>
						<div class="alert alert-block alert-error">
						  <h4><strong>Oops!</strong></h4>
						  There are no Team Leaders yet.
						</div>
					<?php }?>
				<?php }?>
			</div>
		</div>	
	</div>
	
	<div id="enter" class="modal hide fade" data-backdrop="static">
		<div class="modal-header palette-orange">
			<h3 class="text-white">Enter to a Team</h3>
		</div>
		<div class="modal-body">
			<form class="form form-horizontal" action="." method="post"><center>
			<div class="control-group">
				<label class="control-label" for="level">Team Name</label>
				<div class="controls">
					<select id="id_select" class="select span12" multiple>
						<?php foreach( $teams as $team ){?>
							<option><?php echo $team?></option>
						<?php }?>
					</select>
				</div>
			</div>
			</center>
		</div>
		<div class="modal-footer"> 
			<button type="submit" name="gradesys-send"  class="btn btn-primary pull-left" >Enroll <span class="fui-check"></span></button>
			<button type="button" class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel <i class="fui-new"></i></button>
		</div>
	</div>

</div>
<div class="row-fluid">
	<script>
	    $(function() {
		    var tooltips = $( "[title]" ).tooltip();
		    $(document)(function() {
		    	tooltips.tooltip( "open" );
		    })
	    });
	</script>
	<?php include_once($_SERVER['DOCUMENT_ROOT'] .'/code_ig/application/views/templates/sidebar.php')?>
	<?php $this->load->helper('form'); ?>
	<div class="span9">
		<div class="topliner">
			<div class="content">
				<?php if($countLeader){ ?>
				<img class="title-icons" src="<?php echo base_url('images/icons/svg/retina.svg'); ?>" >
				<h3 class="title">Team Leaders</h3>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th style="width: 40%">Team Name</th>
							<th style="width: 30%">Full Name</th>				
							<th style="width: 20%">Overall(100%)</th>
							<th style="width: 10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php for( $i = 0; $i < $countLeader; $i++){ ?>
							<tr>
								<td><?php echo $team_nameOthers[$i]; ?></td>
								<td><?php echo $lastnameOther[$i].", ".$firstnameOther[$i]." ".substr($middleOther[$i],0,1)."."; ?></td>
								<td><?php echo round($overallLeader[$i],2);?></td>
								<td><a href="<?php echo base_url('index.php/answer/evaluationDetails')."/".$user_idOther[$i];?>">View</a></td>
							</tr>
						<?php }?>
					</tbody>
				</table>
				<?php } ?>
					<?php if($countmembers){ ?>							
							<hr>
							<img class="title-icons" src="<?php echo base_url('images/icons/svg/clipboard.svg'); ?>" >
							<h3 class="title">Individuals</h3>
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="width: 40%">Team Name</th>
										<th style="width: 30%">Full Name</th>
										<th style="width: 20%">Overall(100%)</th>
										<th style="width: 10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php for( $i = 0; $i < $countmembers; $i++){ ?>
										<tr>
											<td><?php echo $team_name[$i]; ?></td>
											<td><?php echo $lastname[$i].", ".$firstname[$i]." ".substr($middle[$i],0,1)."."; ?></td>
											<td><?php echo round($overall[$i],2);?></td>
											<td><a href="<?php echo base_url('index.php/answer/evaluationDetails')."/".$user_id[$i];?>">View</a></td>
										</tr>
									<?php }?>
								</tbody>
							</table>
					<?php }else{?>
						<div class="alert alert-block alert-error">
						  <h4><strong>Oops!</strong></h4>
						  There are no individuals yet.
						</div>
					<?php }?>
			</div>
		</div>	
	</div>
</div>
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
							<th style="width: 17%">Team</th>
							<th style="width: 28%">Name</th>
							<th style="width: 11%">Director(40%)</th>
							<th style="width: 11%">Leaders(30%)</th>
							<th style="width: 11%">Members(20%)</th>
							<th style="width: 11%">Result of Members(10%)</th>							
							<th style="width: 11%">Overall(100%)</th>
						</tr>
					</thead>
					<tbody>
						<?php for( $i = 0; $i < $countLeader; $i++){ ?>
							<tr>
								<td><?php echo $team_nameOthers[$i]; ?></td>
								<td><?php echo $lastnameOther[$i].", ".$firstnameOther[$i]." ".substr($middleOther[$i],0,1)."."; ?></td>
								<td><?php echo round($directorLeader[$i],2);?></td>
								<td><?php echo round($leaderLeader[$i],2);?></td>
								<td><?php echo round($perrLeader[$i],2);?></td>
								<td><?php echo round($result_of_members[$i],2);?></td>
								<td><?php echo round($overallLeader[$i],2);?></td>
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
										<th style="width: 18%">Team</th>
										<th style="width: 28%">Name</th>
										<th style="width: 13%">Director(45%)</th>
										<th style="width: 13%">Leaders(30%)</th>
										<th style="width: 13%">Peer(25%)</th>
										<th style="width: 13%">Overall(100%)</th>
									</tr>
								</thead>
								<tbody>
									<?php for( $i = 0; $i < $countmembers; $i++){ ?>
										<tr>
											<td><?php echo $team_name[$i]; ?></td>
											<td><?php echo $lastname[$i].", ".$firstname[$i]." ".substr($middle[$i],0,1)."."; ?></td>
											<td><?php echo round($director[$i],2);?></td>
											<td><?php echo round($leader[$i],2);?></td>
											<td><?php echo round($peer[$i],2);?></td>
											<td><?php echo round($overall[$i],2);?></td>
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
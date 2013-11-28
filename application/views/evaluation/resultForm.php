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
				<?php echo form_open('answer/seachResults');?>
				<div class="control-group">
					<div class="controls">
						<input type="number" min="0" class="span4" name="yearSearch" style="width: 380px" placeholder="Enter Year. Ex. 2013"/>
						<button type="submit" class="btn btn-large btn-success"><span class="fui-search"></span>Search</button>
						<p class="pull-right">
							<a href="#printAll" role="button" data-toggle="modal" data-placement="left" title data-original-title="Print All Results" class="btn btn-warning"><i class="fui-new"></i></a>
						</p>
					</div>
				</div>
				<?php echo form_close();?>
				<hr/>

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
								<td><a href="<?php echo base_url('index.php/answer/evaluationDetails')."/".$user_idOther[$i]."/".$yearSearch;?>">View</a></td>
							</tr>
						<?php }?>
					</tbody>
				</table>
				<hr>
				<?php } ?>
					<?php if($countmembers){ ?>
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
											<td><a href="<?php echo base_url('index.php/answer/evaluationDetails')."/".$user_id[$i]."/".$yearSearch;?>">View</a></td>
										</tr>
									<?php }?>
								</tbody>
							</table>
					<?php }else{?>
						<div class="alert alert-block alert-error">
						  <h4><strong>Oops!</strong></h4>
						  You might enter empty year for evaluation results.
						</div>
					<?php }?>
			</div>
		</div>	
	</div>
</div>

<?php echo form_open('answer/printAll');?>
	<div id="printAll" class="modal hide fade" data-backdrop="static">
		<div class="modal-header palette-orange">
			<h3 class="text-white">Print Each Evaluation Results</h3>
		</div>
		<div class="modal-body">
			<div class="control-group">
				<div class="controls">
						<p>This may take few minutes. Each evaluation results will be printed and names of evaluator will be omitted to protect privacy rights and confidentiality of
							the program. <br/><br/>Each file will be named after the name of the person who is being evaluated.</p>
				</div>		
			</div>
		</div>
		<div class="modal-footer"> 
			<input type="hidden" name="year" value="<?php echo $yearSearch; ?>">
			<button type="submit" name="gradesys-send"  class="btn btn-warning pull-left" >Download <span class="fui-check"></span></button>
			<button type="button" class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Cancel <i class="fui-cross"></i></button>
		</div>
	</div>
	<?php echo form_close();?>
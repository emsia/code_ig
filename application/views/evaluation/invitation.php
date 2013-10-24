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
				<div class="alert alert-block alert-warning">
					Please review the invitation below carefully. You may not cancel an invitation once it has been submitted. If you want to disregard this mail, click <b>"Cancel"</b>. If you are ready to submit your invitation, click <b>"Send Invitation"</b>.
					<br/><br/>
					Number of people to Invite: <b><?php echo $countPeople;?></b>
				</div>
				
				<?php $class=array('class'=>'form form-horizontal'); ?>
				<?php echo form_open('answer/sendInvites', $class);?>
					<fieldset>
						<div class="palette-orange">
							<center>
								<img class="title-icons" style="float: none; padding-bottom:3px; padding-top:5px; margin-right: -5px" src="<?php echo base_url('images/icons/png/Mail.png');?>">
			            		<div class="btn" style="text-shadow:none; background-color: #F39C12;"><b>You have been invited to join this team!</b></div>
			            	</center>
			         	</div>

				          <div class="demo-text-box prl" style="border-radius: 0px;">
				            <p>
				            	From <span style="margin-left: 32px">:</span> <span style="color: #F39C12"><?php echo $email." [".$lastname.", ".$firstname."]"?></span><br/>
								Subject <span style="margin-left: 19px">:</span> Invitation to join <?php echo $team_name." team"; ?><br/>
								Team Key <span style="margin-left:5px">:</span> <span style="color: #F39C12"><?php echo $key;?></span><br/><br/>
								Please <a href="#" style="color: #F39C12; text-decoration: none;">Log-in</a> or <a href="#" style="color: #F39C12; text-decoration: none">Register</a> and enter the Team Key to join in a Team.
							</p>
				          </div>
					        <div style="display:none">
					        	<textarea name="textArea">
									<?php foreach($emails as $email) echo $email.", ";?>
								</textarea>
							</div>
				        <input type="hidden" name="key" value='<?php echo $key; ?>' >
				        <input type="hidden" name="team_name" value='<?php echo $team_name; ?>' >
				        <hr>
				        <div class="form-action"><center>
		    				<input type="hidden" value="sendNow" name="sendNow" />
							<button type="submit" class="btn btn-success"><b>Send Invitation</b><i class="fui-check"></i></button> 
							<a href="<?php echo base_url('index.php/answer/people');?>" type="button" class="btn btn-danger"><b>Cancel</b><i class="fui-cross"></i></a></center>
						</div>
					</fieldset>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
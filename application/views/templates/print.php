<div class="row-fluid">
	<div class="span12">
			<div class="content">
				Summary Evaluation for: <h3 class="text-error"><?php echo $lastname_of_cliked.", ".$firstname_of_cliked." ".$middlename_of_cliked; ?></h3><br/>
				<?php if($count){ ?>

				<h3 class="title">Score Summary</h3>
				<?php if($roleOfClicked==0 ||$roleOfClicked==1 || $roleOfClicked==4 || $roleOfClicked==5 || $roleOfClicked==6){?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Evaluation for Team Members(x5)</th>
							<th>Team Members(x1)</th>
							<th>Team Leaders/Deputy(x3)</th>
							<th>Director(x5)</th>
							<th>OverAll</th>
						</tr>
					</thead>
					<tbody>
						<?php for($j=0; $j<$countLeader; $j++){ ?>
							<?php if($user_idOther[$j]==$idOfClicked){ ?>
								<tr>
									<td><?php echo round($result_of_members[$j], 2);?></td>
									<td><?php echo round($perrLeader[$j], 2);?></td>
									<td><?php echo round($leaderLeader[$j], 2);?></td>
									<td><?php echo round($directorLeader[$j], 2);?></td>
									<td class="text-error"><b><?php echo round($overallLeader[$j], 2);?></b></td>
								</tr>
							<?php }?>
						<?php }?>
					</tbody>
				</table>
				<?php } else{?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th><?php if($teamID==1 || $teamID==10){ ?>Evaluation for All Personnel(x1)<?php } else {?>Peer(per Team)(x1)<?php }?></th>
							<th>Team Leaders/Deputy(x3)</th>
							<th>MANCOM(x3)</th>
							<th>Director(x5)</th>
							<th>OverAll</th>
						</tr>
					</thead>
					<tbody>
						<?php for($j=0; $j<$countmembers; $j++){ ?>
							<?php if($user_id[$j]==$idOfClicked){ ?>
								<tr>
									<td><?php echo round($peer[$j], 2);?></td>
									<td><?php echo round($leader[$j], 2);?></td>
									<td><?php echo round($manCom[$j], 2);?></td>
									<td><?php echo round($director[$j], 2);?></td>
									<td class="text-error"><b><?php echo round($overall[$j], 2);?></b></td>
								</tr>
							<?php }?>
						<?php }?>
					</tbody>
				</table>
				<?php }?>
				<br/>

				<h3 class="title">Work Competency</h3>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th style="width: 16%">Quality of Work</th>
							<th style="width: 16%">Quantity of Work</th>
							<th style="width: 16%">Job Knowledge</th>
							<th style="width: 19%">Reliability</th>
							<th style="width: 19%">Learning Ability</th>
							<th style="width: 10%">Average</th>
						</tr>
					</thead>
					<tbody>
						<?php for( $i = 0; $i < $count; $i++){ ?>
							<tr>
								<td><?php echo $quality[$i];?></td>
								<td><?php echo $quantity[$i];?></td>
								<td><?php echo $knowledge[$i];?></td>
								<td><?php echo $reliability[$i];?></td>
								<td><?php echo $leaning_ability[$i];?></td>
								<td><?php echo round($work_rate[$i],2);?></td>
							</tr>
						<?php }?>
					</tbody>
				</table>
				<br/>

				<h3 class="title">Behavioral Competency</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th style="width: 12%">Attendance</th>
							<th style="width: 12%">Job Attitude</th>
							<th style="width: 12%">Initiative</th>
							<th style="width: 12%">Customer Service</th>
							<th style="width: 15%">Cooperation/Team Work</th>							
							<th style="width: 15%">Honesty and Integrity</th>
							<th style="width: 12%">Average</th>
						</tr>
					</thead>
					<tbody>
						<?php for( $i = 0; $i < $count; $i++){ ?>
							<tr>
								<td><?php echo $attendance[$i];?></td>
								<td><?php echo $job_attitude[$i];?></td>
								<td><?php echo $initiative[$i];?></td>
								<td><?php echo $customer_service[$i];?></td>
								<td><?php echo $cooperation_temWorl[$i];?></td>
								<td><?php echo $honesty_integrity[$i];?></td>
								<td><?php echo round($behavior_rate[$i],2);?></td>
							</tr>
						<?php }?>
					</tbody>
				</table>
				<br/>

				<h3 class="title">Comments</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th style="width: 28%">Name</th>
							<th style="width: 72%"></th>							
						</tr>
					</thead>
					<tbody>
						<?php for( $i = 0; $i < $count; $i++){ ?>
							<tr>
								<td><?php echo $lastName[$i].", ".$firstName[$i]." ".substr($middleName[$i],0,1)."."; ?></td>								
								<td><?php echo $comments[$i];?></td>
							</tr>
						<?php }?>
					</tbody>
				</table>
				
					<?php }?>
			</div>
	</div>
</div>
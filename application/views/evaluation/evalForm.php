<div class="row-fluid">
	<style>
		#left{
		  padding-left: 50px;
		}
		#r{
		  margin-top: 50%;
		  margin-left: 20%;
		}
		#ileft{
			padding-left: 100px;
		}
	</style>
	<?php include_once($_SERVER['DOCUMENT_ROOT'] .'/eupeval/application/views/templates/sidebar.php')?>
	<?php $this->load->helper('form'); ?>
	<div class="span9">
		<div class="topliner">
			<div class="content"><?php $class = array('class' => 'form-horizontal'); ?>
			<?php if(!empty($errors)){ ?>
				<div class="alert alert-error alert-block"><?php echo $errors; ?></div>
			<?php }?>
				Person To be Evaluated: <h3><?php echo$lastName.", ".$firstName." ".$middleName; ?></h3><br/>
				<?php echo form_open('answer/submit_evalform', $class); ?>
				<input type="hidden" name="userToEvaluate" value="<?php echo $userToEvaluate; ?>" />
				<center>
					<p colspan="6"><b style="color:red">1</b>-POOR &nbsp; <b style="color:red">2</b>-NEEDS IMPROVEMENT &nbsp; <b style="color:red">3</b>-SATISFACTORY &nbsp; <b style="color:red">4</b>-VERY SATISFACTORY &nbsp; <b style="color:red"><br/>5</b>-OUTSTANDING</p>
				</center>	
					
					<hr>

					<img class="title-icons" src="<?php echo base_url('images/icons/png/notes.png'); ?>">
					<h3 class="title">WORK COMPETENCY</h3>
					<p>This section will evaluate the personnel based on his/her work competency which includes Quality of work, Quantity of work, Job knowledge, Reliability, and Learning ability.</p>
					<br/>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style='width: 20%'>TITLE</th>
								<th style='width: 80%'>QUESTIONS</th>
								<?php
									for ($i = 1 ; $i <= 5; $i++){
										echo "<th style='width: 5%'><center>".$i."</center></th>";
									}	
								?>
							</tr>
						</thead>
						<tbody>
							<?php echo form_error('quality'); ?>
							<tr class='<?php $class = (form_error('quality') !== '') ? 'alert-error' : ''; echo $class;?>'>
								<td>Quality of Work</td>
								<td>Is the personnel accurate in his/her work, always free of error, and meet the standards that required by his/her work?</td>
								
								<?php
									for ($i = 1 ; $i <= 5; $i++){ 
										echo "<td>";?>
										<label class="radio" id="r">
										<input <?php echo set_radio('quality', $i); ?> type='radio' name='quality' value='<?php echo "$i";?>' data-toggle="radio" />
										</label>
										<?php echo "</td>";
									}
								?>
							</tr>
							<tr class='<?php $class = (form_error('quantity') !== '') ? 'alert-error' : ''; echo $class;?>'>
								<td>Quantity of Work</td>
								<td>Is he/she responsive to work demands? Is he/she productive? Does he/she meet deadlines?</td>
								
								<?php
									for ($i = 1 ; $i <= 5; $i++){ 
										echo "<td>";?>
										<label class="radio" id="r">
										<input <?php echo set_radio('quantity', $i); ?> type = 'radio' name='quantity' value='<?php echo "$i";?>' data-toggle="radio" />
										</label>
										<?php echo "</td>";
									}
								?>
							</tr>
							<tr class='<?php $class = (form_error('knowledge') !== '') ? 'alert-error' : ''; echo $class;?>'>
								<td>Job Knowledge</td>
								<td>Does he/she produce output of his/her work consistently and effectively? Does he/she has complete and thorough knowledge of all phases of his/her work and related tasks?</td>
								
								<?php
									for ($i = 1 ; $i <= 5; $i++){ 
										echo "<td>";?>
										<label class="radio" id="r">
										<input <?php echo set_radio('knowledge', $i); ?>  type = 'radio' name='knowledge' value='<?php echo "$i";?>' data-toggle="radio" />
										</label>
										<?php echo "</td>";
									}
								?>
							</tr>
							<tr class='<?php $class = (form_error('reliability') !== '') ? 'alert-error' : ''; echo $class;?>'>
								<td>Reliability</td>
								<td>Is he highly dependable at all times, completes work on time, and with minimal supervision?</td>
								
								<?php
									for ($i = 1 ; $i <= 5; $i++){ 
										echo "<td>";?>
										<label class="radio" id="r">
										<input <?php echo set_radio('reliability', $i); ?>  type = 'radio' name='reliability' value='<?php echo "$i";?>' data-toggle="radio" />
										</label>
										<?php echo "</td>";
									}
								?>
							</tr>
							<tr class='<?php $class = (form_error('leaning_ability') !== '') ? 'alert-error' : ''; echo $class;?>'>
								<td>Learning Ability</td>
								<td>Does he/she learn new methods in his/her work easily? Can he/she grasp new work quickly and anticipate new developments?</td>
								
								<?php
									for ($i = 1 ; $i <= 5; $i++){ 
										echo "<td>";?>
										<label class="radio" id="r">
										<input <?php echo set_radio('leaning_ability', $i); ?>  type = 'radio' name='leaning_ability' value='<?php echo "$i";?>' data-toggle="radio" />
										</label>
										<?php echo "</td>";
									}
								?>
							</tr>
						</tbody>
					</table><br/>
					<hr>
					<center>
						<p colspan="6"><b style="color:red">1</b>-POOR &nbsp; <b style="color:red">2</b>-NEEDS IMPROVEMENT &nbsp; <b style="color:red">3</b>-SATISFACTORY &nbsp; <b style="color:red">4</b>-VERY SATISFACTORY &nbsp; <b style="color:red">5</b>-OUTSTANDING</p>
					</center>
					<hr>
					
					<img class="title-icons" src="<?php echo base_url('images/icons/png/Retina-Ready.png'); ?>">
					<h3 class="title">BEHAVIORAL COMPETENCY</h3>
					<p>This section will evaluate the personnel based on his/her working behavior. This includes Attendance, Job Attitude, Initiative, Customer Service, Cooperation/Teamwork, and Honest and Integrity.</p>
					<br/>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style='width: 10%'>TITLE</th>
								<th style='width: 85%'>QUESTIONS</th>
								<?php
									for ($i = 1 ; $i <= 5; $i++){
										echo "<th style='width: 5%'><center>".$i."</center></th>";
									}	
								?>
							</tr>
						</thead>
						<tbody>
							<tr class='<?php $class = (form_error('attendance') !== '') ? 'alert-error' : ''; echo $class;?>'>
								<td>Attendance</td>
								<td>Is he/she punctual and reports to work on time? Is he/she consistent, prompt, and dependable in adherence to work hours?</td>
								
								<?php
									for ($i = 1 ; $i <= 5; $i++){ 
										echo "<td>";?>
										<label class="radio" id="r">
										<input <?php echo set_radio('attendance', $i); ?>  type = 'radio' name='attendance' value='<?php echo "$i";?>' data-toggle="radio" />
										</label>
										<?php echo "</td>";
									}
								?>
							</tr>
							<tr class='<?php $class = (form_error('job_attitude') !== '') ? 'alert-error' : ''; echo $class;?>'>
								<td>Job Attitude</td>
								<td>Does he/she shows interest in his/her work? Is he/she extraordinarily enthusiastic and shows high regard about his job?</td>
								
								<?php
									for ($i = 1 ; $i <= 5; $i++){ 
										echo "<td>";?>
										<label class="radio" id="r">
										<input <?php echo set_radio('job_attitude', $i); ?>  type = 'radio' name='job_attitude' value='<?php echo "$i";?>' data-toggle="radio" />
										</label>
										<?php echo "</td>";
									}
								?>
							</tr>
							<tr class='<?php $class = (form_error('initiative') !== '') ? 'alert-error' : ''; echo $class;?>'>
								<td>Initiative</td>
								<td>Does he/she make worthwhile suggestions? Does he/she adopt to improve method of work?</td>
								
								<?php
									for ($i = 1 ; $i <= 5; $i++){ 
										echo "<td>";?>
										<label class="radio" id="r">
										<input <?php echo set_radio('initiative', $i); ?>  type = 'radio' name='initiative' value='<?php echo "$i";?>' data-toggle="radio" />
										</label>
										<?php echo "</td>";
									}
								?>
							</tr>
							<tr class='<?php $class = (form_error('customer_service') !== '') ? 'alert-error' : ''; echo $class;?>'>
								<td>Customer Service</td>
								<td>Is he/she committed to excellent customer service which is responsive, competent and complete to both internal and external customers?</td>
								
								<?php
									for ($i = 1 ; $i <= 5; $i++){ 
										echo "<td>";?>
										<label class="radio" id="r">
										<input <?php echo set_radio('customer_service', $i); ?>  type = 'radio' name='customer_service' value='<?php echo "$i";?>' data-toggle="radio" />
										</label>
										<?php echo "</td>";
									}
								?>
							</tr>
							<tr class='<?php $class = (form_error('cooperation_temWorl') !== '') ? 'alert-error' : ''; echo $class;?>'>
								<td>Cooperation/Teamwork</td>
								<td>Does he/she contributes to attaining the objectives of the team? Does he/she works well with his co-personnel?</td>
								
								<?php
									for ($i = 1 ; $i <= 5; $i++){ 
										echo "<td>";?>
										<label class="radio" id="r">
										<input <?php echo set_radio('cooperation_temWorl', $i); ?>  type = 'radio' name='cooperation_temWorl' value='<?php echo "$i";?>' data-toggle="radio" />
										</label>
										<?php echo "</td>";
									}
								?>
							</tr>
							<tr class='<?php $class = (form_error('honesty_integrity') !== '') ? 'alert-error' : ''; echo $class;?>'>
								<td>Honesty and Integrity</td>
								<td>Is he/she truthful, sincere, and reliable with superior and subordinates?</td>
								
								<?php
									for ($i = 1 ; $i <= 5; $i++){ 
										echo "<td>";?>
										<label class="radio" id="r">
										<input <?php echo set_radio('honesty_integrity', $i); ?>  type = 'radio' name='honesty_integrity' value='<?php echo "$i";?>' data-toggle="radio" />
										</label>
										<?php echo "</td>";
									}
								?>
							</tr>
						</tbody>
					</table>
					<hr><br/>
					<img class="title-icons" src="<?php echo base_url('images/icons/png/Comment.png'); ?>">
					<h3 class="title">COMMENTS</h3>
					<p>What are the strengths that the personnel being evaluated possesses in his/her job? What are the things to improve on?</p>
					<textarea cols="40" rows="5" name="field"></textarea>
					<hr>
					<div class="form-action"><center>
						<a href="#confirmSubmit" role="button" data-toggle="modal" class="btn btn-success">Confirm <span class="fui-lock"></span></a>
						<button class="btn btn-warning" onClick="setRed()" type="reset">Reset <span class="fui-pause"></span></button>
					</div>


					<div id="confirmSubmit" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header palette-orange">
							<h3 class="text-white">Submit Form</h3>
						</div>
						<div class="modal-body">
							Are you sure you want to submit this form? Clicking "Submit" button, however will prevent you from editing your answers.
						</div>
						<div class="modal-footer">		
							<button type="submit" class="btn btn-success pull-left">Submit <span class="fui-check"></span></button>
							<button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Edit <span class="fui-new"></span></button>
						</div>
					</div>

				<?php echo form_close(); ?>
			</div>
		</div>	
	</div>
	<script>
		function setRed(){
			var boxes = document.getElementsByTagName("label");
			var bar_boxes = document.getElementsByTagName("input");

			for( i = 0; i < boxes.length; i++ ){
				myType = boxes[i].getAttribute("class");
				if( myType == "radio checked" ) {
					boxes[i].setAttribute('class','radio');
					bar_boxes[i].removeAttribute('checked');
				}	
			}
		}
	</script>
</div>
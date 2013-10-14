<div class="row-fluid">
	<?php include_once($_SERVER['DOCUMENT_ROOT'] .'/code_ig/application/views/templates/sidebar.php')?>
	<?php $this->load->helper('form'); ?>
	<div class="span9">
		<div class="topliner">
			<div class="content">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Team</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
						<tr>
							<td>Y4IT</td>
							<td>Sia, Efren Ver M.</td>
							<td><a href="<?php echo base_url('index.php/answer/FormEvaluate');?>" class="btn btn-warning"><span class="fui-radio-unchecked"></span></a></td>
						</tr>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>	
	</div>
</div>
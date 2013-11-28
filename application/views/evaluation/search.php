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
					</div>
				</div>
				<hr/>
				<?php echo form_close();?>
			</div>
		</div>	
	</div>
</div>
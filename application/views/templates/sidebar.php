<div class="span3">
	<div class="sidebar">
		<ul>			
			<li <?php if (  !empty($active_nav) && $active_nav == 'PROCESS' ){?>class="active" <?php } else {?> class="inactive" <?php }?>>
				<a style="text-decoration: none" href="<?php echo base_url('index.php/answer/process');?>">
					<div class="sidebar-content">
						<div class="sidebar-icon fui-cmd"></div>
							PROCESS
					</div>
				</a>
			</li>

			<li <?php if (   !empty($active_nav) && $active_nav == 'ANSWERFORM'){ ?>class="active" <?php } else {?> class="inactive" <?php }?>>
				<a style="text-decoration: none" href="<?php echo base_url('index.php/answer/people');?>">
					<div class="sidebar-content">
						<div class="sidebar-icon fui-lock"></div>
							EVALUATE PERSONNEL
					</div>
				</a>
			</li>

			<?php if($role==3 || $role==4){?>
			<li <?php if(   !empty($active_nav) && $active_nav ==  'RESULT'){ ?>class="active" <?php } else {?> class="inactive" <?php }?>>
				<a style="text-decoration: none" href="<?php echo base_url('index.php/answer/results');?>">
					<div class="sidebar-content">
						<div class="sidebar-icon fui-location"></div>
							RESULT
					</div>
				</a>
			</li>
			<?php }?>
		</ul>
	</div>
</div>

	<div class="login">
	<style>
		.cap{
			text-transform: capitalize;
		}
	</style>
        <div class="login-screen">
          <div class="login-icon">
            <img class="img-circle" src='<?php echo base_url('images/icons/UPLittle.png') ?>' alt="Welcome to Mail App" />
            <h4>Welcome to <small>eUP Performance Evaluation</small></h4>
          </div>
		<?php echo form_open('welcome/sendPass');?><?php $this->form_validation->set_error_delimiters('<p class="text-error">', '</p>'); ?>
          <div class="login-form" style="margin-top: 55%">
				<?php if (!empty($message) && $success){?>
					<p class="text-success"><?php echo $message ;?></p><br/>
				<?php }?>
			<p>Please enter your email address<br/> to send password Reset to you account.<br/></p>
            <div class="control-group">
              <input type="text" autocomplete="off" autofocus="autofocus" placeholder="Enter Here" class="login-field" id="login-name" name="credentials"/>
			  <label class="login-field-icon fui-user" for="login-name"></label>
						<?php if(form_error('credentials') !== ''){ ?>
							<?php echo form_error('credentials'); ?>
						<?php }?>
						<?php if (!empty($message) && !$success){?>
							<?php if(!$success){ $class="text-error"; }?>
							<p class="<?php echo $class; ?>"><?php echo $message ;?></p>
						<?php }?>
            </div>
			
			<div class="control-group"><br/>
				<button type="submit" class="btn btn-success btn-block" >Send</button>
				<a href="<?php echo base_url('/');?>" type="button" class="btn btn-warning btn-block" >Cancel</a>
			</div>
			
			</div>
		<?php echo form_close(); ?>
			
        </div>
      </div>
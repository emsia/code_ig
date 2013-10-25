	<div class="login">
	<style>
		.cap{
			text-transform: capitalize;
		}
	</style>
        <div class="login-screen">
		<?php if(empty($login) || $login != 2) {?>
          <div class="login-icon">
            <img class="img-circle" src='<?php echo base_url('images/icons/UPLittle.png') ?>' alt="Welcome to Mail App" />
            <h4>Welcome to <small>eUP Performance Evaluation</small></h4>
          </div>
		<?php }?>
		<?php if(empty($login)){ ?>
		<?php echo form_open('welcome/loginSubmit');?>	
          <div class="login-form" style="margin-top: 55%">
				<?php if (!empty($errors)){?>
				<p class="text-error"><?php echo $errors ;?></p><br/>
				<?php }?>
            <div class="control-group">
              <input type="text" autocomplete="off" autofocus="autofocus" class="login-field" value="" placeholder="Enter your name" id="login-name" name="username"/>
              <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

				<div class="control-group">
				  <input type="password" class="login-field" value="" placeholder="Password" id="login-pass" name="password" />
				  <span class="login-field-icon fui-lock" for="login-pass"></span>
				</div>

				<button type="submit" class="btn btn-warning btn-block" >Login</button>
				<a class="login-link" href="#" style="text-decoration: none">Forgot your password?</a>
				<a class="login-link" href="<?php echo base_url('index.php/welcome/signupForm'); ?>" style="text-decoration: none">Not Yet Member?</a>
			</div>
		<?php echo form_close(); ?>
		<?php } elseif( $login == 1 ){?>
		</div>
		<div class="login-screen">
		<?php echo form_open('welcome/signup');?>	
		<div class="login-form" style="margin-top: 35%">
				<?php $this->form_validation->set_error_delimiters('<p class="text-error">', '</p>'); ?>
				<?php if (!empty($errors)){?>
				<p class="text-error"><?php echo $errors ;?></p><br/>
				<?php }?>
				<div class="control-group">
				  <input type="text" autofocus="autofocus" class=" login-field" value="<?php echo set_value('username'); ?>" placeholder="Username" id="login-name" name="username"/>
				  <label class="login-field-icon fui-eye" for="login-name"></label>
						<?php if(form_error('username') !== ''){ ?>
							<?php echo form_error('username'); ?>
						<?php }?>
				</div>
				<div class="control-group">
				  <input type="text" class="login-field cap" value="<?php echo set_value('lastName'); ?>" placeholder="Last Name" id="login-name" name="lastName"/>
				  <label class="login-field-icon fui-user" for="login-name"></label>
				        <?php if(form_error('lastName') !== ''){ ?>
							<?php echo form_error('lastName'); ?>
						<?php }?>
				</div>
				<div class="control-group">
				  <input type="text" class="login-field cap" value="<?php echo set_value('firtsName'); ?>" placeholder="First Name" id="login-name" name="firtsName"/>
				  <label class="login-field-icon fui-user" for="login-name"></label>
						<?php if(form_error('firtsName') !== ''){ ?>
							<?php echo form_error('firtsName'); ?>
						<?php }?>
				</div>
				<div class="control-group">
				  <input type="text" class="login-field cap" value="<?php echo set_value('middleName'); ?>" placeholder="Middle Name" id="login-name" name="middleName"/>
				  <label class="login-field-icon fui-user" for="login-name"></label>
						<?php if(form_error('middleName') !== ''){ ?>
							<?php echo form_error('middleName'); ?>
						<?php }?>
				</div>
				<div class="control-group">
				  <input type="text" class="login-field" value="<?php echo set_value('email'); ?>" placeholder="Email" id="login-name" name="email"/>
				  <label class="login-field-icon fui-mail" for="login-name"></label>
						<?php if(form_error('email') !== ''){ ?>
							<?php echo form_error('email'); ?>
						<?php }?>
				</div>				
				<div class="control-group">
				  <input type="password" class=" login-field" value="<?php echo set_value('password'); ?>" placeholder="Password" id="login-pass" name="password" />
				  <span class="login-field-icon fui-lock" for="login-pass"></span>
						<?php if(form_error('password') !== ''){ ?>
							<?php echo form_error('password'); ?>
						<?php }?>
				</div>
				<div class="control-group">
				  <input type="password" class=" login-field" value="<?php echo set_value('confPassword'); ?>" placeholder="Confirm Password" id="login-pass" name="confPassword" />
				  <span class="login-field-icon fui-gear" for="login-pass"></span>
						<?php if(form_error('confPassword') !== ''){ ?>
							<?php echo form_error('confPassword'); ?>
						<?php }?>
				</div>
				<div class="control-group">
					<img src="<?php echo base_url('captcha.php'); ?>" id="captcha" /><br/>
					<a href="#" onclick="document.getElementById('captcha').src='<?php echo base_url(); ?>captcha.php?'+Math.random();document.getElementById('captcha-form').focus();" id="change-image">Not readable? Change text.</a><br/><br/>
					<input type="text" name="captcha" class=" login-field" value="" placeholder="Enter Code" id="captcha" />
						<?php if(form_error('captcha') !== ''){ ?>
							<?php echo form_error('captcha'); ?>
						<?php }?>
				</div>
				
				<button type="submit" class="btn btn-success btn-block" >Submit</button>
				<a href="<?php echo base_url('/');?>" type="button" class="btn btn-warning btn-block" >Cancel</a>
		</div>
		<?php echo form_close(); ?>
		<?php } else{ ?>
			<div style="margin-top: 35%">
				<h1 class="text-white">Validation Sent!<br/></h1><p class="text-white">Please check your email for account confirmation.</p><br/>
				<a href="<?php echo base_url('/'); ?>" class="btn btn-large btn-warning"><span class="fui-arrow-left"></span>Login</a>
			</div>
		<?php }?>
			
        </div>
      </div>
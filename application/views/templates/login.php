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
		
		<?php if(empty($login)){ ?>
		<?php echo form_open('welcome/loginSubmit');?>	
          <div class="login-form">
				<?php if (!empty($errors)){?>
				<p class="text-error"><?php echo $errors ;?></p><br/>
				<?php }?>
            <div class="control-group">
              <input type="text" class="form-control login-field" value="" placeholder="Enter your name" id="login-name" name="username"/>
              <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

				<div class="control-group">
				  <input type="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" name="password" />
				  <span class="login-field-icon fui-lock" for="login-pass"></span>
				</div>

				<button type="submit" class="btn btn-warning btn-block" >Login</button>
				<a class="login-link" href="#" style="text-decoration: none">Forgot your password?</a>
				<a class="login-link" href="<?php echo base_url('index.php/welcome/signupForm'); ?>" style="text-decoration: none">Not Yet Member?</a>
			</div>
		<?php echo form_close(); ?>
		<?php } else{?>
		
		<?php echo form_open('welcome/signup');?>	
		<div class="login-form">
				<?php if (!empty($errors)){?>
				<p class="text-error"><?php echo $errors ;?></p><br/>
				<?php }?>
				<div class="control-group">
				  <input type="text" class="form-control login-field cap" value="" placeholder="Last Name" id="login-name" name="lastName"/>
				  <label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				<div class="control-group">
				  <input type="text" class="form-control login-field cap" value="" placeholder="First Name" id="login-name" name="firtsName"/>
				  <label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				<div class="control-group">
				  <input type="text" class="form-control login-field cap" value="" placeholder="Middle Name" id="login-name" name="middleName"/>
				  <label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				<div class="control-group">
				  <input type="text" class="form-control login-field" value="" placeholder="Email" id="login-name" name="email"/>
				  <label class="login-field-icon fui-mail" for="login-name"></label>
				</div>
				<div class="control-group">
				  <input type="text" class="form-control login-field" value="" placeholder="Username" id="login-name" name="username"/>
				  <label class="login-field-icon fui-eye" for="login-name"></label>
				</div>
				<div class="control-group">
				  <input type="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" name="password" />
				  <span class="login-field-icon fui-lock" for="login-pass"></span>
				</div>
				<div class="control-group">
				  <input type="password" class="form-control login-field" value="" placeholder="Confirm Password" id="login-pass" name="confPassword" />
				  <span class="login-field-icon fui-gear" for="login-pass"></span>
				</div>
				<div class="control-group">
					<img src="<?php echo base_url('captcha.php'); ?>" id="captcha" /><br/>
					<a href="#" onclick="document.getElementById('captcha').src='<?php echo base_url(); ?>captcha.php?'+Math.random();document.getElementById('captcha-form').focus();" id="change-image">Not readable? Change text.</a><br/><br/>
					<input type="text" name="captcha" class="form-control login-field" placeholder="Enter Code" id="captcha" />
				</div>
				
				<button type="submit" class="btn btn-success btn-block" >Submit</button>
				<a href="<?php echo base_url('/');?>" type="button" class="btn btn-warning btn-block" >Cancel</a>
		</div>
		<?php echo form_close(); ?>
		<?php }?>
			
        </div>
      </div>
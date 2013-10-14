	<div class="login">
        <div class="login-screen">
          <div class="login-icon">
            <img class="img-circle" src='<?php echo base_url('images/icons/UPLittle.png') ?>' alt="Welcome to Mail App" />
            <h4>Welcome to <small>eUP Performance Evaluation</small></h4>
          </div>
			
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
			<a class="login-link" href="#" style="text-decoration: none">Not yet a member?</a>
		<?php echo form_close(); ?>
          </div>
        </div>
      </div>
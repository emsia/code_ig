	<body>
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse-01"></button>
					<div class="nav-collapse collapse">
						<a class="brand" href="{% url 'classes:dashboard' %}">
							<img class="brand-logo " src="<?php echo base_url('images/icons/png/upitdc.jpg'); ?>" /> eUP: Performance Evaluation
						</a>
						<ul class="nav pull-right">
							<li>
								<a href="/help/">Help</a>
							</li>
							<li>
								<a href="<?php echo base_url('index.php/welcome/logout');?>">Logout</a>
							</li>
							<li class="active dropdown">
								<a href="#" class="dropdown-toggle"><img class="avatar" src="<?php echo base_url('images/icons/png/user.png'); ?>" />
									<?php echo $lastname.", ".$firstname." ".substr($middle, 0, 1)."."; ?>
								</a>								
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
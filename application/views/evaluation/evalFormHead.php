<html>
	<head>
		<title><?php echo $title ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="<?php echo base_url('css/bootstrap.css'); ?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url('css/bootstrap-responsive.css'); ?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url('css/flat-ui.css'); ?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet" media="screen">

		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="../../assets/js/html5shiv.js"></script>
			<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

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
							<li class="active dropdown">
								<a href="#" class="dropdown-toggle"><img class="avatar" src="{{ MEDIA_URL }}{{ avatar }}" />
									{{ user.first_name }} {{ user.last_name }}
									<b class="caret"></b>
								</a>
								<ul>
									<li><a href="{% url 'auth:profile' %}">My Profile</a></li>
									<li><a href="{% url 'auth:edit_profile' %}">Settings</a></li>
									<li><a href="{% url 'auth:user_logout' %}">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		
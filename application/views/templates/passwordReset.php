
<div style="background-color: #F39C12; color: #34495e; font-family: 'Lato', sans-serif; line-height: 1.231; font-size: 14px;">
	<center>
		<img style="max-height: 50px; min-height: 50px; float: none; text-align: -webkit-center; max-width: 100%; vertical-align: middle; border: 0; padding-bottom:3px; padding-top:5px; margin-right: -5px" src="<?php echo base_url('images/icons/png/Map.png');?>">

		<a href="#" type="button" style="font-weight: 500; background-repeat: repeat-x; font-size: 14.994px; border: none; -webkit-backface-visibility: hidden; transition: 0.25s; -o-transition: 0.25s; -moz-transition: 0.25s; -webkit-transition: 0.25s; line-height: 22px; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px; -webkit-box-shadow: none; -moz-box-shadow: none; text-shadow: none; box-shadow: none; text-decoration: none; background: #bdc3c7; color: #ffffff; padding: 9px 12px 10px; background-color: #F39C12;"><b>Request New Password</b></a>
	</center>
</div>

<div style="padding: 7px; border: 2px solid; font-family: 'Lato', sans-serif; line-height: 1.231; font-size: 14px; border-color: #F39C12; padding-right: 20px;">
	<?php echo $firstname?>, you have recently changed your password. Please click the proceeding link to enter at eUP Evaluation and set your new password:<br/><br/>
	
	Your temporary old old password will be: <?php echo '<span style="color: #F39C12; text-decoration: none;">'.$key.'</span>'; ?><br/><br/>
	{unwrap}<a href="<?php echo 'http://192.81.218.182/eupeval/index.php/welcome/setRe/'.$key.'/'?>" style="color: #F39C12; text-decoration: none;"><?php echo 'http://192.81.218.182/eupeval/index.php/welcome/setRe/'.$key.'/'?></a><br/><br/>{/unwrap}

</div>

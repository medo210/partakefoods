<?php
// person info
$name = "Amahle";
$avatar = "avatar.jpg";

// change time to timezone targeting
date_default_timezone_set('Africa/Johannesburg');
$time = date('H:i:s', time());

// add the time
function timePlus($time, $seconds) {
	return date("H:i:s", time() + $seconds);
}

// your click URL
$link = "#";
?>
<!DOCTYPE html>
<html class="js no-flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" style="">
	<head>
		<title><?php echo $name; ?> Chat</title>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<meta charset="utf-8">
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<meta content="width=device-width" name="viewport">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" id="bootstrap-css" rel="stylesheet">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
		<style>
		body {
			margin-top: 20px;
		}
		.chat-search-box {
			-webkit-border-radius: 3px 0 0 0;
			-moz-border-radius: 3px 0 0 0;
			border-radius: 3px 0 0 0;
			padding: .75rem 1rem;
		}
		.chat-search-box .input-group .form-control {
			-webkit-border-radius: 2px 0 0 2px;
			-moz-border-radius: 2px 0 0 2px;
			border-radius: 2px 0 0 2px;
			border-right: 0;
		}
		.chat-search-box .input-group .form-control:focus {
			border-right: 0;
		}
		.chat-search-box .input-group .input-group-btn .btn {
			-webkit-border-radius: 0 2px 2px 0;
			-moz-border-radius: 0 2px 2px 0;
			border-radius: 0 2px 2px 0;
			margin: 0;
		}
		.chat-search-box .input-group .input-group-btn .btn i {
			font-size: 1.2rem;
			line-height: 100%;
			vertical-align: middle;
		}
		@media (max-width: 767px) {
			.chat-search-box {
				display: none;
			}
		}
		.users-container {
			position: relative;
			padding: 1rem 0;
			border-right: 1px solid #e6ecf3;
			height: 100%;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
		}
		.users {
			padding: 0;
		}
		.users .person {
			position: relative;
			width: 100%;
			padding: 10px 1rem;
			cursor: pointer;
			border-bottom: 1px solid #f0f4f8;
		}
		.users .person:hover {
			background-color: #ffffff;
			/* Fallback Color */
			background-image: -webkit-gradient(linear, left top, left bottom, from(#e9eff5), to(#ffffff));
			/* Saf4+, Chrome */
			background-image: -webkit-linear-gradient(right, #e9eff5, #ffffff);
			/* Chrome 10+, Saf5.1+, iOS 5+ */
			background-image: -moz-linear-gradient(right, #e9eff5, #ffffff);
			/* FF3.6 */
			background-image: -ms-linear-gradient(right, #e9eff5, #ffffff);
			/* IE10 */
			background-image: -o-linear-gradient(right, #e9eff5, #ffffff);
			/* Opera 11.10+ */
			background-image: linear-gradient(right, #e9eff5, #ffffff);
		}
		.users .person.active-user {
			background-color: #ffffff;
			/* Fallback Color */
			background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f9fb), to(#ffffff));
			/* Saf4+, Chrome */
			background-image: -webkit-linear-gradient(right, #f7f9fb, #ffffff);
			/* Chrome 10+, Saf5.1+, iOS 5+ */
			background-image: -moz-linear-gradient(right, #f7f9fb, #ffffff);
			/* FF3.6 */
			background-image: -ms-linear-gradient(right, #f7f9fb, #ffffff);
			/* IE10 */
			background-image: -o-linear-gradient(right, #f7f9fb, #ffffff);
			/* Opera 11.10+ */
			background-image: linear-gradient(right, #f7f9fb, #ffffff);
		}
		.users .person:last-child {
			border-bottom: 0;
		}
		.users .person .user {
			display: inline-block;
			position: relative;
			margin-right: 10px;
		}
		.users .person .user img {
			width: 48px;
			height: 48px;
			-webkit-border-radius: 50px;
			-moz-border-radius: 50px;
			border-radius: 50px;
		}
		.users .person .user .status {
			width: 10px;
			height: 10px;
			-webkit-border-radius: 100px;
			-moz-border-radius: 100px;
			border-radius: 100px;
			background: #e6ecf3;
			position: absolute;
			top: 0;
			right: 0;
		}
		.users .person .user .status.online {
			background: #9ec94a;
		}
		.users .person .user .status.offline {
			background: #c4d2e2;
		}
		.users .person .user .status.away {
			background: #f9be52;
		}
		.users .person .user .status.busy {
			background: #fd7274;
		}
		.users .person p.name-time {
			font-weight: 600;
			font-size: .85rem;
			display: inline-block;
		}
		.users .person p.name-time .time {
			font-weight: 400;
			font-size: .7rem;
			text-align: right;
			color: #8796af;
		}
		@media (max-width: 767px) {
			.users .person .user img {
				width: 30px;
				height: 30px;
			}
			.users .person p.name-time {
				display: none;
			}
			.users .person p.name-time .time {
				display: none;
			}
		}
		
		.selected-user {
			width: 100%;
			padding: 0 15px;
			min-height: 64px;
			line-height: 64px;
			border-bottom: 1px solid #e6ecf3;
			-webkit-border-radius: 0 3px 0 0;
			-moz-border-radius: 0 3px 0 0;
			border-radius: 0 3px 0 0;
		}
		.selected-user span {
			line-height: 100%;
		}
		.selected-user span.name {
			font-weight: 700;
		}
		.chat-container {
			position: relative;
			padding: 1rem;
		}
		.chat-container li.chat-left, .chat-container li.chat-right {
			display: flex;
			flex: 1;
			flex-direction: row;
			margin-bottom: 40px;
		}
		.chat-container li img {
			width: 48px;
			height: 48px;
			-webkit-border-radius: 30px;
			-moz-border-radius: 30px;
			border-radius: 30px;
		}
		.chat-container li .chat-avatar {
			margin-right: 20px;
		}
		.chat-container li.chat-right {
			justify-content: flex-end;
		}
		.chat-container li.chat-right>.chat-avatar {
			margin-left: 20px;
			margin-right: 0;
		}
		.chat-container li .chat-name {
			font-size: .75rem;
			color: #999999;
			text-align: center;
		}
		.chat-container li .chat-text {
			padding: .4rem 1rem;
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
			background: #ffffff;
			font-weight: 300;
			line-height: 150%;
			position: relative;
		}
		.chat-container li .chat-text:before {
			content: '';
			position: absolute;
			width: 0;
			height: 0;
			top: 10px;
			left: -20px;
			border: 10px solid;
			border-color: transparent #ffffff transparent transparent;
		}
		.chat-container li.chat-right>.chat-text {
			text-align: right;
		}
		.chat-container li.chat-right>.chat-text:before {
			right: -20px;
			border-color: transparent transparent transparent #ffffff;
			left: inherit;
		}
		.chat-container li .chat-hour {
			padding: 0;
			margin-bottom: 10px;
			font-size: .75rem;
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: center;
			margin: 0 0 0 15px;
		}
		.chat-container li .chat-hour>span {
			font-size: 16px;
			color: #9ec94a;
		}
		.chat-container li.chat-right>.chat-hour {
			margin: 0 15px 0 0;
		}
		.chat-hour {
			padding-top: 5px;
		}
		@media (max-width: 767px) {
			.chat-container li.chat-left, .chat-container li.chat-right {
				flex-direction: column;
				margin-bottom: 30px;
			}
			.chat-container li img {
				width: 32px;
				height: 32px;
			}
			.chat-container li.chat-left .chat-avatar {
				margin: 0 0 5px 0;
				display: flex;
				align-items: center;
			}
			.chat-container li.chat-left .chat-hour {
				justify-content: flex-end;
			}
			.chat-container li.chat-left .chat-name {
				margin-left: 5px;
			}
			.chat-container li.chat-right .chat-avatar {
				order: -1;
				margin: 0 0 5px 0;
				align-items: center;
				display: flex;
				justify-content: right;
				flex-direction: row-reverse;
			}
			.chat-container li.chat-right .chat-hour {
				justify-content: flex-start;
				order: 2;
			}
			.chat-container li.chat-right .chat-name {
				margin-right: 5px;
			}
			.chat-container li .chat-text {
				font-size: .8rem;
			}
		}
		.chat-form {
			padding: 15px;
			width: 100%;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #ffffff;
			border-top: 1px solid white;
		}
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		.card {
			border: 0;
			background: #f4f5fb;
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			border-radius: 2px;
			margin-bottom: 2rem;
			box-shadow: none;
		}
		.fa-check-circle {
			margin: 0 5px;
		}
		</style>
		
		<script>
		$(function() {
			
			$("#chatbox").focus(function(e) {
				$("#alert").fadeIn();
			});
			
			setTimeout(function() {
				$("#msg1").fadeIn();
			}, 1000);
			
			setTimeout(function() {
			    $("#msg2").fadeIn();
			}, 4000);
			
			setTimeout(function() {
			    $("#msg3").fadeIn();
			}, 7000);
			
			setTimeout(function() {
			    $("#msg4").fadeIn();
			}, 11000);
			
			setTimeout(function() {
			    $("#msg5").fadeIn();
			}, 13000);
			
			setTimeout(function() {
			    $("#msg6").fadeIn();
			}, 15000);
			
		});
		</script>
	</head>
	<body>
		<div class="container">
			<!-- Page header start -->
			<div class="page-title">
				<div class="row gutters">
					<div class="col-12">
						<div style="float: right; margin-bottom: 3px">
							<a href="<?php echo $link; ?>" class="btn btn-sm btn-success">Join to Chat</a>
						</div>
						<h5 class="title">
							Chat App
						</h5>
					</div>
				</div>
			</div><!-- Page header end -->
			<!-- Content wrapper start -->
			<div class="content-wrapper">
				<!-- Row start -->
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card m-0">
							<!-- Row start -->
							<div class="row no-gutters">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-2 col-2">
									<div class="users-container">
										<ul class="users">
											<li class="person" data-chat="person1">
												<div class="user">
													<img alt="<?php echo $name; ?>" src="<?php echo $avatar; ?>"> 
													<span class="status online"></span>
												</div>
												<p class="name-time">
													<span class="name"><?php echo $name; ?></span> 
													<span class="time">(online)</span>
												</p>
											</li>
											<li class="person" data-chat="person2">
												<div class="user">
													<img alt="Chat Bot" src="bot.jpg"> 
													<span class="status busy"></span>
												</div>
												<p class="name-time">
													<span class="name">Chat Bot</span> 
													<span class="time">(busy)</span>
												</p>
											</li>

										</ul>
									</div>
								</div>
								<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
									<div class="selected-user">
										<span>You are now chatting with: <span class="name"><?php echo $name; ?></span></span>
									</div>
									<div class="chat-container">
										<ul class="chat-box chatContainerScroll">
											<li class="chat-left" id="msg1" style="display:none">
												<div class="chat-avatar">
													<img alt="<?php echo $name; ?>" src="<?php echo $avatar; ?>">
													<div class="chat-name">
														<?php echo $name; ?>
													</div>
												</div>
												<div class="chat-text">
													Hello, I have been waiting for you.<br>
													I am glad you got my message.
												</div>
												<div class="chat-hour">
													<?php echo timePlus($time, 1); ?> <span class="fa fa-check-circle"></span>
												</div>
											</li>
											<li class="chat-left" id="msg2" style="display:none">
												<div class="chat-avatar">
													<img alt="<?php echo $name; ?>" src="<?php echo $avatar; ?>">
													<div class="chat-name">
														<?php echo $name; ?>
													</div>
												</div>
												<div class="chat-text">
													I will be online for 20 more minutes or so.
												</div>
												<div class="chat-hour">
													<?php echo timePlus($time, 4); ?> <span class="fa fa-check-circle"></span>
												</div>
											</li>
											<li class="chat-left" id="msg3" style="display:none">
												<div class="chat-avatar">
													<img alt="<?php echo $name; ?>" src="<?php echo $avatar; ?>">
													<div class="chat-name">
														<?php echo $name; ?>
													</div>
												</div>
												<div class="chat-text">
													Sign up so we can chat. I will give you my link...
												</div>
												<div class="chat-hour">
													<?php echo timePlus($time, 7); ?> <span class="fa fa-check-circle"></span>
												</div>
											</li>
											<li class="chat-right" id="msg4" style="display:none">
												<div class="chat-hour">
													<?php echo timePlus($time, 11); ?> <span class="fa fa-check-circle"></span>
												</div>
												<div class="chat-text">
													<?php echo $name; ?> has sent you her link!
													<br><br>
													<a href="<?php echo $link; ?>" class="btn btn-primary">👉 Click here to join Chat Bundle</a>
													<br>
												</div>
												<div class="chat-avatar">
													<img alt="Chat Bot" src="bot.jpg">
													<div class="chat-name">
														Chat Bot
													</div>
												</div>
											</li>
											<li class="chat-right" id="msg5" style="display:none">
												<div class="chat-hour">
													<?php echo timePlus($time, 13); ?> <span class="fa fa-check-circle"></span>
												</div>
												<div class="chat-text">
													This link expires in 2 minutes so sign up now ☝️ 
												</div>
												<div class="chat-avatar">
													<img alt="Chat Bot" src="bot.jpg">
													<div class="chat-name">
														Chat Bot
													</div>
												</div>
											</li>
											<li class="chat-left" id="msg6" style="display:none">
												<div class="chat-avatar">
													<img alt="<?php echo $name; ?>" src="<?php echo $avatar; ?>">
													<div class="chat-name">
														<?php echo $name; ?>
													</div>
												</div>
												<div class="chat-text">
													That's my link. You'll be taken to my profile when you join Chat Bundle.
													<br><br>
													See you on there! 😘
												</div>
												<div class="chat-hour">
													<?php echo timePlus($time, 15); ?> <span class="fa fa-check-circle"></span>
												</div>
											</li>
										</ul>
										<div class="form-group mt-3 mb-0">
											<div class="alert alert-danger" style="display:none" id="alert">
												You cannot message <? echo $name; ?> until you sign up for Chat Bundle.
												<hr>
												<a href="<?php echo $link; ?>" class="btn btn-danger">Click here to join Chat Bundle</a>
											</div>
											<textarea class="form-control" id="chatbox" placeholder="Type your message here..." rows="3"></textarea>
										</div>
									</div>
								</div>
							</div><!-- Row end -->
						</div>
					</div>
				</div><!-- Row end -->
			</div><!-- Content wrapper end -->
		</div>
	</body>
</html>
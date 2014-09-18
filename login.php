<?php
	$error = false;
	if (isset($_POST['name'])) {
		require_once("api.class.php");
		$sid = json_decode(API::login($_POST['name'], $_POST['pw']), true);
		
		if ($sid['error'] != "") {
			$error = true;
		} else {		
			setcookie("sid", $sid['result']['sid']);
			header("Location: index.php");
		}
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		
		<!-- social media meta-info -->
		<!-- for Google -->
		<meta name="description" content="with plum students of the Faculty of Engineering FAU Erlangen-Nuremberg can shout-out their current position and what they're doing." />
		<meta name="keywords" content="plum, faui2k13, fau, computer science" />
		<meta name="author" content="ra1n, nakami" />
		<meta name="copyright" content="all rights reserved" />
		<meta name="application-name" content="plum_" />
		<!-- for Facebook -->          
		<meta property="og:title" content="plum_" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="http://plum.faui2k13.de/media/plum_200x200.png" />
		<meta property="og:url" content="http://plum.faui2k13.de/login.php" />
		<meta property="og:description" content="with plum students of the Faculty of Engineering FAU Erlangen-Nuremberg can shout-out their current position and what they're doing." />
		<!-- for Twitter -->          
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:title" content="plum_" />
		<meta name="twitter:description" content="with plum students of the Faculty of Engineering FAU Erlangen-Nuremberg can shout-out their current position and what they're doing." />
		<meta name="twitter:image" content="http://plum.faui2k13.de/media/plum_200x200.png" />
		<script src="jquery.js" type="text/javascript"></script>
		<script src="jquery.cookie.js" type="text/javascript"></script>
		
		<title>plum_</title>
		<link rel="shortcut icon" href="/media/plum32x32v2.ico">
		<link href="css/plum.css" type="text/css" rel="stylesheet" media="all">
		<link href="css/buttons.css" type="text/css" rel="stylesheet" media="all">
		<link href="css/info_box.css" type="text/css" rel="stylesheet" media="all">
		<link href="css/plum_clouds.css" type="text/css" rel="stylesheet" media="all">

		<!-- nightmode -->
		<link href="css/css_toggle.css" type="text/css" rel="stylesheet" media="all">
		<link id="nightmode" rel="stylesheet" type="text/css" href="">
		<!-- toggle position difference -->
		<style>
			div#css_toggle {
				right:5px !important;
			}
		</style>
		<script type="text/javascript">
			function updateStylesheet() {
				if ($.cookie("switch-input") == "true")
					document.getElementById('nightmode').setAttribute('href', 'css/plum_night.css');
				else
					document.getElementById('nightmode').setAttribute('href', '');
			}
			updateStylesheet();
		</script>
		<!-- /night mode -->
	</head>
	<body>
		<!-- cookie night mode -->
		<script>
			$(function () {
				$("input.switch-input").each(function() {
					var mycookie = $.cookie($(this).attr('name'));
					if (mycookie && mycookie == "true") {
						$(this).prop('checked', mycookie);
					}
				});
				
				$("input.switch-input").change(function() {
					$.cookie($(this).attr("name"), $(this).prop('checked'), {
						path: '/',
						expires: 365
					});
					
					updateStylesheet();
				});
			});
		</script>
		<!-- /cookie night mode -->
		<div id="logo">
				<span class="logo">plum<span class="underscore">_</span></span>
		</div>
		<div id="login">
			<form id="loginForm" method="POST" action="login.php">
				<table>
					<tr class="userRow">
					<td>
						<div class="userDiv">
							<label>user:</label>
						</div>
					</td>
					<td>
						<input name="name" type="text" style="width:150px;" /></td>
					</td>
					</tr>
					<tr class="passRow">
					<td>
						<div class="passDiv">
							<label>pass:</label>
						</div>
					</td>
					<td>
						<input name="pw" type="password" style="width:150px;" />
					</td>
					</tr>
					<tr>
					<td>
						<div class="loginDiv">
							<input class="btnLogin" type="submit" value="login" />
						</div>
					</td>
					<td>
						<div class="registerDiv">
							<input class="btnRegister" type="button" value="register" onClick="window.location.href='register.php'"/>
						</div>
					</td>
					</tr>
				</table>
			</form>
		<?php if ($error) { ?>
			<p class="fontapply">
				Error logging in! Try again.
			</p>
		<?php } ?>
		</div>
		<div class="info_box">
	        	<ul class="tabs">
			         <li class="tab">
			          <input type="radio" checked name="tabs" id="tab1">
			          <label for="tab1">changelog</label>
			          <div id="tab-content1" class="tab-content">
			            <div class="animated  fadeInRight">
							<p>18.09.14: added 'nightmode' <b>{new}</b></p>
							<p>08.09.14: added experimental 'nightmode'</p>
							<p>23.05.14: added 'changelog'- and 'about'-tab</p>
			             <p>19.05.14: plum went online</p>
			            </div>
			          </div>
			        </li>
			        <li class="tab">
			          <input type="radio" name="tabs" id="tab2">
			          <label for="tab2">about</label>
			          <div id="tab-content2" class="tab-content" >
			            <div class="animated  fadeInRight">
			              plum is a free and open source project by ra1n and nakami.<br>with plum students of the Faculty of Engineering FAU Erlangen-Nuremberg can shout-out their current position and what they're doing.<br><br>visit our github-entry for upcoming features: <a href="https://github.com/floMeise/plum/issues">https://github.com/floMeise/plum/issues</a>
							<div id="plum_clouds">
							<section id="clouds_apply" >
								<div id="logo_transparent"></div>
							</section>
						</div>			           

					   </div>
							
			          </div>
						
			        </li>
					<!-- license
			         <li class="tab">
			          <input type="radio" name="tabs" id="tab3">
			          <label for="tab3">license</label>
			          <div id="tab-content3" class="tab-content">
			            <div class="animated  fadeInRight ">
			              license
			            </div>
			          </div>
			        </li> -->
			    </ul>
				</div>
				<div id="css_toggle">
			<label class="switch">
				<input type="checkbox" class="switch-input" name="switch-input" id="switch-input" >
					<span class="switch-label" data-on="on" data-off="off"></span><span class="switch-handle"></span>
				</input>
			</label>
		</div> 
	</body>
</html>

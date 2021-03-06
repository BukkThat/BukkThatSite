﻿<!DOCTYPE html>
<?php
	require("functions.php");
?>

<html>
	<head>
		<title>Apply for Bukkit Community Server</title>
		<?php headIncludes(); ?>
	</head>
	<body>
		<?php navBar(); ?>
		<div class="container">
			<div class="well mainContent">
				<div style='text-align: center;'>
					<img src="http://forums.bukkit.org/logo.png"></img>
					<h3>Community Server</h6>
					<a href="#requirements" role="button" class="btn btn-primary" data-toggle="modal" style = "margin-left: 16px;"><i class = "icon-info-sign"></i> Application Requirements</a>
				</div>
				<br />
				<?php 
					if($_GET['e'] == 1) { ?><div class="alert alert-error">You need to fill in your Minecraft Username!</div><?php }
					if($_GET['e'] == 2) { ?><div class="alert alert-error">You need to fill in your Bukkit Username!</div><?php }
					if($_GET['e'] == 3) { ?><div class="alert alert-error">Your Minecraft username must be premium!</div><?php }
					if($_GET['e'] == 4) { ?><div class="alert alert-error">Your Bukkit username must be valid!</div><?php }
					if($_GET['e'] == 5) { ?><div class="alert alert-error">You don't have the minimum number of posts/plugins!</div><?php }
					if($_GET['e'] == 6) { ?><div class="alert alert-error">An application has already been submitted with that Minecraft/Bukkit username.<br>
					If this was an error, contact gomeow.</div><?php }
					if($_GET['s'] == 1) { ?><div class="alert alert-warning alert-block"><b>Success!</b> <br />Now please click the link found in a private message over the Bukkit Forums to complete your application!</div><?php }
					if($_GET['s'] == 2) { ?><div class="alert alert-warning alert-block"><b>Success!</b> <br />Now please click the link found in a private message over the Bukkit Forums to complete your application! Please note you were added to the vote list because you did not meet the plugin/post requirements. You will receive a new PM once you are voted in.</div><?php }
				?>
				<form class="applyForm" action="applyScript.php" method="POST">
					<fieldset>
						<legend>Apply</legend>
						<label>Username: </label>
						<input type="text" name="minecraft" placeholder="Your username in Minecraft" />
						<label>Bukkit Name:</label>
						<input type="text" name="bukkit" placeholder="Your username on Bukkit" />
						</br>
						<button type="submit" class="btn btn-primary">Submit</button>
					</fieldset>
				</form>
			</div>
		</div>
		<!-- Modal -->
		<div id="requirements" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Application Requirements</h3>
			</div>
			<div class="modal-body">
				<h5>Conditions:<h5>
				<h6>Meet one of the following:</h6>
				<ul>
					<li>Have at least 800 posts on the Bukkit Forums.</li>
					<li>Have made at least 2 plugins.</li>
				</ul>
				<h6>Meet all of the following as well:</h6>
				<ul>
					<li>Have a premium Minecraft account.</li>
					<li>Have a valid Bukkit account</li>
				</ul>
				<h6>These will all be verified!</h6>
			</div>
		</div>
	</body>
</html>

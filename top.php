<!DOCTYPE html>
	<head>
		<meta charset="UTF-8" />
		<title>Aaron Yarhouse</title>
		<link rel="stylesheet" type="text/css" href="lcars.css" />
		<script type="text/javascript" src="script.js" ></script>
	</head>
	<body onload="updateClock(); setInterval('updateClock()', 1000 )">
		<div id="tweet">
			<p class="latest">Latest comm. from <a href="http://twitter.com/yarhouse" target="_blank" class="tweet" >Yarhouse</a></p>
			<p class="tweet"><?php include 'tweet.php'; ?></p>
		</div>
		<div id="header">
			<h1 class="title" >Library Computer Access and Retrieval System - LCARS</h1>
			<div class="stardate">
				<p class="stardate">Current Stardate: <span id="stardate">&nbsp;</span></p>
			</div>
		</div>
		<div id="contents">
			<div id="moving_bar">
				<p>Info</p>
			</div>
			<div id="markup">

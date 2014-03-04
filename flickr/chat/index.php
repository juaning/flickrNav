<html>
	<head>
		<title>Chat sample</title>
		<link href="style.css" type="text/css" />
	</head>
	<body>
		<!-- Container -->
		<div class="chatContainer"></div>
		<!-- Templates -->
		<!-- Main view template -->
		<script id="chatMainTpl" type="text/x-handlebars">
			<h3>{{title}}</h3>
			<div class="chatBalloon">{{> chatBalloonTpl}}</div>
			<div class="chatToolbar">{{> chatToolbarTpl}}</div>
		</script>
		<!-- Chat balloon template -->
		<script id="chatBalloonTpl" type="text/x-handlebars">
			<span class="sender">{{sender}}</span>
			<span class="message">{{message}}</span>
		</script>
		<!-- Toolbar template -->
		<script id="chatToolbarTpl" type="text/x-handlebars">
			<input type="text" id="inputMsg" />
			<span class="button">{{btnText}}</span>
		</script>
		<!-- include scripts -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    	<script src="http://ajax.cdnjs.com/ajax/libs/underscore.js/1.1.4/underscore-min.js"></script>
    	<script src="http://ajax.cdnjs.com/ajax/libs/backbone.js/0.3.3/backbone-min.js"></script>
    	<script src="http://cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.3.0/handlebars.amd.min.js"></script>
		<script type="text/javascript" src="chat.js"></script>
	</body>
</html>
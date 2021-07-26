<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport"content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<title>The Running Agent</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <script>
        window.game_endpoint = '{{ $api_endpoint }}';
        window.api_token = '{{ $api_token }}';
    </script>
	<script src="../libs/sweetalert.min.js?v=2"></script>
    <script src="/libs/SpineWebGLPlugin.js?v=2b"></script>
    <script src="/libs/phaser.min.js?v=2b"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/api.js?v=3"></script>
	<script src="js/dialog_result.js?v=5b"></script>
	<script src="js/userdata.js?v=1"></script>
	<script type="text/javascript" src="js/play.js?v=37b"></script>
    <script>
        dir = '';
        resVersion = '?v=2';
    </script>
</body>
</html>

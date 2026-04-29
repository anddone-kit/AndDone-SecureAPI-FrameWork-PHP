<!doctype html>
<html lang='en'>
<head>
	<!-- Required meta tags -->
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'>
	<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js'></script>
	<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/styles.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>

	<title>API Explorer</title>
</head>
<body>
<!-- Side navigation -->
<div class='container-fluid'>
	<div class='row flex-nowrap'>
		@include('mainmenu')
		<div class='vstack content-container'>
			<h3>Configuration</h3>
			<div>Config File Location: .env</div>
			<br>
			<div class='hstack'>
				<p>SDK_API_KEY:&nbsp</p>
				<p id='xApiKey'>{{ config('sdk.api_key') }}</p>
			</div>
			<div class='hstack'>
				<p>SDK_API_KEY:&nbsp</p>
				<p id='xAppKey'>{{ config('sdk.app_key') }}</p>
			</div>
			<div class='hstack'>
				<p>SDK_VERSION:&nbsp</p>
				<p id='xVersion'>{{ config('sdk.version') }}</p>
			</div>
			<div class='hstack'>
				<p>SDK_ORIGIN:&nbsp</p>
				<p id='Origin'>{{ config('sdk.origin') }}</p>
			</div>
		</div>
	</div>
</div>

</body>
</html>

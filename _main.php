<?php
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge" />

	<title>Are you loco?</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= versionedAssetUrl('styles/style.css') ?>" />

	<!-- Favicon here -->
</head>
<body>

	<div id="particles-js"></div>

	<header class="container">
		<h1>Are you loco?</h1>
	</header>

	<div class="main">
		<?= $content ?>
	</div>

	<footer class="container">
		<h1>&hellip; or lahmo?</h1>
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="scripts/particles.min.js" ></script>
	<script type="text/javascript" src="<?= versionedAssetUrl('scripts/main.js') ?>" ></script>

</body>
</html>

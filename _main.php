<?php
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge" />

	<title><?= $title ?></title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= versionedAssetUrl('styles/style.css') ?>" />

	<!-- Favicon here -->
</head>
<body>

	<div id="particles-js"></div>

	<header class="container">
		<h1><?= $title ?></h1>
	</header>

	<div class="main">
			<div class="container">
				<form method="post" action="<?= $rootPath ?>name">
					<input name="name" value="" maxlength="100" placeholder="Name" type="text">
					<input class="button" type="submit" value="Neue Person speichern" />
				</form>
			</div>

			<div class="container">
				<div class="card-group">

					<?php
						foreach ($people as $person) {
							$votes = $person->votes ? $person->votes : 0;

							$vote_button = $person->hasvoted ? "Schon gevotet." : "
								<form method='post' action='{$rootPath}vote'>
									<input name='id' value='$person->id' hidden>
									<input class='button' type='submit' value='Loco' />
								</form>
							";

						  echo "
						    <div class='card'>
						      <div class='card-body'>
						        <h5 class='card-title'>
						          $person->name
						          <span class='percentage'>$votes</span>
						        </h5>
						        <p class='card-text'>$vote_button</p>
						      </div>
						    </div>";
						}
					?>
				</div>
			</div>
	</div>

	<footer class="container">
		<h1>&hellip; or lahmo?</h1>
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="scripts/particles.min.js" ></script>
	<script type="text/javascript" src="<?= versionedAssetUrl('scripts/main.js') ?>" ></script>

</body>
</html>

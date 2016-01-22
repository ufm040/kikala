<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<div class="container">
		<header>
			<h1><a href="<?php echo $this->url('home')?>" title="Accueil">Kikala</a></h1>
			<nav id="headmenu" class="clearfix">
				<ul>
					<li><a href="#" title="Formations">Formations en cours</a></li>
					<li><a href="#" title="Créer une formation">Créer une formation</a></li>
				</ul>
			</nav>			
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
			<nav id="footermenu" class="clearfix">
				<ul>
					<li><a href="<?php echo $this->url('home')?>" title="Accueil">Accueil</a></li>
					<li><a href="#" title="A propos">A propos</a></li>
					<li><a href="#" title="Mentions Légales">Mentions Légales</a></li>
					<li><a href="#" title="Inscription">Inscription</a></li>

				</ul>
			</nav>			
		</footer>
	</div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Economica:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<div class="container-fluid">
		<header>

		<div class="row">
			<div class="col-sm-8 col-xs-12">
				<h1><a href="<?php echo $this->url('home')?>" title="Accueil">Kikala !</a></h1>
			</div>	
			<div class="col-sm-4 col-xs-12" id="headconnect">
				<ul>
					<li><a href="#" title="Mon compte"><i class="fa fa-user"></i> Mon compte</a></li>
					<li><a href="#" title="Inscription"><i class="fa fa-power-off"></i> Je m'inscris</a></li>
				</ul>			
				</div>
			</div>
		</div>	

		<nav id="headmenu" class="clearfix">
			<ul>
				<li><a href="#" title="Formations">Je cherche une formation</a></li>
				<li><a href="#" title="Créer une formation">Je crée une formation</a></li>
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
	<script src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
</body>
</html>
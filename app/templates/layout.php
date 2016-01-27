<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Economica:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/datepicker.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/styleformation.css') ?>">
</head>
<body>
	<div class="container-fluid">
		<header>

		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<h1><a href="<?= $this->url('home')?>" title="Accueil">Kikala !</a></h1>
			</div>	
			<div class="col-sm-8 col-xs-12">
				<div id="headconnect">
					<div class="col-sm-6 col-xs-6 yo">
						<a href="<?= $this->url('login')?>" title="Connexion"><i class="fa fa-power-off"></i>Connexion</a>
					</div>
					<div class="col-sm-6 col-xs-6 yo">
						<a href="<?= $this->url('register')?>" title="Inscription"><i class="fa fa-user"></i>Je m'inscris</a>
					</div>
				</div>			
			</div>
		</div>	

		<nav id="headmenu" class="clearfix">
			<ul>
				<li><a href="<?= $this->url('list_formations') ?>" title="Formations">Je cherche une formation</a></li>
				<li><a href="<?= $this->url('formationregister')?>" title="Créer une formation">Je crée une formation</a></li>
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
					<li><a href="<?= $this->url('about') ?>" title="A propos">A propos</a></li>
					<li><a href="<?= $this->url('legals') ?>" title="Mentions Légales">Mentions Légales</a></li>
					<li><a href="<?= $this->url('register') ?>" title="Inscription">Inscription</a></li>

				</ul>
			</nav>			
		</footer>
	</div>

	<script src="<?= $this->assetUrl('js/jquery-2.1.4.js') ?>"></script>
	<!-- pour le datepicker jQuery UI -->
	<script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>

	
	<script src="<?= $this->assetUrl('js/bootstrap-datepicker.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/bootstrap-datepicker.fr.js') ?>"></script>	


	<script src="<?= $this->assetUrl('js/main.js') ?>"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Economica:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap-datepicker.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap-timepicker.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/styleformation.css') ?>">
</head>
<body>
	<div class="container-fluid push">
		<header>
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-6">
					<h1><a href="<?= $this->url('home')?>" title="Accueil Kikala !">Kikala !</a></h1>
				</div>	
				<div class="col-md-8 col-sm-6 col-xs-6">
					<!--div id="headconnect"-->
					<div class="row" id="headconnect">
						<div class="col-sm-6 col-xs-6">
							<?php if ($w_user['id']) {?> 
								<a href="<?= $this->url('logout')?>" title="Déconnexion"><i class="fa fa-power-off"></i>Déconnexion</a>
							<?php } else { ?>
								<a href="<?= $this->url('login')?>" title="Connexion"><i class="fa fa-power-off"></i>Connexion</a>
							<?php }	?>
						</div>
						<div class="col-sm-6 col-xs-6">
							<?php if ($w_user['id']) {?> 
							<ul>
								<li><a href="<?= $this->url('detail_account',['username'=>$w_user['username']])?>" title="Mon compte"><i class="fa fa-user"></i>Mon Compte</a>
									<ul>
										<li><a href="<?= $this->url('profile',['username'=>$w_user['username']])?>" title="Mon profil">Mon profil</a></li>
										<li><a href="<?= $this->url('list_formations',['username'=>$w_user['username'],'slug'=>1]) ?>" title="Mes formations">Mes formations</a></li>
										<li><a href="<?= $this->url('list_inscriptions',['username'=>$w_user['username'],'slug'=>1]) ?>" title="Mes inscriptions">Mes inscriptions</a></li>
										<?php if ($w_user['credit']>0) : ?>
											<li class="nbr-kikala">J'ai <?= $w_user['credit'] ;?> kiko<?= ($w_user['credit']>1) ? 's ' :' ' ;?>!</li>
										<?php else : ?>	
											<li class="nbr-kikala">Je n'ai plus de kikos ... <i class="fa fa-frown-o"></i></li>	
										<?php endif ?>	
									</ul>
								</li>
							</ul>
							<?php } else { ?>
								<a href="<?= $this->url('register')?>" title="Inscription"><i class="fa fa-user"></i>Je m'inscris</a>
							<?php }	?>
						</div>
					</div>			
				</div>
			</div>	

			<div class="row">
				<div class="col-sm-12">	
					<nav id="headmenu" class="clearfix">
						<ul>
							<li><a href="<?= $this->url('list_formations',['username'=>'all','slug'=>1]) ?>" title="Chercher une formation">Je cherche une formation</a></li>
							<li><a href="<?= $this->url('formationregister')?>" title="Créer une formation">Je crée une formation</a></li>
						</ul>
					</nav>
				</div>	
			</div>		
			</header>

			<section>
				<?= $this->section('main_content') ?>
			</section>
	</div>
		
		<div class="container-fluid">
			<footer>
				<div class="responsive-bar">
					<i class="fa fa-angle-double-down fa-2x"></i>
				</div>
					<nav id="footermenu" class="clearfix">
						<ul>
							<li><a href="<?php echo $this->url('home')?>" title="Accueil">Accueil</a></li>
							<li><a href="<?= $this->url('about') ?>" title="A propos">A propos</a></li>
							<li><a href="<?= $this->url('legals') ?>" title="Mentions Légales">Mentions Légales</a></li>
							<li><a href="<?= $this->url('register') ?>" title="Inscription">Inscription</a></li>
						</ul>
					</nav>
				<div class="responsive-bar">
					<i class="fa fa-angle-double-up fa-2x hidebars"></i>
				</div>					
							
			</footer>
		</div>
	

	<script src="<?= $this->assetUrl('js/jquery-2.1.4.js') ?>"></script>

	<!-- pour le datepicker jQuery UI - Bootstrapt -->
	<script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>	
	<script src="<?= $this->assetUrl('js/bootstrap-datepicker.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/bootstrap-datepicker.fr.js') ?>"></script>	
	<script src="<?= $this->assetUrl('js/bootstrap-timepicker.min.js') ?>"></script>	

	<!-- Script du site-->
	<script src="<?= $this->assetUrl('js/main.js') ?>"></script>

</body>
</html>
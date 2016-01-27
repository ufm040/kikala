<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<div id='homepage'> 

		<div class="row">
			<div class="col-md-12">
				<h2>Un système de formations communautaires basé sur l'échange</h2>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="homecase">
					Choisissez parmi les 15 formations proposées
				</div>
			</div>		
			<div class="col-md-6 col-sm-12">
				<div class="homecase">
					32 kikologues inscrits
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="homecase">
					<a href="<?= $this->url('register') ?>" title="Inscription">Inscription</a>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="homecase">
					<a href="<?= $this->url('login') ?>" title="Connexion">Connexion</a>
				</div>	
			</div>
		</div>
						
	</div>	
<?php $this->stop('main_content') ?>
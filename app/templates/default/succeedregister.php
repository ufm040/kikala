<?php $this->layout('layout', ['title' => 'Inscription Réussie']) ?>

<?php $this->start('main_content') ?>

<h2>Bravo ! Vous avez bien été inscrit !</h2>

<div id="succeedregister">
	<div class="row">
		<div class="col-sm-12 col-xs-12">
			<a href="<?= $this->url('home') ?>"title="Retour à la page d'accueil"><i class="fa fa-share"></i> Retour à la page d'acceuil !</a>
		</div>
	</div>
</div>

<?php $this->stop('main_content') ?>
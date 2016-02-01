<?php $this->layout('layout', ['title' => 'Déconnexion']) ?>

<?php $this->start('main_content') ?>

<h2>Vous avez bien été deconnecté !</h2>

<div id="logout">
	<div class="row">
		<div class="col-sm-12 col-xs-12">
			<a href="<?= $this->url('home') ?>"title="Retour à la page d'accueil"><i class="fa fa-share"></i> Retour à la page d'acceuil !</a>
		</div>
	</div>
</div>

<?php $this->stop('main_content') ?>

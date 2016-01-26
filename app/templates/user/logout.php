<?php $this->layout('layout', ['title' => 'Déconnexion']) ?>

<?php $this->start('main_content') ?>
	<h2>Déconnexion</h2>
	<!-- <p>Vous avez bien été déconnecté.</p> -->
	<a href="<?= $this->url('home') ?>" title="Retour à la page d'accueil"> --> Retour à la page d'accueil</a>
<?php $this->stop('main_content') ?>

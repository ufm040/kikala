<?php $this->layout('layout', ['title' => 'Nouveau mot de passe']) ?>

<?php $this->start('main_content') ?>
	<h2>Nouveau mot de passe</h2>

	<form method="POST" novalidate>

		<input type="password" placeholder="Nouveau mot de passe" name="password" />

		<input type="password" placeholder="Confirmation du nouveau mot de passe" name="passwordConfirm" />

		<button type="submit">Valider</button>

	</form>
<?php $this->stop('main_content') ?>

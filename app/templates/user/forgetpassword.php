<?php $this->layout('layout', ['title' => 'Mot de passe oublié']) ?>

<?php $this->start('main_content') ?>
	<h2>Mot de passe oublié</h2>

	<form method="POST" novalidate>

		<input type="email" placeholder="Email" name="email" />

		<button type="submit">Envoyer</button>
		
	</form>
<?php $this->stop('main_content') ?>

<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
	<h2>Connexion</h2>

	<form method="POST" novalidate>

		<input type="email" placeholder="Email" name="email" />

		<input type="password" placeholder="Mot de passe" name="password" />

		<label><input type ="checkbox" value="stayLogin" />Rester connecté ?</label><br />

		<a href="<?= $this->url('register') ?>" title="Page d'inscription">Créer un compte</a><br />
		<a href="<?= $this->url('forgetpassword') ?>" title="Page du mot de passe oublié">Mot de passe oublié ?</a><br />

		<button type="submit">Se connecter</button>

	</form>
<?php $this->stop('main_content') ?>

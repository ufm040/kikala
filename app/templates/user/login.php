<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
	<h2>Connexion</h2>

	<form id="loginform" method="POST" novalidate>
		<fieldset>
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<label for="email">Email</label>
					<input type="email" placeholder="Email" name="email" />
				</div>

				<div class="col-sm-12 col-xs-12">
					<label for="password">Mot de passe</label>
					<input type="password" placeholder="Mot de passe" name="password" />
				</div>
				
				<div class="checkbox-inline">
					<label>
						<input type ="checkbox" value="stayLogin" />
						Rester connecté ?
					</label>
				</div>

				<div class="col-sm-12 col-xs-12">
					<a href="<?= $this->url('register') ?>" title="Page d'inscription">Créer un compte</a>
					<a href="<?= $this->url('forgetpassword') ?>" title="Page du mot de passe oublié">Mot de passe oublié ?</a>
				</div>
			</div>
		</fieldset>

		<fieldset>
			<button type="submit" class="btn btn-info">Je me connecte !</button>
		</fieldset>	

	</form>
<?php $this->stop('main_content') ?>

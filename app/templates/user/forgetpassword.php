<?php $this->layout('layout', ['title' => 'Mot de passe oublié']) ?>

<?php $this->start('main_content') ?>
	<h2>Mot de passe oublié</h2>

	<form id="forgetpasswordform" method="POST" novalidate>
		<fieldset>
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<label for="email">Email</label>
					<input type="email" placeholder="Email" name="email" />
				</div>
			</div>
		</fieldset>

		<fieldset>
			<button type="submit" class="btn btn-info">J'envoie !</button>
		</fieldset>
		
	</form>
<?php $this->stop('main_content') ?>

<?php $this->layout('layout', ['title' => 'Nouveau mot de passe']) ?>

<?php $this->start('main_content') ?>
	<h2>Nouveau mot de passe</h2>

	<form id="newpasswordform" method="POST" novalidate>
		<fieldset>
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<label for="newpassword">Nouveau mot de passe</label>
					<input type="password" placeholder="Nouveau mot de passe" name="newpassword" />
				</div>

				<div class="col-sm-12 col-xs-12">
					<label for="newpasswordConfirm">Confirmation du nouveau mot de passe</label>
					<input type="password" placeholder="Confirmation du nouveau mot de passe" name="newpasswordConfirm" />
				</div>
			</div>
		</fieldset>

		<fieldset>
			<button type="submit" class="btn btn-info">Je valide !</button>
		</fieldset>

	</form>
<?php $this->stop('main_content') ?>

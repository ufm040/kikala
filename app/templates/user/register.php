<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
	<h2>Inscription</h2>

	<form id ="compteform" method="POST" novalidate enctype="multipart/form-data">
		<fieldset>
			<div class="row">
				<div class="col-sm-12 col-xs-12">	
					<label for="username">Pseudo</label>	
					<input type="text" placeholder="Pseudo" name="username" />
				</div>
				
				<div class="col-sm-12 col-xs-12">	
					<label for="email">Email</label>
					<input type="email" placeholder="Email" name="email" />
				</div>

				<div class="col-sm-12 col-xs-12">	
					<label for="password">Mot de passe</label>
					<input type="password" placeholder="Mot de passe" name="password" />
				</div>

				<div class="col-sm-12 col-xs-12">	
					<label for="passwordConfirm">Confirmation du mot de passe</label>
					<input type="password" placeholder="Confirmation du mot de passe" name="passwordConfirm" />
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="lastname">Nom</label>
					<input type="text" placeholder="Nom" name="lastname" />
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="firstname">Prénom</label>
					<input type="text" placeholder="Prénom" name="firstname" />
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="birthyear">Année de naissance</label>
					<input type="date" placeholder="Année de naissance" name="birthyear" />
				</div>
				
				<div class="col-sm-12 col-xs-12">
					<div class="radio-inline">
					  <label for="sex">
					    <input type="radio" name="sex" id="sex" value="female">
					    Femme
					  </label>
					</div>
					<div class="radio-inline">
					  <label>
					    <input type="radio" name="sex" id="sex" value="male">
					    Homme
					  </label>
					</div>
				</div>

				<div class="col-sm-12 col-xs-12">	
					<label for="job">Métier</label>
					<textarea type="text" placeholder="Métier" name="job"></textarea>
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="instructorDescription">Description en tant que formateur</label>
					<textarea id ="description" type="text" placeholder="Description en tant que formateur ..." name="instructorDescription"></textarea>
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="studentDescription">Description en tant qu'étudiant</label>
					<textarea id ="description" type="text" placeholder="Description en tant qu'étudiant ..." name="studentDescription"></textarea>
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="image">Choisir une image de profil</label>
					<input type="file" name="image" />
				</div>
			</div>
		</fieldset>

		<fieldset>
				<button type="submit" class="btn btn-info">Je m'inscris !</button>
		</fieldset>

	</form>
<?php $this->stop('main_content') ?>

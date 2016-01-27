<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
	<h2>Inscription</h2>

	<form id ="compteform" method="POST" novalidate enctype="multipart/form-data">
		<fieldset>
			<div class="row">
				<div class="col-sm-12 col-xs-12">	
					<label for="username">Pseudo</label>	
					<input type="text" placeholder="Pseudo" name="username"  value="<?= (!empty($_POST['username'])) ? $_POST['username'] : '' ;?>"/>
					<p class="error"><?= (!empty($error['username'])) ? $error['username'] : '' ;?></p>
				</div>
				
				<div class="col-sm-12 col-xs-12">	
					<label for="email">Email</label>
					<input type="email" placeholder="Email" name="email" value="<?= (!empty($_POST['email'])) ? $_POST['email'] : '' ;?>"/>
					<p class="error"><?= (!empty($error['email'])) ? $error['email'] : '' ;?></p>
				</div>

				<div class="col-sm-12 col-xs-12">	
					<label for="password">Mot de passe</label>
					<input type="password" placeholder="Mot de passe" name="password" value="<?= (!empty($_POST['password'])) ? $_POST['password'] : '' ;?>"/>
					<p class="error"><?= (!empty($error['password'])) ? $error['password'] : '' ;?></p>
				</div>

				<div class="col-sm-12 col-xs-12">	
					<label for="passwordConfirm">Confirmation du mot de passe</label>
					<input type="password" placeholder="Confirmation du mot de passe" name="passwordConfirm" value="<?= (!empty($_POST['passwordConfirm'])) ? $_POST['passwordConfirm'] : '' ;?>"/>
					<p class="error"><?= (!empty($error['passwordConfirm'])) ? $error['passwordConfirm'] : '' ;?></p>
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="lastname">Nom</label>
					<input type="text" placeholder="Nom" name="lastname" value="<?= (!empty($_POST['lastname'])) ? $_POST['lastname'] : '' ;?>" />
					<p class="error"><?= (!empty($error['lastname'])) ? $error['lastname'] : '' ;?></p>
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="firstname">Prénom</label>
					<input type="text" placeholder="Prénom" name="firstname" value="<?= (!empty($_POST['firstname'])) ? $_POST['firstname'] : '' ;?>"/>
					<p class="error"><?= (!empty($error['firstname'])) ? $error['firstname'] : '' ;?></p>
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="birthyear">Année de naissance</label>
					<input type="date" placeholder="Année de naissance" name="birthyear" value="<?= (!empty($_POST['birthyear'])) ? $_POST['birthyear'] : '' ;?>"/>
					<p class="error"><?= (!empty($error['birthyear'])) ? $error['birthyear'] : '' ;?></p>
				</div>
				
				<div class="col-sm-12 col-xs-12">
					<div class="radio-inline">
					  <label for="sex">
					    <input type="radio" checked="checked" name="sex" id="sex" value="female">
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
					<textarea type="text" placeholder="Métier" name="job"><?= (!empty($_POST['job'])) ? $_POST['job'] : '' ;?></textarea>
					<p class="error"><?= (!empty($error['job'])) ? $error['job'] : '' ;?></p>
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="instructorDescription">Description en tant que formateur</label>
					<textarea id ="description" type="text" placeholder="Description en tant que formateur ..." name="instructorDescription"><?= (!empty($_POST['instructorDescription'])) ? $_POST['instructorDescription'] : '' ;?></textarea>
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="studentDescription">Description en tant qu'étudiant</label>
					<textarea id ="description" type="text" placeholder="Description en tant qu'étudiant ..." name="studentDescription"><?= (!empty($_POST['studentDescription'])) ? $_POST['studentDescription'] : '' ;?></textarea>
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="image">Choisir une image de profil</label>
					<input type="file" id="image" name="image" placeholder="Votre profil" accept="image/*">
                    <div id="image_preview">
                        <div class="thumbnail">
                            <img src="<?= (!empty($error['image'])) ? $this->assetUrl($error['image']) : '' ;?>" alt="">
                        </div>
                    </div>					
				</div>
			</div>
		</fieldset>

		<fieldset>
				<button type="submit" class="btn btn-info">Je m'inscris !</button>
		</fieldset>

	</form>
<?php $this->stop('main_content') ?>

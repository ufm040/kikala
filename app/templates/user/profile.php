<?php $this->layout('layout', ['title' => 'Mon profil']) ?>

<?php $this->start('main_content') ?>
	<h2>Mon profil</h2>

	<form id="profileform" method="POST" novalidate enctype="multipart/form-data">
		<fieldset>
			<div class="row">
				<div class="col-sm-12 col-xs-12">	
					<label for="username">Pseudo</label>
					<input type="text" placeholder="pseudo" name="username"  value="<?= (!empty($_POST['username'])) ? $_POST['username'] : '' ;?>"/>
					<p class="error"><?= (!empty($error['username'])) ? $error['username'] : '' ;?></p>
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
					<p class="error"><?= (!empty($error['birthday'])) ? $error['birthday'] : '' ;?></p>
				</div>

				<div class="col-sm-12 col-xs-12">
					<div class="radio-inline">
						<input type="radio" <?php if ($_POST['sex']== 'F') { echo 'checked' ; }?> name="sex" id="sexFemale" value="F">
						<label for="sexFemale">		   
							Je suis une femme
						</label>
					</div>
					<div class="radio-inline">
						<input type="radio" name="sex" <?php if ($_POST['sex']== 'M') {echo 'checked'; } ?> id="sexMale" value="H">
						<label for="sexMale">		    
							Je suis un homme
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
					<p class="error"><?= (!empty($error['instructorDescription'])) ? $error['instructorDescription'] : '' ;?></p>
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="studentDescription">Description en tant qu'étudiant</label>
					<textarea id ="description" type="text" placeholder="Description en tant qu'étudiant ..." name="studentDescription"><?= (!empty($_POST['studentDescription'])) ? $_POST['studentDescription'] : '' ;?></textarea>
					<p class="error"><?= (!empty($error['studentDescription'])) ? $error['studentDescription'] : '' ;?></p>
				</div>

				<div class="col-sm-12 col-xs-12">		
					<label for="image">Choisir une image de profil</label>
					<input type="file" id="image" name="image" placeholder="Votre profil" accept="image/*">
                    <div id="image_preview">
                        <div class="loadimage">
                            <img src="<?= (!empty($error['image'])) ? $this->assetUrl('img/users/'.$error['image']) : '' ;?>" alt="">
                        </div>
                    </div>					
				</div>
			</div>
		</fieldset>

		<fieldset>
				<button type="submit" class="btn btn-info">Je modifie mon profil !</button>
		</fieldset>

	</form>
<?php $this->stop('main_content') ?>

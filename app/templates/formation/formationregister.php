<?php $this->layout('layout', ['title' => 'Création formation']) ?>

<?php $this->start('main_content') ?>
	<h2>Propose ta formation !</h2>

	<!-- Formulaire d'inscription-->
	<form id="formationform" method="POST" novalidate enctype="multipart/form-data">
		  	<fieldset>
	    		<legend>Description</legend>
	    		<div class="row">
	    			<div class="col-sm-6 col-xs-6">
		    			<label for="title">Titre</label>
		    			<input type="text" name="title" id="title" placeholder="Titre de la formation" value="<?= (!empty($_POST['title'])) ? $_POST['title'] : '' ;?>">
		    			<p class="error"><?= (!empty($error['title'])) ? $error['title'] : '' ;?></p>
		    		</div>	

		    		<div class="col-sm-6 col-xs-6">	
		    			<label for="image">Une image représentant la formation</label>
		    			<input type="file" name="image" id="image" placeholder="image" accept="image/*">
                        <div id="image_preview">
                            <div class="thumbnail">
                                <img src="<?= (!empty($error['image'])) ? $this->assetUrl($error['image']) : '' ;?>" alt="">
                            </div>
                        </div>
		    		</div>
		    		<div class="col-sm-6 col-xs-6">	
		    			<label for="description">Description</label>
		    			<textarea id="description" name="description" placeholder="Description de la formation ..."><?= (!empty($_POST['description'])) ? $_POST['description'] : '' ;?></textarea>
		    			<p class="error"><?= (!empty($error['description'])) ? $error['description'] : '' ;?></p>
		    		</div>		    			
	    		</div>
			</fieldset>

		  	<fieldset>
	    		<legend>Informations pratiques</legend>
    			<div class="row">			
	    			<div class="col-sm-4 col-xs-4">
			    		<label for="dateform">Date de la formation</label>
			    		<input class="form-control" type="text" id="dateform" name="dateform" placeholder ="jj/mm/aaaa" value="<?= (!empty($_POST['dateform'])) ? $_POST['dateform'] : '' ;?>"/>
			    		<p class="error"><?= (!empty($error['dateform'])) ? $error['dateform'] : '' ;?></p>
		    		</div>
		    		<div class="col-sm-4 col-xs-4">
						<label for="duration">Durée de la formation</label>
						<input id="duration" type="time" name="duration" placeholder="Durée" value="<?= (!empty($_POST['duration'])) ? $_POST['duration'] : '' ;?>">
						<p class="error"><?= (!empty($error['duration'])) ? $error['duration'] : '' ;?></p>
					</div>
					<div class="col-sm-4 col-xs-4">
						<label for="nbrplace">Nombre de place</label>	
						<input id="nbrplace" type="number" value="<?= (!empty($_POST['nbrplace'])) ? $_POST['nbrplace'] : '1' ;?>" min="1" max="30" name="nbrplace" placeholder="nombre de places">
					</div>
				</div>
			</fieldset>	

			<fieldset>
			    <legend>Adresse de la formation</legend>

			    <div class="row">
			    	<div class="col-sm-6 col-xs-6">
				    	<label for="address">Adresse</label>
				    	<textarea id="address" name="address" placeholder="Lieu de la formation" rows=5 required></textarea>
				    </div>	
				    <div class="col-sm-6 col-xs-6">
				    	<label for="codepostal">Code postal</label>
				    	<input id="codepostal" name="codepostal" placeholder="Code postal" type="text" required>

				    	<label for="city">Ville</label>
				    	<input id="city" name="city" placeholder="Ville" type="text" required>			    

				    	<label for="country">Pays</label>
				    	<input id="country" name="country" type="text" required placeholder="France">
				    </div>	
			    </div>

			</fieldset>
			
			<fieldset>
				<button type="submit" class="btn btn-info">Je propose !</button>
			</fieldset>	
	</form>


<?php $this->stop('main_content') ?>

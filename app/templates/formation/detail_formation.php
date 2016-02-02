<?php $this->layout('layout', ['title' => 'Formation']) ?>

<?php $this->start('main_content') ?>

	<h2>Détail de la formation : <?php echo $formation['title']?></h2>
	<div id="formationdetail">
		<fieldset>
			<div class="row">
				<div class="col-sm-6 col-xs-6">
					<img src="<?= $this->assetUrl('img/formations/src/'.$formation['image']) ?>">
				</div>
				<div class="col-sm-6 col-xs-6">
					<p><strong>Description : </strong><?= $this->e($formation['description'])?></p>
					<p><strong>Date de la formation : </strong><?= $formation['dateFormation'] ?></p>
					<p><strong>Durée de la formation : </strong><?= $formation['duration'] ?></p>
					<p><strong>Adresse de la formation : </strong><?= $formation['address'] ?></p>
					<p><strong>Code postal : </strong></p>
					<p><strong>Ville : </strong><?= $formation['city'] ?></p>
					<p><strong>Pays : </strong><?= $formation['country'] ?></p>
					<p><strong>Nombre de places restantes : </strong><?= $nbrPlace ?></p>
					<p>Formation donnée par <a href="<?= $this->url('detail_kikologue',['username'=>$kikologue['username']])?>"><?= $kikologue['username'] ?></a> </p>

					<?php if ($kikos) :?>
						<form action="<?= $this->url('inscription_formation')?>" method="POST" id="inscription-form">
							<input type="hidden" name="formation-id" value="<?= $formation['id']?>">
							<?php  if ($register) :?>
								<input type="hidden" name="register"  id="register" value="0">
								<button class="managebutton btn btn-info" type="submit">J'annule mon inscription !</button>
							<?php else :?>
								<input type="hidden" name="register"  id="register" value="1">
								<button class="managebutton btn btn-info" type="submit">Je m'inscris à cette formation !</button>
							<?php endif ?>	
						</form>
						<div id="response-inscription"></div>
					<?php endif ?>	
				</div>
			</div>
		</fieldset>
	</div>

<?php $this->stop('main_content') ?>

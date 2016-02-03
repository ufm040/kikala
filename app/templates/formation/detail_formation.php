<?php $this->layout('layout', ['title' => 'Formation']) ?>

<?php $this->start('main_content') ?>

	<h2>Détail de la formation : <?php echo $formation['title']?></h2>
	<div id="formationdetail">
		<fieldset>
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
					<img src="<?= $this->assetUrl('img/formations/src/'.$formation['image']) ?>">
				</div>
				<div class="col-md-8 col-sm-6 col-xs-12">
					<dl class="dl-horizontal">
						<dt>Description</dt>
						<dd><?= $this->e($formation['description'])?></dd>
						<dt>Date de la formation</dt>
						<dd><?= $formation['dateFormation'] ?></dd>
						<dt>Durée</dt>
						<dd><?= $formation['duration'] ?></dd>
						<dt>Adresse</dt>
						<dd><?= $formation['address'] ?></dd>
						<dt>Code postal</dt>
						<dd><?= $formation['zip'] ?></dd>
						<dt>Ville</dt>
						<dd><?= $formation['city'] ?></dd>
						<dt>Pays</dt>
						<dd><?= $formation['country'] ?></dd>
						<dt>Nombre de places restantes</dt>
						<dd><?= $nbrPlace ?></dd>
						<dt>Formation donnée par</dt>
						<dd><a href="<?= $this->url('detail_kikologue',['username'=>$kikologue['username'],'slug'=>1])?>"><?= $kikologue['username'] ?></a> </dd>
					</dl>
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

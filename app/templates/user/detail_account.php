<?php $this->layout('layout', ['title' => 'Mon compte']) ?>

<?php $this->start('main_content') ?>
	<h2>Compte de <?= $user['lastname']?> <?= $user['firstname']?></h2>
	<div id="accountdetail">
		<div class="row">
			<div class="col-sm-4 col-xs-6">	
				<p><strong>Mon pseudo : </strong><?= $user['username']?></p>
				<img src="<?= $this->assetUrl('img/users/' .$user['image'])?>" alt="Image de profil">
				<p><a href="">Je modifie mon profil</a></p>
			</div>
			<div class="col-sm-8 col-xs-6">
				<p><strong>Mon email : </strong><?= $user['email'] ?></p>
				<p><strong>Je suis <?= $user['sex'] ?></strong></p>
				<p><strong>Mon métier : </strong><?= $user['job'] ?></p>
				<p><strong>Ma description en tant que formateur : </strong><?= $user['instructorDescription'] ?></p>
				<p><strong>Ma description en tant qu'étudiant : </strong><?= $user['studentDescription'] ?></p><br />
				<?php if ($w_user['credit']>0) : ?>
					<p>J'ai <?= $w_user['credit'] ;?> kiko<?= ($w_user['credit']>1) ? 's ' :' ' ;?>!</p>
				<?php else : ?>	
					<p>Je n'ai plus de kikos ... <i class="fa fa-frown-o"></i></p>	
				<?php endif ?>
				<p><a href="<?= $this->url('formationregister')?>" title="Créer une formation">Je crée une formation</a></p>
				<div class="accountbutton">
					<a href="<?= $this->url('inscription_formation') ?>" title="Mes formations">Mes formations</a>
					<a href="<?= $this->url('profile') ?>">Mes inscriptions</a>	
				</div>		
			</div>
		</div>
	</div>
				
<?php $this->stop('main_content') ?>
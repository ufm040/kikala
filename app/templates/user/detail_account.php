<?php $this->layout('layout', ['title' => 'Mon compte']) ?>

<?php $this->start('main_content') ?>
	<h2><?= $user['lastname']?> <?= $user['firstname']?></h2>
	<div id="accountdetail">
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12">	
				<img src="<?= $this->assetUrl('img/users/' .$user['image'])?>" alt="Image de profil">
				<p><a href="<?= $this->url('profile') ?>">Je modifie mon profil</a></p>
			</div>
			<div class="col-md-8 col-sm-6 col-xs-12">
				<dl class="dl-horizontal">
					<dt>Mon pseudo</dt>
					<dd><?= $user['username']?></dd>
					<dt>Mon email </dt>
					<dd><?= $user['email'] ?></dd>
					<dt>Je suis </dt>
					<dd><?= $user['sex'] ?></dd>
					<dt>Mon métier </dt>
					<dd><?= $user['job'] ?></dd>
					<dt>Je forme :  </dt>
					<dd><?= $user['instructorDescription'] ?></dd>
					<dt>J'étudie : </dt>
					<dd><?= $user['studentDescription'] ?></dd>
				</dl>
				<div class="visuel complete">	
					<?php if ($w_user['credit']>0) : ?>
						<p>J'ai <?= $w_user['credit'] ;?> kiko<?= ($w_user['credit']>1) ? 's ' :' ' ;?>!</p>
					<?php else : ?>	
						<p>0 kiko ! <i class="fa fa-frown-o"></i></p>	
					<?php endif ?>
				</div>				

				<p><a href="<?= $this->url('formationregister')?>" title="Créer une formation">Je crée une formation</a></p>
				<div class="accountbutton">
					<a href="<?= $this->url('inscription_formation') ?>" title="Mes formations">Mes formations</a>
					<a href="<?= $this->url('profile') ?>">Mes inscriptions</a>	
				</div>
						
			</div>
		</div>
	</div>
				
<?php $this->stop('main_content') ?>
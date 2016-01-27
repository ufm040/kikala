<?php $this->layout('layout', ['title' => 'Mon compte']) ?>

<?php $this->start('main_content') ?>
	<h2>Compte de <?= $user['lastname']?> <?= $user['firstname']?></h2>
	
			<div class="row">
				<div class="col-sm-6 col-xs-6">	
					<p>Votre pseudo : <?= $user['username']?> </p>
				</div>
				<div class="col-sm-6 col-xs-6">	
					<img src="<?='img/users/' .$user['image']?>" alt="votre profil"> 
				</div>				
				
<?php $this->stop('main_content') ?>

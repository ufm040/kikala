<?php $this->layout('layout', ['title' => 'Formation']) ?>

<?php $this->start('main_content') ?>

	<h2>Détail de la formation <?php echo $formation['title']?></h2>


	<p><?= $formation['description']?> </p>
	<img src="<?= $this->assetUrl('img/formations/src/'.$formation['image']) ?>">
	<p></p>

	<?php if ($kikos) :?>
		<form action="<?= $this->url('inscription_formation')?>" method="POST" id="inscription-form">
			<input type="hidden" name="formation-id" value="<?= $formation['id']?>">
			<?php  if ($register) :?>
				<input type="hidden" name="register"  id="register" value="0">
				<button class="managebutton" type="submit">Annuler Inscription !</button>
			<?php else :?>
				<input type="hidden" name="register"  id="register" value="1">
				<button class="managebutton" type="submit">S'inscrire !</button>
			<?php endif ?>	
		</form>
		<div id="response-inscription"></div>
	<?php endif ?>	

<?php $this->stop('main_content') ?>


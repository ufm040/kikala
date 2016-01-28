<?php $this->layout('layout', ['title' => 'Formation']) ?>

<?php $this->start('main_content') ?>

	<h2>Détail de la formation <?php echo $formation['title']?></h2>


	<p><?= $formation['description']?> </p>
	<img src="<?= $this->assetUrl('img/formations/src/'.$formation['image']) ?>">
	<p></p>

<?php $this->stop('main_content') ?>


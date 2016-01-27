<?php $this->layout('layout', ['title' => 'Formation']) ?>

<?php $this->start('main_content') ?>

	<h2>Détail de la formation <?php echo $formation['title']?></h2>


	<p><?php echo $formation['description']?> </p>

	<img src="assets/formations/<?php echo $formation['image']?>">

<?php $this->stop('main_content') ?>


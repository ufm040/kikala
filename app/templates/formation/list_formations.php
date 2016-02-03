<?php $this->layout('layout', ['title' => 'Liste des formations']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des Formations</h2>

	<section class="kik-list row container-fluid">
		<?php foreach($formations as $formation) : ?>
		<article class="kik col-xs-12 col-sm-6 col-md-3">
			<a class="thumbnail" href="<?= $this->url('detail_formation', ['id' =>$formation['id']]) ?>" title="Voir le détail de la formation">
				<img src="<?= $this->assetUrl('img/formations/thumbnail/'.$formation['image']) ?>" alt="<?= $formation['title'] ?>" class="img-thumbnail">
				<h3><?= $formation['title'] ?></h3>
				<dl class="dl-horizontal">
					<dt>Quand</dt>
					<dd><?= $formation['dateFormation'] ?></dd>
					<dt>Durée</dt>
					<dd><?= $formation['duration'] ?></dd>
					<dt>Lieu</dt>
					<dd><?= $formation['city'] ?></dd>
					<dt>Créée le</dt>
					<dd><?= $formation['dateCreated'] ?></dd>
				</dl>
				<?php if ($formation['news']) : ?>
					<div class="visuel news">
						<p>Nouvelle</p>
					</div>	
				<?php elseif ($formation['msg']) : ?>
					<div class="visuel <?= $formation['msg'] ?>"
						<p><?= ($formation['msg'] == 'not-delay') ? 'Ne tardez pas' : 'Complète' ?></p>
					</div>	
				<?php endif; ?>	
				
			</a>
		</article>
		<?php endforeach; ?>		
	</section>
	<div class="clearfix">
	<?php if ($prec > 0) : ?>
		<a class="button-list" id="button-prev" href="<?= $this->url('list_formations',["username"=>'all',"slug"=>$prec]) ?>"><i class="fa fa-angle-double-left fa-2x"></i></a>
	<?php endif ;
	if ($next) : ?>
		<a class="button-list" id="button-next" href="<?= $this->url('list_formations',["username"=>'all',"slug"=>$next]) ?>"><i class="fa fa-angle-double-right fa-2x"></i></a>
	<?php endif ; ?>
	</div>		
	

<?php $this->stop('main_content') ?>


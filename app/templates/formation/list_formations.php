<?php $this->layout('layout', ['title' => 'Liste des formations']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des Formations</h2>

	<div class="table-responsive">
		<table class="table table-condensed">
			<tbody>
				<?php foreach($formations as $formation) : ?>
				<tr>
					<td><img src="<?= $this->assetUrl('img/formations/thumbnail/'.$formation['image']) ?>" alt="Image représentant la formation" class="img-thumbnail"></td>
					<td><strong><?= $formation['title'] ?></strong></td>
					<td><strong>Quand : </strong><?= $formation['dateFormation'] ?></td>
					<td><strong>Durée : </strong><?= $formation['duration'] ?></td>
					<td><strong>Lieu : </strong><?= $formation['city'] ?></td>
					<td><strong>Créé le : </strong><?= $formation['dateCreated'] ?></td>
					<td><a href="<?= $this->url('detail_formation', ['id' =>$formation['id']]) ?>" title="Voir le détail de la formation">Voir le détail de la formation</a></td>			
					<td class="visuel">
						<?php if ($formation['news']) : ?>
							<i> Nouvelle Formation </i>
						<?php elseif ($formation['msg']) : ?>
							<i> <?= $formation['msg'] ?>
						<?php endif; ?>	
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>		
		</table>
		<div class="clearfix">
		<?php if ($prec > 0) : ?>
			<a class="button-list" id="button-prev" href="<?= $this->url('list_formations',["username"=>'all',"slug"=>$prec]) ?>"><i class="fa fa-angle-double-left fa-2x"></i></a>
		<?php endif ;
		if ($next) : ?>
			<a class="button-list" id="button-next" href="<?= $this->url('list_formations',["username"=>'all',"slug"=>$next]) ?>"><i class="fa fa-angle-double-right fa-2x"></i></a>
		<?php endif ; ?>
		</div>		
	</div>
	

<?php $this->stop('main_content') ?>


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
				</tr>
				<?php endforeach; ?>
			</tbody>		
		</table>
	</div>	


<?php $this->stop('main_content') ?>


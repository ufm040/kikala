<?php $this->layout('layout', ['title' => 'Formations']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des Formations</h2>

	<div class="table-responsive">
		<table class="table table-condensed">
			<thead>
				<tr>
					<td>Titre</td>
					<td>Date</td>
					<td>Créé le</td>
					<td>Lieu</td>
					<td>Durée</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($formations as $formation) : ?>
				<tr>
					<td><?= $formation['title'] ?></td>
					<td><?= $formation['dateFormation'] ?></td>
					<td><?= $formation['dateCreated'] ?></td>
					<td><?= $formation['city'] ?></td>
					<td><?= $formation['duration'] ?></td>	
					<td><a href="<?= $this->url('detail_formation', ['id' =>$formation['id']]) ?>" title="Voir le détail">Voir</a></td>			
				</tr>
				<?php endforeach; ?>
			</tbody>		
		</table>
	</div>	


<?php $this->stop('main_content') ?>


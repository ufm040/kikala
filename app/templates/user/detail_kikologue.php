<?php $this->layout('layout', ['title' => 'Kikologue']) ?>

<?php $this->start('main_content') ?>
	
	
			<div class="row">
				<div class="col-sm-6 col-xs-6">	
					<img src="<?= $this->assetUrl('img/users/'.$kikologue['image']) ?>" alt="Photo de profil"> 
				</div>			
				<div class="col-sm-6 col-xs-6">	
					<h3><?= $kikologue['lastname']?> <?= $kikologue['firstname']?></h3>
					<p><?= $kikologue['username']?> </p>
				</div>
			</div>	
			<div class="row">
				<table class="table table-condensed">
					<thead>
						<tr>
							<td>Titre</td>
							<td>Date</td>
							<td>Lieu</td>
							<td>Durée</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($formations as $formation) : ?>
						<tr>
							<td><?= $formation['title'] ?></td>
							<td><?= $formation['dateFormation'] ?></td>
							<td><?= $formation['city'] ?></td>
							<td><?= $formation['duration'] ?></td>		
						</tr>
						<?php endforeach; ?>
					</tbody>		
				</table>					
				
			</div>			
				
<?php $this->stop('main_content') ?>

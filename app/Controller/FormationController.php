<?php

namespace Controller;

use \W\Controller\Controller;

class FormationController extends Controller
{

	/**
	 * Page Lsite des formations
	 */	


	public function listFormations(){

		$formationManager = new \Manager\FormationManager();

		$formations = $formationManager->findAll();

		$this->show('formation/list_formations',[
			"formations" => $formations
		]);		

	}

	/**
	 * Page Inscription d'une formation
	 */
	public function formationregister()
	{


		$error = [];
		if ($_POST) {
			$title = $_POST['title'];
			$description= $_POST['description'];
			$dateform = $_POST['dateform'];
			$duration = $_POST['duration'];
			$nbrplace = $_POST['nbrplace'];
			$address = $_POST['address'];
			$zip = $_POST['codepostal'];
			$city = $_POST['city'];
			$country = $_POST['country'];

			$isValid = true;
			if($_FILES['image']['size']!= 0) {
				$file_info = finfo_open(FILEINFO_MIME_TYPE);
				$infos = finfo_file($file_info, $_FILES['image']['tmp_name']);

				finfo_close($file_info);

				var_dump($infos);

				if ($_FILES['image']['error'] ) {
					$error['image'] = "Erreur dans le téléchargement du fichier" ;
					$isValid = false;
				}
				elseif ( !in_array($infos, ['image/jpg', 'image/jpeg', 'image/gif','image/png']) ) {
					$error['image'] = "Extension non authorisée pour le fichier " ;
					$isValid = false;				
				} else {
					$tmp_name = $_FILES['image']['tmp_name'];
					$target = 'assets/img/formations/' . uniqid() . '.' . $_FILES['image']['name'];
					move_uploaded_file($tmp_name, $target);	
				}	
			}		
			$newformation = new \Manager\FormationManager();

			$date = \DateTime::createFromFormat('j/m/Y', $dateform);

			if	($isValid) {
					// on insère en base de données

				// 2 - on appelle la méthode insert
				$newformation->insert([
					"title" => $title ,
					"dateFormation" =>$date->format('Y-m-d H:i:s'),
					"duration" => $duration,
					"userId" => 1,
					"dateCreated" => date("Y-m-d H:i:s"),
					"description" =>$description,
					"image" => $target,
					"totalNumberPlace" => $nbrplace,
					"address" => $address,
					"zip" => $zip,
					"city" => $city,
					"country" => $country
				]);
				// on redirige l'utilisateur vers la page
				$this->redirectToRoute("home");
			}			

		}

		$this->show('formation/formationregister');
	}

}
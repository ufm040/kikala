<?php

namespace Controller;

use \W\Controller\Controller;

class FormationController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function formationregister()
	{

		var_dump($_POST);

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

			$extensions = explode('.', $_FILES['image']['name']);
			var_dump($extensions);
			$extension = end($extensions);

			if ($_FILES['image']['error'] ) {
				$error['image'] = "Erreur dans le téléchargement du fichier $key\n" ;
				$isValid = false;
			}
			elseif ( !in_array($extension, ['jpg', 'jpeg', 'gif','png']) ) {
				$error['image'] = "Extension non authorisée pour le fichier " ;
				$isValid = false;				
			} else {
				$tmp_name = $_FILES['image']['tmp_name'];
				$target = 'assets/img/formations/' . uniqid() . '.' . $_FILES['image']['name'];
				move_uploaded_file($tmp_name, $target);	
			}			
 
			$newformation = new \Manager\FormationManager();

			if	($isValid) {
				// on insère en base de données

				// 2 - on appelle la méthode insert
				$newformation->insert([
					"title" => $title ,
					"dateFormation" => $dateform,
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
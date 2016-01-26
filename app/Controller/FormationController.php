<?php

namespace Controller;

use \W\Controller\Controller;

class FormationController extends Controller
{

<<<<<<< HEAD
	/**
	 * Page Lsite des formations
=======

	/**
	 * Page Détail d'une formation
	 */	


	public function detailFormation($id){

		$formationManager = new \Manager\FormationManager();

		$formation = $formationManager->find($id);

		$this->show('formation/detail_formation',[
			"formation" => $formation
		]);		

	}	

	/**
	 * Page Liste des formations
>>>>>>> dev
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

<<<<<<< HEAD

		$error = [];
=======
		var_dump($_SESSION);
		$error = array() ;
>>>>>>> dev
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
<<<<<<< HEAD
=======

			// Contrôle des champs obligatoires sur la formation
			$validator = new \Utils\FormationValidator();

			$validator->validateNotEmpty($title,"title","Saisissez un titre !");	 
			$validator->validateNotEmpty($description,"description","Saisissez une description !");	 
			$validator->validateNotEmpty($dateform,"dateform","Saisissez une date !");	 
			$validator->validateNotEmpty($duration,"duration","Saisissez une durée !");	 
			$validator->validateNotEmpty($nbrplace,"nbrplace","Saisissez un nombre de place !");

			if ( !$validator->isValid()) {
				$error = $validator ->getErrors();
				$isValid = false;		
			}
	 
>>>>>>> dev
			if($_FILES['image']['size']!= 0) {
				$file_info = finfo_open(FILEINFO_MIME_TYPE);
				$infos = finfo_file($file_info, $_FILES['image']['tmp_name']);

				finfo_close($file_info);

<<<<<<< HEAD
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
=======
				if ($_FILES['image']['error'] ) {
					$error = array('image'=> "Erreur dans le téléchargement du fichier" );
					$isValid = false;
				}
				elseif ( !in_array($infos, ['image/jpg', 'image/jpeg', 'image/gif','image/png']) ) {
					$error = array('image'=> "Extension non authorisée pour le fichier ") ;
					$isValid = false;				
				} else {
					$tmp_name = $_FILES['image']['tmp_name'];
					$ext = substr($infos, 6);

					$file_name = uniqid(). '.' .$ext;  ;
					$target = 'assets/img/formations/src/' . $file_name;
					move_uploaded_file($tmp_name, $target);	

					// fait la réduction au format thumbnail
					$img = new \abeautifulsite\SimpleImage($target);
					$img->fit_to_width(300);
					$img->save();
					$img->thumbnail(100, 75);
					$img->save('assets/img/formations/thumbnail/' . $file_name);
					$error['image'] = 'img/formations/src/' . $file_name;
					$_SESSION['image_formation'] = $file_name;
				}	
			}

>>>>>>> dev
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
<<<<<<< HEAD
					"image" => $target,
=======
					"image" => $file_name,
>>>>>>> dev
					"totalNumberPlace" => $nbrplace,
					"address" => $address,
					"zip" => $zip,
					"city" => $city,
					"country" => $country
				]);
<<<<<<< HEAD
				// on redirige l'utilisateur vers la page
				$this->redirectToRoute("home");
=======

				// on redirige l'utilisateur vers la page
				$this->redirectToRoute("detail_formation");
>>>>>>> dev
			}			

		}

<<<<<<< HEAD
		$this->show('formation/formationregister');
=======
		$this->show('formation/formationregister' ,  ['error' => $error]);
>>>>>>> dev
	}

}
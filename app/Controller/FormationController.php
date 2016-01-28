<?php

namespace Controller;

use \W\Controller\Controller;

class FormationController extends Controller
{


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
		$error = array() ;

		// si l'utilisateur n'est pas connecté => on redirige vers la page de connexion 
		$authentificationManager = new \W\Security\AuthentificationManager;

		if (! $authentificationManager->getLoggedUser()) {
			$this->show('user/login');	
		} else {
			$loggedUser = $this->getUser(); 
		}


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

			// Contrôle des champs obligatoires sur la formation
			$validator = new \Utils\FormValidator();

			$validator->validateNotEmpty($title,"title","Saisissez un titre !");	 
			$validator->validateNotEmpty($description,"description","Saisissez une description !");	 
			$validator->validateNotEmpty($dateform,"dateform","Saisissez une date !");	 
			$validator->validateNotEmpty($duration,"duration","Saisissez une durée !");	 
			$validator->validateNotEmpty($nbrplace,"nbrplace","Saisissez un nombre de place !");

			if ( !$validator->isValid()) {
				$error = $validator ->getErrors();
				$isValid = false;		
			}

			if($_FILES['image']['size']!= 0) {
				$file = new \Utils\ImageUpload($_FILES['image'] ,'assets/img/formations/src/');
				$file->uploadFile();

				if (!$file->isValid()) {
					$isValid = false;
					$error['image'] =  $file->getErrors() ;	
				} else {
					// transforme le fichier au bon format
					$file->reduceImage('assets/img/formations/thumbnail/');
					$error['image'] = 'img/formations/src/' . $file->getFileName();
					$_SESSION['image_formation'] = $file->getFileName();
				}
			}


			if	($isValid) {

				$newformation = new \Manager\FormationManager();
				$date = \DateTime::createFromFormat('j/m/Y', $dateform);
				$title = $validator->convertSpecialCaractere($title);
				$description = $validator->convertSpecialCaractere($description);
				if ($_SESSION['image_formation']) {
					$file_name = $_SESSION['image_formation']; 
				} else {
					$file_name = ''	;
				} 

				// 2 - on appelle la méthode insert
				$newformation->insert([
					"title" => $title ,
					"dateFormation" =>$date->format('Y-m-d H:i:s'),
					"duration" => $duration,
					"userId" => $loggedUser['id'],
					"dateCreated" => date("Y-m-d H:i:s"),
					"description" =>$description,
					"image" => $file_name,
					"totalNumberPlace" => $nbrplace,
					"address" => $address,
					"zip" => $zip,
					"city" => $city,
					"country" => $country
				]);

				unset($_SESSION['image_formation']);
				$id = $newformation->lastInsertFormation()['id'];


				// on redirige l'utilisateur vers la page
				$this->redirectToRoute("detail_formation",['id'=>$id]);
			}			
		}
		$this->show('formation/formationregister' ,  ['error' => $error]);
	}

}
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

		// $register : permet de contrôler si l'utilisateur peut s'inscrire à la formation
		// $kikos : permet de contrôler si l'utilisateur a suffisemment de kikos pour s'inscrire
		$kikos = false; 
		$register = false;
		$authentificationManager = new \W\Security\AuthentificationManager;
		$inscription = new \Manager\InscriptionManager();	

		if ($authentificationManager->getLoggedUser()) {
			$loggedUser = $this->getUser();

			// utilisateur est-il déjà inscrit à la formation ?
			$register = $inscription->checkInscription($id, $loggedUser['id']);
			$kikos = true;
			// contrôle si assez de kikos pour s'inscrire à une formation
			if ( ! $register) {
				if ($loggedUser['credit'] ==  0) {
					$kikos = false ;
				}	
			}
		}

		// Récupère le nombre d'inscrit à la formation
		$nbrInscrit = $inscription->countInscription($id);		

		// récupération des données du formateur

		$kikoUser = new \Manager\UserManager();

		$kikologue = $kikoUser->find($formation['userId']);

		$date = \DateTime::createFromFormat('Y-m-d H:i:s',$formation['dateCreated']); 
		$formation['dateCreated'] = $date->format('j/m/Y');
		$date = \DateTime::createFromFormat('Y-m-d H:i:s',$formation['dateFormation']); 
		$formation['dateFormation'] = $date->format('j/m/Y');

		$duration = explode(":",$formation['duration']);
		$formation['duration'] = $duration[0].'h'.$duration[1] .'min';
		if ($formation['image'] == '') {
			$formation['image'] = 'defaultformation.png';	
		}		

		$this->show('formation/detail_formation',[
			"formation" => $formation,
			"register" =>$register,
			"kikos" => $kikos,
			"nbrPlace" => $formation['totalNumberPlace'] - $nbrInscrit,
			"kikologue" => $kikologue
		]);		

	}	

	/**
	 * Page Liste des formations
	 */	


	public function listFormations($userName,$slug,$toShow = false){
		
		$formationManager = new \Manager\FormationManager();


		if ($userName == 'all') {
			$userId = false ;
		} else {
			$userId = $this->getUser()['id'];		
		}
		$formations = $formationManager->listFormations($userId,$slug);

		// mise en forme pour affichage de la date et la durée

		foreach ($formations as $key => $value) {
			$date = \DateTime::createFromFormat('Y-m-d H:i:s',$value['dateCreated']); 
			
			if ($date->format('U') > strtotime("-2 days") ) {
				$formations[$key]['news'] = true ;	
			} else {
				$formations[$key]['news'] = false ;	
			}

			$formations[$key]['dateCreated'] = $date->format('j/m/Y');
			$date = \DateTime::createFromFormat('Y-m-d H:i:s',$value['dateFormation']); 
			$formations[$key]['dateFormation'] = $date->format('j/m/Y');	
			$duration = explode(":",$value['duration']);
			$formations[$key]['duration'] = $duration[0].'h'.$duration[1] .'min';
			if ($formations[$key]['image'] == '') {
				$formations[$key]['image'] = 'defaultformation.png';	
			}

			$inscription = new \Manager\InscriptionManager();	
			$nbrInscrit = $inscription->countInscription($formations[$key]['id']);
			if ($nbrInscrit == $formations[$key]['totalNumberPlace']) {
				$formations[$key]['msg'] = 'complete';	
			} else if ($date->format('U') - strtotime("+2 days") > (2*24*60*1000)) {
				$formations[$key]['msg'] = 'not-delay';	
			} else {
				$formations[$key]['msg'] = false;	
			}
		}

		$next = $slug +1 ;

		if (count($formations) < 5) {
			$next = false;
		}
		if (count($formations) == 5) {
			$suite = $formationManager->listFormations($userId,$slug+1);
			if ( count($suite) == 0 ) {
				$next = false;	
			} 
		}

		if ( !$toShow) {
			$this->show('formation/list_formations',[
				"formations" => $formations,
				"prec"=> $slug-1,
				"next"=>$next
			]);				
		} else {
			return $formations ;
		}
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

			$validator->validateNotEmpty($title,"title","Saisir un titre !");	 
			$validator->validateNotEmpty($description,"description","Saisir une description !");	 
			$validator->validateNotEmpty($dateform,"dateform","Saisir une date !");	 
			$validator->validateNotEmpty($duration,"duration","Saisir une durée !");	 
			$validator->validateNotEmpty($nbrplace,"nbrplace","Saisir un nombre de place !");
			$validator->validateNotEmpty($address,"address","Saisir une adresse !");
			$validator->validateNotEmpty($zip,"codepostal","Saisir un code postal !");
			$validator->validateNotEmpty($city,"city","Saisir une ville !");
			$validator->validateNotEmpty($country,"country","Saisir un pays !");

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

	public function creditKikos($token)
	{
		if ( $token == '1836456b0a97a774322v93511001' ) {
			// Va récupérer toutes les formations avec top_credit = 0
			$newformation = new \Manager\FormationManager();
			$listes = $newformation->listFormationsToCredit();

			// Pour chacun des formations récupérer :
			foreach ($listes as $key => $value) {
				// Compte le nombre d'inscrit à cette formation
				$newinscription = new \Manager\InscriptionManager();
				$nbrInscrit = $newinscription->countInscription($value['formationId']);
				// crédite le formateur de kikos = au nombre d'inscrits
				if ($nbrInscrit > 0) {
					$newuser = new \Manager\UserManager(); 	
					$newuser->manageKikos($value['userId'] , 'add' , $nbrInscrit);
				}	
				// Mise à jour du top Credit
				$newformation->update(['topCredit'=>1] ,$value['formationId'] );		
			}			
		}
		else {
			$this->showForbidden();
		}

	}
}
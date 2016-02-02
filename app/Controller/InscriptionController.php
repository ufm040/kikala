<?php


namespace Controller;

use \W\Controller\Controller;

class InscriptionController extends Controller
{
	
	/***
	*	Page liste inscriptions 
	*/

	public function listInscriptions($userName,$slug)
	{
		$userId = $this->getUser()['id'];	

		$newinscription = new \Manager\InscriptionManager();

		$liste = $newinscription->listInscriptions($userId,$slug);

		$formations = [];

		foreach ($liste as $key => $value) {
			$newformation = new \Manager\FormationManager();
			$formations[] = $newformation->find($value['formationId']);
		}

		foreach ($formations as $key => $value) {
			$date = \DateTime::createFromFormat('Y-m-d H:i:s',$value['dateFormation']); 
			$formations[$key]['dateFormation'] = $date->format('j/m/Y');
			$date = \DateTime::createFromFormat('Y-m-d H:i:s',$value['dateCreated']); 
			$formations[$key]['dateCreated'] = $date->format('j/m/Y');	
			$duration = explode(":",$value['duration']);
			$formations[$key]['duration'] = $duration[0].'h'.$duration[1] .'min';												
		}
		$next = $slug +1 ;

		if (count($formations) < 5) {
			$next = false;
		}
		if (count($formations) == 5) {
			$suite = $newinscription->listInscriptions($userId,$slug+1);
			if ( count($suite) == 0 ) {
				$next = false;	
			} 
		}		

		$this->show('inscription/list_inscriptions',[
				"formations" => $formations,
				"prec"=> $slug-1,
				"next"=>$next
			]);			

	}

	/**
	 * Page Inscription d'une formation
	 */
	public function manageInscriptions()
	{
		$message = array() ;

		// inscription à une formation

		// si l'utilisateur n'est pas connecté => Message d'erreur : il faut se connecter pour s'inscrire
		$authentificationManager = new \W\Security\AuthentificationManager;


		if (! $authentificationManager->getLoggedUser()) {
			$message = 'Merci de vous connecter pour vous inscrire à une formation';	
		} else {
			$loggedUser = $this->getUser();

			$newinscription = new \Manager\InscriptionManager();
			$newuser = new \Manager\UserManager(); 
			if ( $_POST['register'] == 1 ) {
				
				// inscription
				$insert = $newinscription->insert([					
					'userId'=>$loggedUser['id'],
					'formationId'=> $_POST['formation-id']
				]) ;
				// 
				if ($insert) {
					// Inscription : supprimer un kiko à l'user  
					$newuser->manageKikos($loggedUser['id'],'del');	
					$message = 'Vous êtes bien inscrit !';	
				}								
			} else {
				// Annulation d'une inscription				
				$del = $newinscription->cancelInscription($_POST['formation-id'] ,$loggedUser['id'] );
				if ($del) {
					// Désinscription : on ajoute un kiko à l'user  
					$newuser->manageKikos($loggedUser['id'],'add');	
					$message = 'Votre annulation a bien été pris en compte !';		
				}			
			}
			$authentificationManager->refreshUser();
		}	

		$messagesJson = json_encode($message);
		header("Content-Type: application/json");
		echo $messagesJson;
	}
}
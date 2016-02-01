<?php


namespace Controller;

use \W\Controller\Controller;

class InscriptionsController extends Controller
{
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

			$newinscription = new \Manager\InscriptionsManager();
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
			//$authentificationManager->refreshUser();
		}	

		$messagesJson = json_encode($message);
		header("Content-Type: application/json");
		echo $messagesJson;
	}
}
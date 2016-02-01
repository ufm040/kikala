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
			if ( $_POST['register'] == 1 ) {
				
				// inscription
				$newinscription->insert([					
					'userId'=>$loggedUser['id'],
					'formationId'=> $_POST['formation-id']
				]) ;
				$message = 'Vous êtes bien inscrit !';					
			} else {
				// Annulation d'une inscription				
				$newinscription->cancelInscription($_POST['formation-id'] ,$loggedUser['id'] );
				$message = 'Votre annulation a bien été pris en compte !';				
			}
		}	

		$messagesJson = json_encode($message);
		header("Content-Type: application/json");
		echo $messagesJson;
	}
}
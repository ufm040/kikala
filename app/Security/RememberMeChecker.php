<?php

namespace Security;

class RememberMeChecker
{
	public function check()
	{

		$authentificationManager = new \W\Security\AuthentificationManager();
		$loggedUser = $authentificationManager->getLoggedUser();
		//si l'utilisateur est déjà connecté...
		if ($loggedUser){
			return true;
		}

		//si on a un cookie de w_remember_me
		if (!empty($_COOKIE['kikala_remember_me'])){
			//check en base de données que les données sont les bonnes
			$cookieData = json_decode($_COOKIE['kikala_remember_me'], true);
			$userManager = new \Manager\UserManager();
			$user = $userManager->find($cookieData['id']);
		
			//si le hash du cookie verifie le hash en bdd
			if (password_verify($cookieData['token'], $user['tokenCookie'])){	
				$authentificationManager->logUserIn($user);
				return true;
			}
			else {
				//efface le cookie erroné
				setcookie('kikala_remember_me', '', 0, '/');
				return false;
			}
		}
		
		return false;
	}
}
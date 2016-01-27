<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{

	/**
	 * Page d'inscription
	 */

	public function register()
	{
		$passwordError = "";	
		// formulaire soumis ?
		if($_POST){

			if (!empty($_POST)) {
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$passwordConfirm = $_POST['passwordConfirm'];
				$lastname = $_POST['lastname'];
				$firstname = $_POST['firstname'];
				$birthyear = $_POST['birthyear'];
				//$sex = $_POST['sex'];
				$sex = 'M';
				$job = $_POST['job'];
				$instructorDescription = $_POST['instructorDescription'];
				$studentDescription = $_POST['studentDescription'];

				// validation des données => à coder
				$isValid = true;

				// 1 - on crée l'instance 
				$userManager = new \Manager\UserManager();

				//  erreur pour le mail (déjà existant)
				if ($userManager->emailExists($email)) {
					$isValid = false;
					$passwordError = 'Email déjà utlisé !';
				}

				// erreur sur le mdp
				if($password != $passwordConfirm) {
					$isValid = false;
					$passwordError = 'Les mots de passe ne correspondent pas !';
				}

				// upload du fichier 
				if($_FILES['image']['size']!= 0) {
					$file = new \Utils\ImageUpload($_FILES['image'] ,'assets/img/users/');

					$file->uploadFile();

					if (!$file->isValid()) {
						$isValid = false;
						$fileError = $file->getErrors();	
					}					
				}



				// si c'est valide 
				if	($isValid) {
					// on insère en base de données
					// 2 - on appelle la méthode insert
					$userManager->insert([
						"username" => $username,
						"email" => $email ,
						"password" => password_hash($password,PASSWORD_DEFAULT),
						"lastname" => $lastname,
						"firstname" => $firstname,
						"birthyear" => $birthyear,
						"sex" => $sex,
						"job" => $job,
						"instructorDescription" => $instructorDescription,
						"studentDescription" => $studentDescription,
						"image" => $image,
						"dateCreated" => date("Y-m-d H:i:s")
					]);
					// on redirige l'utilisateur vers la page d'accueil après la validation du formulaire
					$this->redirectToRoute("home");
				}

			} else {
				$passwordError = "Tous les champs doivent être remplis.";
			}

		} else {
			$passwordError = "Le formulaire n'a pas été correctement validé.";
		}

		// affiche la page
		$this->show('user/register',[
			"passwordError" => $passwordError
			]);
	}

	/**
	 * Page de connexion
	 */

	public function login()
	{
		// vérification de la combinaison d'email et mdp présents en bdd
		if(!empty($_POST)){
			$email = $_POST['email'];
			$password = $_POST['password'];

			$authentificationManager = new \W\Security\AuthentificationManager;
			$result = $authentificationManager->isValidLoginInfo($email, $password);
			
			// si identifiants OK
			if($result){
				// on récupère l'email en base de donnée
				$userManager = new \Manager\UserManager();	
				$user = $userManager->find($result);

				// on le connecte
				$authentificationManager->logUserIn($user);
			}

			// on redirige ensuite l'utilisateur vers la page "Mon compte : accueil"
			$this->redirectToRoute("");
		}
		// mauvais identifiant
		else {
			
		}			
		
		// affiche la page
		$this->show('user/login');
	}


	/**
	 * Page de déconnexion
	 */

	public function logout()
	{
		$userManager = new \Manager\UserManager();
		// vérification que l'utilisateur est bien connecté
		
		// affiche la page
		$this->show('user/logout');
	}

	/**
	 * Page de mot de passe oublié
	 */

	public function forgetpassword()
	{

	}

	/**
	 * Page du nouveau mot de passe
	 */

	public function newpassword()
	{
		$passwordError = "";	
		// formulaire soumis ?
		if ($_POST) {
			$password = $_POST['password'];
			$passwordConfirm = $_POST['passwordConfirm'];
			
			// validation des données => à coder
			$isValid = true;

			// 1 - on crée l'instance 
			$userManager = new \Manager\UserManager();

			if($password != $passwordConfirm) {
				$isValid = false;
				$passwordError = 'Les mots de passe ne correspondent pas !';
			}
			
			// si c'est valide 
			if	($isValid) {
				
				// on modifie le mdp en base de données
				// 2 - on appelle la méthode update (dans la doc regardez dans gestionnaires)
				$userManager->update([
					"password" => password_hash($password,PASSWORD_DEFAULT),
				]);
				// on redirige l'utilisateur vers la page "formation en cours"
				$this->redirectToRoute("");
			} 
		}

		// affiche la page
		$this->show('user/newpassword',[
			"passwordError" => $passwordError
			]);
	}
}

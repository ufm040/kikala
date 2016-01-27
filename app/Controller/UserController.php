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
				$sex = $_POST['sex'];
				$job = $_POST['job'];
				$instructorDescription = $_POST['instructorDescription'];
				$studentDescription = $_POST['studentDescription'];
				$image = $_POST['image'];

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

				// erreur pour l'upload d'image
				if ( !in_array($extension, ['jpg', 'jpeg', 'gif', 'png']) )
						die('Extension non autorisée !');

					$tmp_name = $_FILES['image']['tmp_name'];
					$newname =  uniqid() . '-' . $_FILES['image']['name'];
					$target = 'public/assets/img' . $newname;

					move_uploaded_file($tmp_name, $target); 

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
		/*$email = $_POST['email'];

		// vérifie qu'il existe
		$userManager = new \Manager\UserManager();
		$user = $userManager->getUserByUsernameOrEmail($email);

		if($user){

			// phpMailer
			$token = \W\Security\StringUtils::randomString(32);

			$userManager->update([
				'token' => $token,
				'dateModified'=> date("Y-m-d H:i:s")
				], $user['id']);
			$resetLink = $this->generateUrl('newpassword', [
				'token' => $token,
				'email' => $email
				], true);

			// envoie du resetLink
		}*/

		$this->show('user/forgetpassword');
	}

	/**
	 * Page du nouveau mot de passe
	 */

	public function newpassword($token, $email)
	{
		/* 
		$userManager = new \Manager\UserManager();
		$user = $userManager->getUserByUsernameOrEmail($email);
		if($user['token'] == $token){
			// affiche le formulaire */
			$this->show('user/newpassword');
		
	}
}

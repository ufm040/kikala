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
		$error = array() ;	
		// formulaire soumis ?
		if($_POST){
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

			// validation des données => à coder
			$isValid = true;

			// Contrôle des champs obligatoires sur la formation
			$validator = new \Utils\FormValidator();

			$validator->validateNotEmpty($username,"username","Le pseudo est obligatoire !");	 
			$validator->validateNotEmpty($email,"email","L'email est obligatoire !");	 
			$validator->validateNotEmpty($password,"password","Choisir un mot de passe !");	
			$validator->validateNotEmpty($passwordConfirm,"passwordConfirm","Ressaisir le mot de passe !");	
			$validator->validateNotEmpty($lastname,"lastname","Saisir votre nom !");	
			$validator->validateNotEmpty($firstname,"firstname","Saisir votre prénom !");	
			$validator->validateNotEmpty($birthyear,"birthyear","Saisir votre date de naissance !");
			$validator->validateNotEmpty($sex,"sex","Indiquer votre sexe !");	
			$validator->validateNotEmpty($job,"job","Saisir votre métier !");
			$validator->validateNotEmpty($instructorDescription,"instructorDescription","Saisir votre description en tant que formateur !");
			$validator->validateNotEmpty($studentDescription,"studentDescription","Saisir votre description en tant qu'étudiant !");	

			if ( !$validator->isValid()) {
				$error = $validator ->getErrors();
				$isValid = false;		
			}

			if ($isValid) {
				// 1 - on crée l'instance 
				$userManager = new \Manager\UserManager();

				//  erreur pour le mail (déjà existant)
				if ($userManager->emailExists($email)) {
					$isValid = false;
					$error['email'] = 'Email déjà utlisé !';
				}

				// erreur sur le mdp
				if($password != $passwordConfirm) {
					$isValid = false;
					$error['passwordConfirm'] = 'Les mots de passe ne correspondent pas !';
				}					
			}


			// upload du fichier 
			if($_FILES['image']['size']!= 0) {
				$file = new \Utils\ImageUpload($_FILES['image'] ,'assets/img/users/');

				$file->uploadFile();

				if (!$file->isValid()) {
					$isValid = false;
					$error['image'] = $file->getErrors();	
				}  else {
					$error['image'] = 'img/users/' . $file->getFileName();
					$_SESSION['image_user'] = $file->getFileName();
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
					"credit"=>2,
					"image" => $_SESSION['image_user'],
					"dateCreated" => date("Y-m-d H:i:s")
				]);
				// on redirige l'utilisateur vers la page d'accueil après la validation du formulaire
				$this->redirectToRoute("succeedregister");
			} 
		}
		$this->show('user/register',['error' => $error]);
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
			$this->redirectToRoute("home");
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


	public function detailAccount($username) 
	{
		
		// 1 - on crée l'instance 
		$userManager = new \Manager\UserManager();

		// 2 - on récupère les données du user
		$user = $userManager->find($_SESSION['user']['id']);
		// 3 - on affiche la page
		$this->show('user/detail_account', ['user'=>$user]);

	}
}

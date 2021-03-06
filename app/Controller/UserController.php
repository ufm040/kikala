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
		$isValid = true;
		// si l'utilisateur est déjà connecté => redirige vers la page "Mon compte"
		$authentificationManager = new \W\Security\AuthentificationManager;

		if ($authentificationManager->getLoggedUser()) {
			$this->show('user/detail_account', ['user'=>$this->getUser()]);	
		}

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
			$validator->validateNotEmpty($birthyear,"birthyear","Saisir votre année de naissance !");	
			$validator->validateNotEmpty($sex,"sex","Indiquer votre sexe !");
			$validator->validateNotEmpty($job,"job","Saisir votre métier !");	
			$validator->validateNotEmpty($instructorDescription,"instructorDescription","Saisir votre description en tant que formateur !");
			$validator->validateNotEmpty($studentDescription,"studentDescription","Saisir votre description en tant qu'étudiant !");	

			if ( $validator->isValid()) {			
				$validator->validateEmail($email,"email","L'email est incorrect !");
				$validator->validateYear($birthyear,"birthyear","Votre année de naissance doit être comprise entre 1900-2099 !");
				$validator->validateCharacter($username,"username","Le pseudo comporte des caractères interdits !");
			}

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

				if ($userManager->usernameExists($username)) {
					$isValid = false;
					$error['username'] = 'Ce pseudo est déjà utlisé !';					
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
				$file->reduceImage(false);

				if (!$file->isValid()) {
					$isValid = false;
					$error['image'] = $file->getErrors();	
				}  else {
					$error['image'] = 'img/users/' . $file->getFileName();
					$_SESSION['image_user'] = $file->getFileName();
				}						
			} else {
				$_SESSION['image_user'] = 'defaultImageUser.png';
			}



			// si c'est valide 
			if	($isValid) {
				// on insère en base de données
				// 2 - on appelle la méthode insert
				$user = $userManager->insert([
					"username" => $_POST['username'],
					"email" => $_POST['email'] ,
					"password" => password_hash($_POST['password'],PASSWORD_DEFAULT),
					"lastname" => $_POST['lastname'],
					"firstname" => $_POST['firstname'],
					"birthyear" => $_POST['birthyear'],
					"sex" => $_POST['sex'],
					"job" => $_POST['job'],
					"instructorDescription" => $_POST['instructorDescription'],
					"studentDescription" => $_POST['studentDescription'],
					"credit"=>2,
					"image" => $_SESSION['image_user'],
					"dateCreated" => date("Y-m-d H:i:s")
				]);

				// on connecte l'utilisateur 
				if ($user) {
					$userId = $userManager->lastInsertUser();

					$userConnect = $userManager->find($userId['id']);
						
					$userSecurity = new \W\Security\AuthentificationManager();
					// Connecte l'utiliasteur 
					$userSecurity ->logUserIn($userConnect);

				}

				// on redirige l'utilisateur vers une page de Bienvenue

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
		$errorconnect = '';

		// vérification de la combinaison d'email et mdp présents en bdd
		if(!empty($_POST)){
			$email = $_POST['email'];
			$password = $_POST['password'];

			if (isset($_POST['stayLogin'])) {
				$stayLogin = $_POST['stayLogin'];
			} else {
				$stayLogin = false;	
			}

			$authentificationManager = new \W\Security\AuthentificationManager;
			$result = $authentificationManager->isValidLoginInfo($email, $password);

			// si identifiants OK
			if($result > 0){
				// on récupère l'email en base de donnée
				$userManager = new \Manager\UserManager();	
				$user = $userManager->find($result);

				// on le connecte
				$authentificationManager->logUserIn($user);

				// on crée un cookies si l'utilisateur veut rester connecté

				if($stayLogin) {

					// création d'un token pour le cookie 
					$token = \W\Security\StringUtils::randomString(32);
					// hask du tocken et json_encode du value du cookies
					$tokenHash = password_hash($token,PASSWORD_DEFAULT);
					$value = json_encode(["id"=>$user['id'] , "token" =>$token]) ;
					setcookie("kikala_remember_me", $value, time()+3660,'/');

					// MAJ de la BDD avec le token du cookie
					$userManager->update([
						// on hache le token en base de données : Sécurity !
						'tokenCookie' => $tokenHash 
						], $user['id']);
				}
				$this->redirectToRoute("home");

			} 
			// mauvais identifiant 
			else {
				$errorconnect = "Email inconnu ou mot de passe incorrect";	
			}
		}
			
		// affiche la page
		$this->show('user/login',['error'=>$errorconnect]);
	}


	/**
	 * Page de déconnexion
	 */

	public function logout()
	{
		$userSecurity = new \W\Security\AuthentificationManager();
		// Déconnecte l'utilisateur 
		$userSecurity ->logUserOut();
		// affiche la page
		$this->show('user/logout');
	}

	/**
	 * Page de mot de passe oublié
	 */

	public function forgetpassword()
	{
		$error = '';
		if ($_POST) {
			$email = $_POST['email'];

			// vérifie qu'il existe
			$userManager = new \Manager\UserManager();
			$user = $userManager->getUserByUsernameOrEmail($email);

			if($user){

				// phpMailer
				$token = \W\Security\StringUtils::randomString(32);

				$userManager->update([
					// on hache le token en base de données : Sécurity !
					'token' => password_hash($token,PASSWORD_DEFAULT)
					], $user['id']);
				$resetLink = $this->generateUrl('newpassword', [
					'token' => $token,
					'username' => $user['username']
					], true);

				// envoie du resetLink par mail : appel de la classe SendMail()
				$mail = new \Utils\EmailSender($user['email']);
				$mail->setSubject('Changement de mot de passe');
				$mail->setContentMessage($resetLink);
				$mail->sendEmail();

				if ( ! $mail->getIsSend()) {
					var_dump('PROBLEME Envoie Mail');
				} else {
					var_dump($resetLink) ;
				}
				die();
			} else {
				$error = 'Email non connu dans la base';	
			}			
		}


		$this->show('user/forgetpassword',['error'=>$error]);
	}

	/**
	 * Page du nouveau mot de passe
	 */

	public function newpassword($token, $username)
	{
		$error = array() ;

		$userManager = new \Manager\UserManager();
		$user = $userManager->getUserByUsernameOrEmail($username);		
		if ($user) {
			if ($_POST) {
				$isValid = true;
				$newpassword = $_POST['newpassword'];
				$newpasswordConfirm = $_POST['newpasswordConfirm'];

				$validator = new \Utils\FormValidator();
		 
				$validator->validateNotEmpty($newpassword,"newpassword","Saisir un mot de passe");	
				$validator->validateNotEmpty($newpasswordConfirm,"newpasswordConfirm","Ressaisir le mot de passe");	

				if ( !$validator->isValid()) {
					$error = $validator ->getErrors();
					$isValid = false;		
				}

				// erreur sur le mdp
				if($newpassword != $newpasswordConfirm) {
					$isValid = false;
					$error['newpasswordConfirm'] = 'Les mots de passe ne correspondent pas !';
				}

				if ($isValid) {
					// - Mise à jour en BDD
					$userManager->update([
						// on hache le token en base de données : Sécurity !
						'token' => '',
						'password' => password_hash($newpassword,PASSWORD_DEFAULT) 
						], $user['id']);

					// - on connecte l'utilisateur 
					$authentificationManager = new \W\Security\AuthentificationManager;
					$authentificationManager->logUserIn($user);
					
					// - redirection vers la page du compte utilisateur 	
					$this->show('user/detail_account',['user'=>$user]);	
				}
			} 
				
			if (password_verify($token, $user['token'])) {
				$this->show('user/newpassword');	
			}
		}
		$this->showForbidden();
	}

	/**
	 * Page détail de mon compte 
	 */
	public function detailAccount($username) 
	{
		
		//  on crée l'instance UserManager 
		$userManager = new \Manager\UserManager();

		// on crée une instance security manager
		$authentificationManager = new \W\Security\AuthentificationManager;

		// - on récupère l'utilisateur connecté
		$userConnect = $authentificationManager -> getLoggedUser() ;


		// 2 - on récupère les données du user
		$user = $userManager->getUserByUsernameOrEmail($username);
		// 3 - on affiche la page si user trouvé 
		if ($user) {
			if($user['image'] =='') {
				$user['image'] = 'imageprofildefaut.png';
			}
			// Contrôle si l'utilisateur connecté n'est pas l'utilisateur du compte demandé
			// renvoi page détail kikologue
			if ( $userConnect['username'] != $username) {
				$newform  = new \Controller\FormationController();
				$formations = $newform->listFormations($user['username'], 1,true); 
				$this->show('user/detail_kikologue', ['kikologue'=>$user , 'formations'=>$formations]);
			// Sinon renvoie page détail account
			} else  {
				$this->show('user/detail_account', ['user'=>$user]);				
			}

				
		} else {
			// sinon page interdite	
			$this->showForbidden();	
		}
	}

	/**
	 * Page de modification du profil 
	 */
	public function profile($username)
	{
		$error = array() ;
		$isValid = true;

		//  on crée l'instance UserManager 
		$userManager = new \Manager\UserManager();

		// on crée une instance security manager
		$authentificationManager = new \W\Security\AuthentificationManager;

		// - on récupère l'utilisateur connecté
		$userConnect = $authentificationManager -> getLoggedUser() ;			

		// formulaire soumis ?
		if($_POST){
			$username = $_POST['username'];
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
			$validator->validateNotEmpty($lastname,"lastname","Saisir votre nom !");	
			$validator->validateNotEmpty($firstname,"firstname","Saisir votre prénom !");	
			$validator->validateNotEmpty($birthyear,"birthyear","Saisir votre année de naissance !");	
			$validator->validateNotEmpty($sex,"sex","Indiquer votre sexe !");
			$validator->validateNotEmpty($job,"job","Saisir votre métier !");	
			$validator->validateNotEmpty($instructorDescription,"instructorDescription","Saisir votre description en tant que formateur !");
			$validator->validateNotEmpty($studentDescription,"studentDescription","Saisir votre description en tant qu'étudiant !");	

			if ( $validator->isValid()) {			
				$validator->validateYear($birthyear,"birthyear","Votre année de naissance doit être comprise entre 1900-2099 !");
				$validator->validateCharacter($username,"username","Le pseudo comporte des caractères interdits !");
			}

			if ( !$validator->isValid()) {
				$error = $validator ->getErrors();
				$isValid = false;		
			}

			if ($isValid) {
				// 1 - on crée l'instance 
				$userManager = new \Manager\UserManager();

				if($userConnect['username'] != $username) {
					if ($userManager->usernameExists($username)) {
						$isValid = false;
						$error['username'] = 'Ce Pseudo est déjà utlisé !';					
					}						
				}

				
			}

			// upload du fichier 
			if($_FILES['image']['size']!= 0) {
				$file = new \Utils\ImageUpload($_FILES['image'] ,'assets/img/users/');

				$file->uploadFile();
				$file->reduceImage(false);

				if (!$file->isValid()) {
					$isValid = false;
					$error['image'] = $file->getErrors();	
				}  else {
					$error['image'] = 'img/users/' . $file->getFileName();
					$_SESSION['image_user'] = $file->getFileName();
				}						
			} else {
				$_SESSION['image_user'] = 'imageprofildefaut.png';
			}

			// si c'est valide 
			if	($isValid) {
				// Mise à jour dans la base de données
				// 2 - on appelle la méthode update
				$user = $userManager->update([
					"username" => $_POST['username'],
					"lastname" => $_POST['lastname'],
					"firstname" => $_POST['firstname'],
					"birthyear" => $_POST['birthyear'],
					"sex" => $_POST['sex'],
					"job" => $_POST['job'],
					"instructorDescription" => $_POST['instructorDescription'],
					"studentDescription" => $_POST['studentDescription'],
					"image" => $_SESSION['image_user']
				],$userConnect['id'] );

				// on met à jour les données utilisateurs 			
				$authentificationManager->refreshUser();
				$userConnect = $authentificationManager -> getLoggedUser() ;
			}	

		} else {
			$_POST = $userConnect;
		}
		
		// 3 - on affiche la page si user trouvé					
		if ($userConnect) {
			if($userConnect['image'] =='') {
				$error['image'] = 'imageprofildefaut.png';
			} else {
				$error['image'] =  $userConnect['image'];
			}
			if ( $userConnect['username'] == $username) {
				$this->show('user/profile',['error'=>$error]);
			}
		} 	
		// Sinon on redirige vers une page erreur 	
		$this->showForbidden();				
	}
}

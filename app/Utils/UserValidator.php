<?php
namespace Utils;


class UserValidator {

	private $post ;

	private $errors;
    private $isValid;


    public function __construct() {
        $this->errors = array(); 
        $this->isValid = true;      
    }	

    public function getErrors()
    {
        return $this->errors;
    }

    public function isValid() {
        return $this->isValid;
    }    

    public function validateFormulaire() {

		$username = $this->post['username'];
		$email = $this->post['email'];
		$password = $this->post['password'];
		$passwordConfirm = $this->post['passwordConfirm'];
		$lastname = $this->post['lastname'];
		$firstname = $this->post['firstname'];
		$birthyear = $this->post['birthyear'];
		$sex = $this->post['sex'];
		$job = $this->post['job'];
		$instructorDescription = $this->post['instructorDescription'];
		$studentDescription = $this->post['studentDescription'];


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
			$this->error = $validator ->getErrors();
			$this->isValid = false;		
		}

		if ($this->isValid) {
			// 1 - on crée l'instance 
			$userManager = new \Manager\UserManager();

			//  erreur pour le mail (déjà existant)
			if ($userManager->emailExists($email)) {
				$this->isValid = false;
				$this->error['email'] = 'Email déjà utlisé !';
			}

			if ($userManager->usernameExists($username)) {
				$this->isValid = false;
				$this->error['username'] = 'Ce pseudo est déjà utlisé !';					
			}

			// erreur sur le mdp
			if($password != $passwordConfirm) {
				$this->isValid = false;
				$this->error['passwordConfirm'] = 'Les mots de passe ne correspondent pas !';
			}					
		}

    }
 
    /**
     * Gets the value of post.
     *
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Sets the value of post.
     *
     * @param mixed $post the post
     *
     * @return self
     */
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }


}
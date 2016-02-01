<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil
	 */
	public function home()
	{

		$newFormation = new \Manager\FormationManager();

		$countFormation = $newFormation->countFormations();

		$newUser = new \Manager\UserManager();

		$countKikologue = $newUser->countKikologue();

		$this->show('default/home',['nbrFormation'=>$countFormation['nbrFormation'], 'nbrKikologue'=>$countKikologue['nbrKikologue']]);
	}

	/**
	 * Page à propos
	 */
	public function about()
	{
		$this->show('default/about');
	}

	/**
	 * Page mentions légales
	 */
	public function legals()
	{
		$this->show('default/legals');
	}

	/**
	 * Page réussite inscription
	 */
	public function succeedregister()
	{
		$this->show('default/succeedregister');
	}

}
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
		$this->show('default/home');
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
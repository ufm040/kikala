<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET', '/a-propos/', 'Default#about', 'about'],
		['GET', '/mentions-legales/', 'Default#legals', 'legals'],

		['GET', '/compte/inscription-reussie/', 'Default#succeedregister', 'succeedregister'],

		// user
		['GET|POST', '/compte/inscription/', 'User#register', 'register'],
		['GET|POST', '/compte/connexion/', 'User#login', 'login'],
		['GET|POST', '/compte/deconnexion/', 'User#logout', 'logout'],
		['GET|POST', '/compte/mot-de-passe-oublie/', 'User#forgetpassword', 'forgetpassword'],
		['GET|POST', '/compte/newpassword/[:token]/[:username]/', 'User#newpassword', 'newpassword'],
		['GET', '/mon-compte/accueil/[:username]/', 'User#detailAccount', 'detail_account'],
		['GET', '/mon-compte/profil/[:username]/', 'User#profile', 'profile'],

		// kikologue
		['GET', '/kikologue/[:username]/', 'User#detailAccount', 'detail_kikologue'],

		// formation
		['GET|POST', '/formation/creation/', 'Formation#formationregister', 'formationregister'],
		['GET', '/formation/liste/[:username]/', 'Formation#listFormations', 'list_formations'],
		['GET|POST', '/formation/detail/[:id]/', 'Formation#detailFormation', 'detail_formation'],


		// inscriptions
		['GET|POST', '/', 'Inscriptions#manageInscriptions', 'inscription_formation'],

		// user profile
	);

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
		['GET', '/compte/profil/[:username]/', 'User#detailAccount', 'detail_account'],

		// formation
		['GET|POST', '/formation/creation/', 'Formation#formationregister', 'formationregister'],
		['GET', '/formation/liste/', 'Formation#listFormations', 'list_formations'],
		['GET|POST', '/formation/detail/[:id]/', 'Formation#detailFormation', 'detail_formation'],


		// inscriptions
		['GET|POST', '/', 'Inscriptions#manageInscriptions', 'inscription_formation'],

		// user profile
	);

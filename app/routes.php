<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],

		['GET', '/a-propos/', 'Default#about', 'about'],
		['GET', '/mentions-legales/', 'Default#legals', 'legals'],

		// user
		['GET|POST', '/compte/inscription/', 'User#register', 'register'],
		['GET|POST', '/compte/connexion/', 'User#login', 'login'],
		['GET|POST', '/compte/deconnexion/', 'User#logout', 'logout'],
		['GET|POST', '/compte/mot-de-passe-oublie/', 'User#forgetpassword', 'forgetpassword'],
		['GET|POST', '/compte/nouveau-mot-de-passe/', 'User#newpassword', 'newpassword'],
		['GET', '/compte/account/[:username]/', 'User#detailAccount', 'detail_account'],


		// formation
		['GET|POST', '/formation/creation/', 'Formation#formationregister', 'formationregister'],
		['GET', '/formation/liste/', 'Formation#listFormations', 'list_formations'],
		['GET', '/formation/detail/[:id]/', 'Formation#detailFormation', 'detail_formation'],
	);

	

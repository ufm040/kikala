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
		['GET|POST', '/compte/nouveau-mot-de-passe/[:token]/[:username]/', 'User#newpassword', 'newpassword'],
		['GET', '/mon-compte/accueil/[:username]/', 'User#detailAccount', 'detail_account'],
		// user profil
		['GET|POST', '/mon-compte/profil/[:username]/', 'User#profile', 'profile'],

		// kikologue
		['GET', '/kikologue/[:username]/', 'User#detailAccount', 'detail_kikologue'],

		// formation
		['GET|POST', '/formation/creation/', 'Formation#formationregister', 'formationregister'],
		['GET|POST', '/formation/liste/[:username]/[:slug]/', 'Formation#listFormations', 'list_formations'],
		['GET|POST', '/formation/detail/[:id]/', 'Formation#detailFormation', 'detail_formation'],
		['GET','/formation/credit/[:token]/','Formation#creditKikos','credit_kikos'],

		// inscriptions
		['GET|POST', '/', 'Inscription#manageInscriptions', 'inscription_formation'],
		['GET', '/inscription/[:username]/[:slug]/', 'Inscription#listInscriptions', 'list_inscriptions'],
<<<<<<< HEAD

=======
>>>>>>> 55396c5ebb5bab66a9ce9ea6c472ca1c404e98fa
	);

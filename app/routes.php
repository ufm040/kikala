<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],

		// formation
		['GET|POST', '/formation/creation/', 'Formation#formationregister', 'formationregister'],
		['GET', '/formation/liste/', 'Formation#listFormations', 'list_formations'],
	);
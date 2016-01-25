<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],

		// formation
		['GET|POST', '/formation/creation/', 'Formation#formationregister', 'formationregister'],
	);
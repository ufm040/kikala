<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],

		// formation
		['GET|POST', '/formation/creation/', 'Formation#formationregister', 'formationregister'],
		['GET', '/formation/liste/', 'Formation#listFormations', 'list_formations'],
		['GET', '/formation/detail/[:id]', 'Formation#detailFormation', 'detail_formation'],
	);

	
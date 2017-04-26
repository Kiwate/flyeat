<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/contact', 'Default#contact', 'default_contact'],
		['GET', '/social', 'Default#social', 'default_social'],
		['GET', '/panier', 'Default#panier', 'default_panier'],

		['GET|POST', '/login', 'Security#login', 'security_login'],
		['GET|POST', '/register', 'Security#register', 'security_register'],
		['GET', '/logout', 'Security#logout', 'security_logout'],
	);
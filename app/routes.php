<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/contact', 'Default#contact', 'default_contact'],
		['GET', '/service', 'Default#service', 'default_service'],

		['GET|POST', '/login', 'Security#login', 'security_login'],
		['GET|POST', '/register', 'Security#register', 'security_register'],
		['GET', '/logout', 'Security#logout', 'security_logout'],
	);
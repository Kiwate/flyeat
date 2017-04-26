<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/contact', 'Default#contact', 'default_contact'],
		['GET', '/social', 'Default#social', 'default_social'],

		['GET|POST', '/login', 'Security#login', 'security_login'],
		['GET|POST', '/register', 'Security#register', 'security_register'],
		['GET', '/logout', 'Security#logout', 'security_logout'],

		['GET|POST', '/panier', 'Buy#panier', 'buy_panier'],
		['GET|POST', '/paiement', 'Buy#paiement', 'buy_paiement'],
		['GET', '/confirmation', 'Buy#confirmation', 'buy_confirmation'],

		['GET', '/legals', 'About#legals', 'about_legals'],
		['GET', '/cie', 'About#cie', 'about_cie'],

		['GET', '/restaurants', 'Choice#restaurants', 'choice_restaurants'],
		['GET|POST', '/menus', 'Choice#menus', 'choice_menus'],

	);
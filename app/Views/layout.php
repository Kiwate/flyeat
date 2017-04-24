<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo $this->url('default_home'); ?>"><?php echo $w_site_name; ?></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav">
					<li <?= ($w_current_route == 'default_home') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_home'); ?>">Accueil</a></li>
					<li <?= ($w_current_route == 'default_contact') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_contact'); ?>">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if ($w_user) { // si l'utilisateur est connecté ?>
						<li <?= ($w_current_route == 'article_index') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('article_index'); ?>">Liste des articles</a></li>
						<li <?= ($w_current_route == 'security_logout') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('security_logout'); ?>">Déconnexion</a></li>
					<?php } else { ?>
						<li <?= ($w_current_route == 'security_login') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('security_login'); ?>">Connexion</a></li>
						<li <?= ($w_current_route == 'security_register') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('security_register'); ?>">Inscription</a></li>
					<?php } ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<header>
			<h1>W :: <?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
</head>
<body>

		<header>

			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					    <ul class="nav navbar-nav">
					<?php if ($w_user) { // si l'utilisateur est connecté ?>
					      <li class="<?= ($w_current_route == 'security_logout') ? 'active' : ''; ?>"><a href="<?php echo $this->url('security_logout'); ?>"><i class="fa fa-user" aria-hidden="true"></i> Déconnexion</a></li>
					<?php } else { ?>
						<li class="<?= ($w_current_route == 'security_login') ? 'active' : ''; ?>"><a href="<?php echo $this->url('security_login'); ?>"><i class="fa fa-user" aria-hidden="true"></i> Connexion</a></li>
					<?php } ?>
						  <li <?= ($w_current_route == 'default_home') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_home'); ?>">Accueil</a></li>
					      <li><a href="#">A propos</a></li>						
						  <li <?= ($w_current_route == 'default_contact') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_contact'); ?>">Contact</a></li>
					      <li><a href="#">Panier <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
					      <?php if ($w_user['role'] === 'admin') { ?>
						  <li><a href="<?php echo $this->url('menus_gestion'); ?>">Gestion</a></li>
						  <?php } ?>
					    </ul>
					</div>
				</div>
			</nav>
			
	<div class="container text-center">
	<?php if ($w_current_route == 'default_home') { ?>
		<figure><img src="../public/assets/img/logo.png" alt="logo" class="logo"></figure>
		
		<form class="navbar-form" role="search">
			<button type="submit" class="btn btn-default"><a href="<?php echo $this->url('default_home'); ?>">VOIR LES MENUS</a></button>
		</form>
		<?php } else { ?>
		<section>
			<?= $this->section('main_content') ?>
		</section>
		<?php } ?>
	</div>

			<!-- Image en position Absolute -->
			<img src="../public/assets/img/assiette.png" class="img_absolute img-responsive">
			<img src="../public/assets/img/sushis.png" class="img_absolute2 img-responsive">
		</header>
<?php if ($w_current_route == 'default_home') { ?>
	<section>
			<?= $this->section('main_content') ?>
		</section>
		<?php } ?>
		<footer class="text-center">
		<div>
	        <p>Copyright FlyEat 2017</p>
	    </div>
		</footer>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">
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
					      <li class="pull-left" ><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
						  <li <?= ($w_current_route == 'default_home') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_home'); ?>">Accueil</a></li>
					      <li><a href="#">Services</a></li>						
						  <li <?= ($w_current_route == 'default_contact') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_contact'); ?>">Contact</a></li>
					      <li class="pull-right"><?= ($w_current_route == 'default_panier') ? 'class="active"' : ''; ?><a href="<?php echo $this->url('default_panier'); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
					    </ul>
					</div>
				</div>
			</nav>

			<div class="container text-center">
			<figure><img src=""></figure>
			
				<form class="navbar-form" role="search">
				  <div class="form-group">
				    <input type="text" class="form-control" placeholder="Search">
				  </div>
				  <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</div>

			<!-- Image en position Absolute -->
			<img src="">
			<img src="">

		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
			<br/><br/><br/>
			<div class="col-md-3 col-md-offset-1">
	        <p>&copy;opyright FlyEat 2017</p>
	      </div>
	      <div class="col-md-4">
	      	<p>Informations : <a href="tel:+33320651201">03.20.65.12.01</a> & <a href="tel:+33783489480">07.83.48.94.80</a></p>
	      </div>
	      <div class="col-md-4 logo">
	      	<ul class="list-inline">
	      		<li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
	      		<li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
	      		<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
	      		<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
	      	</ul>
	      </div>
	      <div>
	      	
	      </div>
		</footer>
</body>
</html>
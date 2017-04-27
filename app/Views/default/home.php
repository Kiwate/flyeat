<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>


<article class="container-fluid">
<div class="container text-center search">
	<figure><img src=""></figure>
			
	<form class="navbar-form" role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Recherche">
		</div>
		<button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
	</form>
</div>

			<!-- Image en position Absolute -->
			<img src="">
			<img src="">
	<!-- Trait de séparation -->
	<figure><img src=""></figure>

	<div class="row">
		<div class="col-md-4 col-md-offset-2">
			<h2>At vero eos :</h2>
			<br/>
			<p>"Lorem ipsum dolor sit amet, consecletur adipiscing elit, sed do elusmod tempor incidunt ut labore et dolore magna alique."</p>
			<br/>
			<button class="btn btn-default">Lire la suite</button>
		</div>
		<div class="col-md-6">
			<figure class="img-responsive">
				<img src="">
			</figure>
		</div>
	</div>

	<!-- Image entre les deux articles -->
	<figure>
		<img src="">
	</figure>
</article>

<article class="container-fluid">
	<!-- Trait de séparation -->
	<figure><img src=""></figure>

	<div class="text-center">
		<h2>Nous livrons chez vous :</h2>
		<br/>
		<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed da eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
	</div>

	<!-- Images superposées -->
	<figure>
		<img src="">
	</figure>
	<figure>
		<img src="">
	</figure>
	<figure>
		<img src="">
	</figure>

	<!-- Image de gauche -->
	<figure>
		<img src="">
	</figure>
	
</article>
<?php $this->stop('main_content') ?>

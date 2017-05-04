<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>


<article class="container-fluid">
	

			<!-- Image en position Absolute -->
			<img src="">
			<img src="">
	<!-- Trait de séparation -->
	<figure><img src="../public/assets/img/separator1.png" class="separator"></figure>

	<div class="row" id="services">
		<div class="col-md-4 col-md-offset-2">
			<h2>At vero eos :</h2>
			<br/>
			<p>"Lorem ipsum dolor sit amet, consecletur adipiscing elit, sed do elusmod tempor incidunt ut labore et dolore magna alique."</p>
			<br/>
			<button class="btn btn-default">Lire la suite</button>
		</div>
		<div class="col-md-6">
			<figure>
				<img src="../public/assets/img/drone.png" class="img-responsive">
			</figure>
		</div>
	</div>

</article>


	<!-- Formulaire -->

				<?php if (!empty($_POST)) {
					$name = $_POST['name'];
					$email = $_POST['email'];
					$message = $_POST['message'];

						// echo $name;
						// echo $email;
						// echo $message;

						mail('', $name, $message."  ".$email);
				} ?>


		<div class="container-fluid" id="contact">

				<figure><img src="../public/assets/img/separator1.png" class="separator"></figure>

				<div class="row contact_margin">
							<div class="col-md-8 col-md-offset-2">
											<h2 class="text-center">Nous livrons chez vous :</h2>
									<form name="sentMessage" method="POST" id="contact">
											<div class="control-group form-group">
													<div class="controls">
															<!-- <label>Full Name:</label> -->
															<input type="text" class="form-control" id="name" name="name" placeholder="Full name" required="" data-validation-required-message="Please enter your name." aria-invalid="false" required>
															<p class="help-block"></p>
													</div>
											</div>
											<div class="control-group form-group">
													<div class="controls">
															<!-- <label>Email Address:</label> -->
															<input type="email" class="form-control" id="email" name="email"  placeholder="Email" required="" data-validation-required-message="Please enter your email address." required>
													<div class="help-block"></div></div>
											</div>
											<div class="control-group form-group">
													<div class="controls">
															<!-- <label>Message:</label> -->
															<textarea rows="10" cols="100" class="form-control" placeholder="Messages" name="message" id="message" required="" data-validation-required-message="Please enter your message" maxlength="999" style="resize:none" required></textarea>
													<div class="help-block"></div></div>
											<div id="success"></div>
											<!-- For success/fail messages -->
												<button type="submit" class="btn btn-primary">Envoyer</button>
									</form>

							</div>

					</div>
			</div>
<?php $this->stop('main_content') ?>

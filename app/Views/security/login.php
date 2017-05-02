<?php $this->layout('layout', ['title' => 'Connexion']); ?>

<?php $this->start('main_content'); ?>

<?php  var_dump($w_user); ?>

    <form action="" method="POST">
        <div class="form-group">
            <label>Votre email :</label>
            <input id="email" name="email" class="form-control" type="text">
        </div>
        <div class="form-group">
            <label>Votre mot de passe :</label>
            <input id="password" name="password" class="form-control" type="password">
        </div>
        <button class="btn btn-submit">Se connecter</button>
    </form>

    <div class="text-center"><p>Pas de compte ? <a href="<?php echo $this->url('security_register'); ?>">Inscrivez vous.</a></p></div>

<?php $this->stop('main_content'); ?>
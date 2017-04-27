<?php $this->layout('layout', ['title' => 'Connexion']); ?>

<?php $this->start('main_content'); ?>

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

<?php $this->stop('main_content'); ?>
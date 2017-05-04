<?php $this->layout('layout', ['title' => 'Inscription']); ?>

<?php $this->start('main_content'); ?>

<div class="container">
    <?php if (!empty($messages)) {
            if (!isset($messages['success'])){
                echo '<div class="text-center alert alert-danger">';
                foreach($messages as $message) {
                echo $message . '<br/>';
                }
                echo '</div>';
            } else {
                echo '<div class="text-center alert alert-success">' . $messages['success'] . '</div>';
            }
        } 
    ?>
    <div class="row">
        <form action="" method="POST" class="col-md-4 col-md-offset-4">
            <div class="form-group">
                <label class="control-label" for="firstname">Prénom :</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="">
            </div>
            <div class="form-group">
                <label class="control-label" for="lastname">Nom :</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="">
            </div>
            <div class="form-group">
                <label class="control-label" for="email">Email :</label>
                <input type="email" name="email" id="email" class="form-control" value="">
            </div>
            <div class="form-group">
                <label class="control-label" for="adress">Adresse :</label>
                <input type="text" name="adress" id="adress" class="form-control" value="">
            </div>
            <div class="form-group">
                <label class="control-label" for="city">Ville :</label>
                <input type="text" name="city" id="city" class="form-control" value="">
            </div>
            <div class="form-group">
                <label class="control-label" for="postal">Code Postal :</label>
                <input type="text" name="postal" id="postal" class="form-control" value="">
            </div>
            <div class="form-group">
                <label class="control-label" for="phone">Téléphone :</label>
                <input type="text" name="phone" id="phone" class="form-control" value="">
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label" for="cfpassword">Confirmer le mot de passe :</label>
                <input type="password" name="cfpassword" id="cfpassword" class="form-control">
            </div>
            <button class="btn btn-submit">Inscription</button>
        </form>
    </div>
</div>
<?php $this->stop('main_content'); ?>
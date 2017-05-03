<?php $this->layout('layout', ['title' => 'Créer un menu']); ?>

<?php $this->start('main_content'); ?>
    <div>
        <a href="<?= $this->url('menus_index'); ?>" class="btn btn-warning">Retour aux menus</a>
    </div>

    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Nom du menu :</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="code">Code :</label>
            <input class="form-control" type="text" name="code" id="code">
        </div>
        <div class="form-group">
            <label for="image">Image lié au menu :</label>
            <input class="form-control" type="text" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="price">Prix :</label>
            <input class="form-control" type="text" name="price" id="price">
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <button class="btn btn-submit">Publier le menu</button>
    </form>

<?php $this->stop('main_content'); ?>
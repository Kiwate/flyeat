<?php $this->layout('layout', ['title' => 'Editer le menu ' . $menu['name']]); ?>

<?php $this->start('main_content'); ?>

    <div>
        <a href="<?php echo $this->url('menus_index') ?>">< Revenir à la liste des menus</a>
    </div>

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
        <form action="" method="POST" class="col-md-5">
            <div class="form-group">
                <label class="control-label" for="name">Nom du menu :</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $menu['name']; ?>">
            </div>
            <div class="form-group">
                <label class="control-label" for="code">Code :</label>
                <input type="text" name="code" id="code" class="form-control" value="<?php echo $menu['code']; ?>">
            </div>
            <div class="form-group">
                <label class="control-label" for="image">Image :</label>
                <input type="text" name="image" id="image" class="form-control" value="<?php echo $menu['image']; ?>">
            </div>
            <div class="form-group">
                <label class="control-label" for="price">Prix :</label>
                <input type="text" name="price" id="price" class="form-control" value="<?php echo $menu['price']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea class="form-control" name="description" id="description"><?php echo $menu['description']; ?></textarea>
            </div>
            <button class="btn btn-submit">Editer l'utilisateur</button>
        </form>
    </div>
</div>

<?php $this->stop('main_content'); ?>
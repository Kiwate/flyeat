<?php $this->layout('layout', ['title' => 'Créer un article']); ?>

<?php $this->start('main_content'); ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="title">Titre :</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="content">Contenu :</label>
            <textarea class="form-control" name="content" id="content"></textarea>
        </div>
        <input type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput">
        <button class="btn btn-submit">Publier l'article</button>
    </form>

<?php $this->stop('main_content'); ?>
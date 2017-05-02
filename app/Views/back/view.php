<?php $this->layout('layout', [ 'title' => $article['title'] ]) ?>

<?php $this->start('main_content') ?>

    <article>
        <p><?php echo $article['content'] ?></p>
    </article>
	
<?php $this->stop('main_content') ?>

<?php $this->layout('layout', ['title' => 'Administration']); ?>

<?php $this->start('main_content'); ?>
    
<div class="row">
    <div class="col-md-4 text-center col-md-offset-4">
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="">Gestion</a></li>
          <li><a href="<?php echo $this->url('security_index'); ?>">Gestion Utilisateurs</a></li>
          <li><a href="<?= $this->url('menus_index'); ?>">Gestion Menus</a></li>
          <li><a href="<?= $this->url('commands_index'); ?>">Voir les Commandes</a></li>
        </ul>
    </div>
</div>

<?php $this->stop('main_content'); ?>
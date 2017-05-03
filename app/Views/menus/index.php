<?php $this->layout('layout', ['title' => 'Liste des menus']); ?>

<?php $this->start('main_content'); ?>
    
    <div>
        <a href="<?php echo $this->url( 'menus_gestion'); ?>" class="btn btn-warning">Retour Gestion</a>
        <a href="<?= $this->url('menus_create') ?>" class="btn btn-primary">Ajouter un menu</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom du menu</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($menus)) { foreach ($menus as $menu) { ?>
                <tr>
                    <td><?php echo $menu['name'] ?></td>
                    <td><?php echo $menu['price'] ?></td>
                    <td><?php echo $menu['description'] ?></td>
                    <td>
                        <a href="<?php echo $this->url( 'menus_edit', [ 'id' => $menu['id'] ] ); ?>" class="btn btn-primary">Modifier</a>
                        <a href="<?php echo $this->url( 'menus_delete', [ 'id' => $menu['id'] ] ); ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php }} else { ?>
                <tr>
                    <td>Pas de Menus</td>
                    <td>Pas de Menus</td>
                    <td>Il faut en créer</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php $this->stop('main_content'); ?>
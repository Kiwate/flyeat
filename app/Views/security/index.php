<?php $this->layout('layout', ['title' => 'Liste des utilisateurs']); ?>

<?php $this->start('main_content'); ?>
    <a href="<?php echo $this->url( 'menus_gestion'); ?>" class="btn btn-warning">Retour Gestion</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user['firstname'] ?></td>
                    <td><?php echo $user['lastname'] ?></td>
                    <td>
                        <a href="<?php echo $this->url( 'security_edit', [ 'id' => $user['id'] ] ); ?>" class="btn btn-primary">Modifier</a>
                        <a href="<?php echo $this->url( 'security_delete', [ 'id' => $user['id'] ] ); ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php $this->stop('main_content'); ?>
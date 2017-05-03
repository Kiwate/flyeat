<?php $this->layout('layout', ['title' => 'Liste des commandes']); ?>

<?php $this->start('main_content'); ?>
    <div>
        <a href="<?php echo $this->url( 'menus_gestion'); ?>" class="btn btn-warning">Retour Gestion</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Menu(s)</th>
                <th>Client</th>
                <th>Adresse du client</th>
                <th>Ville du client</th>
                <th>Code postal du client</th>
                <th>Etat de la livraison</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($commands)) { foreach ($commands as $command) { ?>

                <tr>
                    <td><?= $command['name']; ?></td>
                    <td><?= $command['firstname']; ?> <?= $command['lastname']; ?></td>
                    <td><?= $command['adress']; ?></td>
                    <td><?= $command['city']; ?></td>
                    <td><?= $command['postal']; ?></td>
                    <td><?php if ($command['id_deliver'] == 0) {
                            echo "Commande à confirmer.";
                        } else if ($command['id_deliver'] == 1) {
                            echo "Commande en préparation.";
                        } else if ($command['id_deliver'] == 2) {
                            echo "Commande en livraison.";
                        } else if ($command['id_deliver'] == 3) {
                            echo "Commande livrée.";
                        }  ?>        
                    </td>
                    <td>
                        <a href="<?php echo $this->url( 'commands_add', [ 'id' => $command['id'] ] ); ?>" class="btn btn-primary">Actualiser la commande</a>
                        <a href="<?php echo $this->url( 'commands_delete', [ 'id' => $command['id'] ] ); ?>" class="btn btn-danger">Supprimer la commande</a>
                    </td>
                </tr>
            <?php }} else { ?>
                <tr>
                    <td>Pas de commandes</td>
                    <td>Pas de commandes</td>
                    <td>Pas de commandes</td>
                    <td>Pas de commandes</td>
                    <td>Pas de commandes</td>
                    <td>Pas de commandes</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php $this->stop('main_content'); ?>
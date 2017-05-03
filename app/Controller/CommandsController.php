<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CommandsModel;

class CommandsController extends Controller
{
	public function index() 
	{
		$this->allowTo('admin');
		$commands_manager = new CommandsModel();
		$commands = $commands_manager->findAllCommands();
		$this->show('commands/index', array('commands' => $commands));
	}

	public function delete($id)
    {
        $this->allowTo('admin');
        $commands_manager = new CommandsModel();
        $commands_manager->delete($id); // Supprime la commande de la bdd
        $this->redirectToRoute('commands_index'); // Après la suppression je redirige l'admin vers la liste des commandes.
    }

    public function add($id)
    {
        $this->allowTo('admin');
        $commands_manager = new CommandsModel();
        $commands = $commands_manager->find($id); // Je vais chercher une commande dans la bdd par son ID.
        if ($commands['id_deliver'] == 0) {
        	$commands_manager = new CommandsModel();
        	$commands_manager->update([
				'id_deliver' => 1,
			], $id);
        } else if ($commands['id_deliver'] == 1) {
        	$commands_manager = new CommandsModel();
        	$commands_manager->update([
				'id_deliver' => 2,
			], $id);
        } else if ($commands['id_deliver'] == 2) {
        	$commands_manager = new CommandsModel();
        	$commands_manager->update([
				'id_deliver' => 3,
			], $id);
        }
        $this->redirectToRoute('commands_index');
	}
}

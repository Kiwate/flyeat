<?php

namespace Model;

class CommandsModel extends \W\Model\Model
{
	public function findAllCommands()
	{
		$query = $this->dbh->prepare("
	    	SELECT commands.id,commands.id_deliver, users.firstname, users.lastname,users.adress,users.city,users.postal, menus.name
			FROM commands
			INNER JOIN users
			ON commands.id_user = users.id
			INNER JOIN menus
			ON commands.id_menu = menus.id
		");
	    $query->execute();

	    return $query->fetchAll();
	}
}
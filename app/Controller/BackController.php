<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\BackModel;

class BackController extends Controller
{
	/**
    * Page qui montre le back
    */
    public function gestion()
    {
        $this->allowTo('admin'); // J'autorise uniquement les admin à accèder à cette page
        $this->show('back/gestion'); 
    }

}
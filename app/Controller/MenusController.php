<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\MenusModel;

class MenusController extends Controller
{
	/**
    * Page qui montre le back
    */
    public function gestion()
    {
        $this->allowTo('admin'); // J'autorise uniquement les admin à accèder à cette page
        $this->show('menus/gestion'); 
    }

    public function index()
    {
        $this->allowTo('admin');
        $menus_manager = new MenusModel(); // J'instancie la class pour gérer mes Menus en BDD
        $menus = $menus_manager->findAllMenus(); // Je récupére tous les Menus en bdd (SELECT * FROM menus)
        $this->show('menus/index', ['menus' => $menus]);
    }

    /**
    * Edition d'un menu
    */
    public function edit($id)
    {
        $this->allowTo('admin');
        $menus_manager = new MenusModel();
        $menus = $menus_manager->find($id); // Je vais chercher un menu dans la bdd par son ID.
        $messages = '';
        if (!empty($_POST)) {
           if (!empty($_POST)) { // Vérifie que le formulaire est posté
            $name = $_POST['name'];
            $description = $_POST['description'];
            $code = $_POST['code'];
            $image = $_POST['image'];
            $price = $_POST['price'];


            $menus_manager = new MenusModel(); // J'instancie la classe pour gérer mes menus en BDD
            if (!empty($name) && !empty($description) && !empty($price)) { // Je vérifie si les champs sont vide ou pas
                $menus_manager->update([
                        'name' => $name,
                        'description' => $description,
                        'code' => $code,
                        'image' => $image,
                        'price' => $price
                    ], $id);
                $messages = ['success' => 'Les modifications ont été mis en place.'];
                 $this->redirectToRoute('menus_index'); // La fonction s'arrête
            }
        }
    }
     $this->show('menus/edit', array('menu' => $menus ));
}

    public function delete($id)
    {
        $this->allowTo('admin');
        $menus_manager = new MenusModel();
        $menus_manager->delete($id); // Supprime l'article de la bdd
        $this->redirectToRoute('menus_index'); // Après la suppression je redirige l'utilisateur vers la liste des menus.
    }

    /**
     * Page de création des menus
    **/
    public function create()
    {
        $this->allowTo('admin');
        // Traitement du formulaire
        if (!empty($_POST)) { // Vérifie que le formulaire est posté
            $name = $_POST['name'];
            $description = $_POST['description'];
            $code = $_POST['code'];
            $image = $_POST['image'];
            $price = $_POST['price'];


            $menus_manager = new MenusModel(); // J'instancie la classe pour gérer mes menus en BDD
            if (!empty($name) && !empty($description) && !empty($price)) { // Je vérifie si les champs sont vide ou pas
                $menus_manager->insert($_POST);
                $this->redirectToRoute('menus_index');
            }
        }
        
        $this->show('menus/create');
    }
}
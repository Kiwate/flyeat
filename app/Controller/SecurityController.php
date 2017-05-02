<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UserModel;

class SecurityController extends Controller
{
    /**
     * Permet la connexion d'un utilisateur
    */
    public function login()
    {
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $auth_manager = new \W\Security\AuthentificationModel();

            $user_id = $auth_manager->isValidLoginInfo($email, $password);
            if ($user_id) { // Si le couple username/password est valid
                $user_manager = new UserModel();
                $user = $user_manager->find($user_id); // Récupére toutes les infos de l'utilisateur qui se connecte
                $auth_manager->logUserIn($user); // La connexion se fait
                $this->redirectToRoute('default_home');
            }
        }

        //var_dump($this->getUser());

        $this->show('security/login');
    }

    public function index()
    {
        $this->allowTo('admin'); // J'autorise uniquement les admin à accèder à cette page
        $user_manager = new UserModel(); // J'instancie la class pour gérer mes utilisateurs en BDD
        $users = $user_manager->findAllUser(); // Je récupére tous les utilisateurs en bdd (SELECT * FROM users)
        $this->show('security/index', ['users' => $users]);
    }

     /**
     * Edition d'un utilisateur
    */
    public function edit($id)
    {
        $this->allowTo('admin');
        $user_manager = new UserModel();
        $user = $user_manager->find($id); // Je vais chercher un utilisateur dans la bdd par son article
        $messages = '';
        if (!empty($_POST)) {
            $firstname = trim($_POST['firstname']); // On peut se passer de addslashes car avec PDO on fait une requête préparé
            $lastname = trim($_POST['lastname']);
            $email = trim($_POST['email']);
            $adress = trim($_POST['adress']);
            $city = trim($_POST['city']);
            $postal = trim($_POST['postal']);
            $phone = trim($_POST['phone']);
            if (strlen($firstname) < 1) {
                    $errors['firstname'] = "Le prénom doit contenir au moins 2 caractères.";
            }
            if (strlen($lastname) < 1) {
                    $errors['lastname'] = "Le nom doit contenir au moins 2 caractères.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "L'email est vide ou non valide.";
            }
            if (strlen($adress) < 6) {
                    $errors['adress'] = "L'adresse doit contenir au moins 7 caractères.";
            }
            if (strlen($city) < 1) {
                    $errors['city'] = "La ville doit contenir au moins 2 caractères.";
            }
            if ((strlen($postal) < 4) && (!is_numeric($postal))) {
                    $errors['postal'] = "Le code postal doit contenir au moins 5 chiffres.";
            }
            if ((strlen($phone) < 9) && (!is_numeric($phone))) {
                    $errors['phone'] = "Le numéro de téléphone n'est pas correct.";
            }
            
            if ( empty($errors) ) {
                $user = $user_manager->update([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'adress' => $adress,
                    'city' => $city,
                    'postal' => $postal,
                    'phone' => $phone,
                    'email' => $email,
                ], $id);

                $messages = ['success' => 'Les modifications ont été mis en place.'];
                 $this->redirectToRoute('security_index'); // La fonction s'arrête
            } else {
                $messages = $errors;
            }
        }
        $this->show( 'security/edit', array( 'user' => $user ) );
    }

    public function delete($id)
    {
        $this->allowTo('admin');
        $user_manager = new UserModel();
        $user_manager->delete($id); // Supprime l'article de la bdd
        $this->redirectToRoute('security_index'); // Après la suppression je redirige l'utilisateur vers la liste des articles
    }

    /**
     * Permet l'inscription d'un utilisateur
    */
    public function register()
    {
        $messages = '';
        $firstname = '';
        $email = '';

        // Traitement du formulaire d'inscription
        if (!empty($_POST)) {
            $firstname = trim($_POST['firstname']); // On peut se passer de addslashes car avec PDO on fait une requête préparé
            $lastname = trim($_POST['lastname']);
            $email = trim($_POST['email']);
            $adress = trim($_POST['adress']);
            $city = trim($_POST['city']);
            $postal = trim($_POST['postal']);
            $phone = trim($_POST['phone']);
            $password = trim($_POST['password']);
            $cfpassword = trim($_POST['cfpassword']);
            $user_manager = new UserModel();
            $errors = [];
            // On vérifie si l'email existe déjà en BDD
            if ( $user_manager->emailExists($email)) {
                $errors['exists'] = "L'email existe."; // Equivalent du array_push($array, $data)
            }
            if (strlen($firstname) < 1) {
                    $errors['firstname'] = "Le prénom doit contenir au moins 2 caractères.";
            }
            if (strlen($lastname) < 1) {
                    $errors['lastname'] = "Le nom doit contenir au moins 2 caractères.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "L'email est vide ou non valide.";
            }
            if (strlen($adress) < 6) {
                    $errors['adress'] = "L'adresse doit contenir au moins 7 caractères.";
            }
            if (strlen($city) < 1) {
                    $errors['city'] = "La ville doit contenir au moins 2 caractères.";
            }
            if ((strlen($postal) < 4) && (!is_numeric($postal))) {
                    $errors['postal'] = "Le code postal doit contenir au moins 5 chiffres.";
            }
            if ((strlen($phone) < 9) && (!is_numeric($phone))) {
                    $errors['phone'] = "Le numéro de téléphone n'est pas correct.";
            }
            if (strlen($password) < 8) {
                    $errors['password'] = "Le mot de passe doit contenir au moins 8 caractères.";
            }
            // (?=.*\d) Au moins 1 digit dans la chaine
            // (?=.*[a-zA-Z])   Au moins 1 caractère alpha dans la chaine
            // {8,}     Au moins 8 caractères
            else if (!preg_match("/(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{8,}/", $password)) {
                    $errors['email'] = "Le mot de passe doit contenir au moins 1 caractère numérique (0-1), un caractère en majuscule.";
            }

            if ( $password !== $cfpassword ) {
                $errors['password'] = "Les mots de passe ne correspondent pas";
            }
            
            if ( empty($errors) ) {
                $auth_manager = new \W\Security\AuthentificationModel(); // J'instancie le authentificationmodel qui facilite la gestion de l'authentification des utilisateurs
                // S'il n'y a pas d'erreurs, on inscrit l'utilisateur en base de données
                $user_manager->insert([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'adress' => $adress,
                    'city' => $city,
                    'postal' => $postal,
                    'phone' => $phone,
                    'email' => $email,
                    'password' => $auth_manager->hashPassword($password),
                    'role' => 'user'
                ]);

                $messages = ['success' => 'Vous êtes bien inscrit.'];
                // $this->redirectToRoute('route'); // La fonction s'arrête
            } else {
                $messages = $errors;
            }

        }

        $this->show( 'security/register', [ 'messages' => $messages, 'firstname' => $firstname, 'email' => $email ] );
    }

    /**
     * Déconnexion de l'utilisateur
    */
    public function logout()
    {
        $auth_manager = new \W\Security\AuthentificationModel();
        $auth_manager->logUserOut(); // Déconnecte l'utilisateur connecté
        $this->redirectToRoute('default_home');
    }
}
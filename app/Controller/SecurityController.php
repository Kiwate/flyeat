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
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "L'email est vide ou non valide.";
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
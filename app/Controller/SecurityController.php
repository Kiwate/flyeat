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
            $username = $_POST['username'];
            $password = $_POST['password'];
            $auth_manager = new \W\Security\AuthentificationModel();

            $user_id = $auth_manager->isValidLoginInfo($username, $password);
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
        $username = '';
        $email = '';

        // Traitement du formulaire d'inscription
        if (!empty($_POST)) {
            $username = trim($_POST['username']); // On peut se passer de addslashes car avec PDO on fait une requête préparé
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $cfpassword = trim($_POST['cfpassword']);
            $user_manager = new UserModel();
            $errors = [];
            // On vérifie si l'email ou le username existent déjà en BDD
            if ( $user_manager->emailExists($email) || $user_manager->usernameExists($username) ) {
                $errors['exists'] = "L'email ou l'username existent."; // Equivalent du array_push($array, $data)
            }
            if ( empty($username) || !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                $errors['username'] = "L'email ou username sont vides ou non valides.";
            }
            if ( $password !== $cfpassword ) {
                $errors['password'] = "Les mots de passe ne correspondent pas";
            }
            
            if ( empty($errors) ) {
                $auth_manager = new \W\Security\AuthentificationModel(); // J'instancie le authentificationmodel qui facilite la gestion de l'authentification des utilisateurs
                // S'il n'y a pas d'erreurs, on inscrit l'utilisateur en base de données
                $user_manager->insert([
                    'username' => $username,
                    'email' => $email,
                    'password' => $auth_manager->hashPassword($password),
                    'role' => 'admin'
                ]);

                $messages = ['success' => 'Vous êtes bien inscrit.'];
                // $this->redirectToRoute('route'); // La fonction s'arrête
            } else {
                $messages = $errors;
            }

        }

        $this->show( 'security/register', [ 'messages' => $messages, 'username' => $username, 'email' => $email ] );
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
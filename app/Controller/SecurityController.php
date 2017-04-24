<?php

namespace Controller;

use \W\Controller\Controller;

class SecurityController extends Controller
{
    /** 
     * Permet la connexion d'un utilisateur
    */
    public function login()
    {
        $this->show('security/login');
    }

    public function register()
    {
        $this->show('security/register');
    }
}
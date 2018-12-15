<?php

class MdlUtilisateur {

    function connexion($email, $password) {

    }

    function deconnexion() {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    function isUtilisateur() {
        if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
            
        }
    } 

}
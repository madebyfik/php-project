<?php

class MdlUtilisateur {

    function connexion($email, $password) {
        $dVueEreur = [];
        Validation::valFormConnexion($email, $password, $dVueEreur);
        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $userGateway = new UtilisateurGateway($con);
        $user = $userGateway->findByEmail($email);

        if($user != null) {
            if(password_verify($password, $user->getPassword())) {
                
                echo ("password match");
            } else {
                //génerer une erreur
                echo ("doen't match");
            }
        } else {
            //génerer une erreur
            echo ("no user");
        }
    } 

    function deconnexion() {
        session_unset();
        session_destroy();
        $_SESSION = array();  
    }

    function isUtilisateur() {
        if(isset($_SESSION['email'])) {
            $email = $_SESSION['email'];

            Validation::valString($email);
            
            $userGateway = new UtilisateurGateway(new Connexion('mysql:host=localhost;dbname=projetphp', 'root', ''));

            $result = $userGateway->findByEmail($email);

            return true;
        } else {
            return false;
        }
    }

}
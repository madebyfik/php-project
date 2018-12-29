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
                $_SESSION['email'] = $user->getMail();

                header('Location: index.php'); 
            } else {
                throw new Exception("Le mot de passe ou l'adresse mail est invalide");
            }
        } else {
            throw new Exception("Le mot de passe ou l'adresse mail est invalide");
        }
    }

    function userProfileDate($email) {
        $dVueEreur = [];
        Validation::valString($email);
        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $userGateway = new UtilisateurGateway($con);
        $user = $userGateway->findByEmail($email);

        return $user;
    }

    function deconnexion() {
        session_unset();
        session_destroy();
        $_SESSION = array();  
    }

    function isUtilisateur() {
        if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
            $email = $_SESSION['email'];

            Validation::valString($email);
            
            $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
            $userGateway = new UtilisateurGateway($con);

            $user = $userGateway->findByEmail($email);

            return true;
        } else {
            return false;
        }
    }

}
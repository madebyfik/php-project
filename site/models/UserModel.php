<?php

class UserModel {

    function connect($email, $password) {
        $dVueErreur = [];
        Validation::valFormConnexion($email, $password, $dVueErreur);
        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $userGateway = new UserGateway($con);
        $user = $userGateway->findByEmail($email);
        if(count($dVueErreur) > 0) {
            throw new Exception($dVueErreur[0]);
        }

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

    function userProfile($email) {
        $dVueEreur = [];
        Validation::valString($email);
        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $userGateway = new UserGateway($con);
        $user = $userGateway->findByEmail($email);

        return $user;
    }

    function disconnect() {
        session_unset();
        session_destroy();
        $_SESSION = array();  
    }

    function isUser() {
        if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
            $email = $_SESSION['email'];

            Validation::valString($email);
            
            $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
            $userGateway = new UserGateway($con);

            $user = $userGateway->findByEmail($email);

            return true;
        } else {
            return false;
        }
    }

}
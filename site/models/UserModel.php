<?php

class UserModel {

    private $_userGateway;

    public function __construct() {
        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $this->_userGateway = new UserGateway($con);
    }

    public function connect($email, $password) {
        $errorArray = [];
        Validation::valFormConnection($email, $password, $errorArray);
        
        if(count($errorArray) > 0) {
            throw new Exception($errorArray[0]);
        }

        $user = $this->_userGateway->findByEmail($email);

        if($user != null) {
            if(password_verify($password, $user->getPassword())) {
                $_SESSION['email'] = $user->getMail();

                header('Location: index.php'); 
            } else {
                throw new Exception("Password or mail incorrect");
            }
        } else {
            throw new Exception("Password or mail incorrect");
        }
    }

    public function userProfile($email) {
        $errorArray = [];

        Validation::valEmail($email, $errorArray);

        if(count($errorArray) > 0) {
            throw new Exception($errorArray[0]);
        }
        
        $user = $this->_userGateway->findByEmail($email);

        return $user;
    }

    public function disconnect() {
        session_unset();
        session_destroy();
        $_SESSION = array();  
    }

    public function isUser() {
        if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
            $email = $_SESSION['email'];

            $errorArray = [];

            Validation::valEmail($email, $errorArray);

            if(count($errorArray) > 0) {
                throw new Exception($errorArray[0]);
            }
            
            $user = $this->_userGateway->findByEmail($email);

            return true;
        } else {
            return false;
        }
    }

}
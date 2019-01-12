<?php

class UserModel {

    private $_userGateway;

    public function __construct() {
        global $bdd;
        $con = new Connection('mysql:host=localhost;dbname=projetphp', $bdd["username"], $bdd["password"]);
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

    public function register($email, $name, $surname, $password, $passwordConfirmation){
        $errorArray = [];
        Validation::valFormRegister($email, $name, $surname, $password, $passwordConfirmation, $errorArray);

        if (count($errorArray) > 0){
            throw new Exception($errorArray[0]);
        }

        $user = $this->_userGateway->findByEmail($email);

        if($user === null) {
            if($password === $passwordConfirmation) {
                $options = [
                    'cost' => 12,
                ];

                $passHash = password_hash($password, PASSWORD_BCRYPT, $options);
                var_dump($email);
                $this->_userGateway->insert($surname, $name, $email, $passHash);

                header('Location: index.php?action=connect');
            } else {
                throw new Exception("Password doesn't match");
            }
        } else {
            throw new Exception("Account already exists with this email");
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
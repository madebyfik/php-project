<?php

/**
 * Class UserModel
 */
class UserModel {

    /**
     * @var UserGateway Contient le gateway de l'utilisateur
     */
    private $_userGateway;

    /**
     * UserModel constructor.
     */
    public function __construct() {
        global $bdd;
        $con = new Connection($bdd["dsn"], $bdd["username"], $bdd["password"]);
        $this->_userGateway = new UserGateway($con);
    }

    /**
     * Permet à un utilisateur de se connecter
     * @param $email Represente l'adresse mail de l'utilisateur
     * @param $password Represente le mot de passe de l'utilisateur
     * @throws Exception
     */
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

    /**
     * Permet à un utilisateur de créer un compte
     * @param $email Represente l'adresse mail de l'utilisateur
     * @param $name Represente le prenom de l'utilisateur
     * @param $surname Represente le nom de l'utilisateur
     * @param $password Represente le mot de passe de l'utilisateur
     * @param $passwordConfirmation Represente la confirmation du mot de passe
     * @throws Exception
     */
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
                
                $this->_userGateway->insert($surname, $name, $email, $passHash);

                header('Location: index.php?action=connect');
            } else {
                throw new Exception("Password doesn't match");
            }
        } else {
            throw new Exception("Account already exists with this email");
        }
    }

    /**
     * Permet de trouver un utilisateur avec son adresse mail
     * @param $email Represente l'adresse mail de l'utilisateur
     * @return null|User Retourne l'utilisateur
     * @throws Exception
     */
    public function userProfile($email) {
        $errorArray = [];

        Validation::valEmail($email, $errorArray);

        if(count($errorArray) > 0) {
            throw new Exception($errorArray[0]);
        }
        
        $user = $this->_userGateway->findByEmail($email);

        return $user;
    }

    /**
     *
     */
    public function disconnect() {
        session_unset();
        session_destroy();
        $_SESSION = array();  
    }

    /**
     * Verifie que c'est un utilisateur
     * @return bool
     * @throws Exception
     */
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
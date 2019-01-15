<?php

/**
 * Class UserGateway
 */
class UserGateway {

    /**
     * @var
     */
    private $_con;

    /**
     * UserGateway constructor.
     * @param $con
     */
    public function __construct($con) {
        $this->_con = $con;
    }

    /**
     * Permet d'inserer un utilisateur dans la table utilisateur
     * @param $nom Represente le nom de l'utilisateur
     * @param $prenom Represente le prenom de l'utilisateur
     * @param $email Represente l'adresse mail de l'utilisateur
     * @param $password Represente le mot de passe de l'utilisateur
     */
    public function insert($nom, $prenom, $email, $password) {
        $query = 'INSERT INTO utilisateur (nom, prenom, mail, password)  VALUES(:nom, :prenom, :email, :password)';

        $this->_con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':prenom' => array($prenom, PDO::PARAM_STR),
            ':email' => array($email, PDO::PARAM_STR),
            ':password' => array($password, PDO::PARAM_STR)
        ));
    }

    /**
     * Premet de retourner un utilisateur grace a son adresse mail
     * @param $email Represente l'adresse mail de l'utilisateur
     * @return null|User Retourne un utilisateur
     */
    public function findByEmail($email) {
        $query = 'SELECT * FROM utilisateur WHERE mail = :email LIMIT 1';
        
        $this->_con->executeQuery($query, array(
            ':email' => array($email, PDO::PARAM_STR)
        ));
        
        $results = $this->_con->getResults();

        if(count($results) == 1) {
            $user = new User(
                $results[0]['id'], 
                $results[0]['nom'], 
                $results[0]['prenom'], 
                $results[0]['mail'], 
                $results[0]['password']
            );
            return $user;
        }

        return null;
    }
    
}

?>
<?php

class UserGateway {

    private $_con;

    public function __construct($con) {
        $this->_con = $con;
    }

    public function insert($nom, $prenom, $email, $password) {
        $query = 'INSERT INTO utilisateur (nom, prenom, mail, password)  VALUES(:nom, :prenom, :email, :password)';

        $this->_con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':prenom' => array($prenom, PDO::PARAM_STR),
            ':email' => array($email, PDO::PARAM_STR),
            ':password' => array($password, PDO::PARAM_STR)
        ));
    }

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
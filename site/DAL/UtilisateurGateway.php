<?php

class UtilisateurGateway {

    private $_con;

    public function($con) {
        $this->_con = $con;
    }

    public function insert($nom, $prenom, $mail, $password) {
        $query = 'INSERT INTO utilisateur (nom, prenom, mail, password)  VALUES(:nom, :prenom, :mail, :password)';

        $this->_con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':prenom' => array($prenom, PDO::PARAM_STR),
            ':mail' => array($mail, PDO::PARAM_STR),
            ':password' => array($password, PDO::PARAM_STR)
        ));
    }

    public function update($id, $nom, $prenom, $mail, $password) {}
    
    public function delete($id) {}

    public function findByEmail($email) {
        $query = 'SELECT COUNT(*) FROM utilisateur WHERE email = :email';

        $this->_con->executeQuery($query, array(
            ':email' => array($email, PDO::PARAM_STRING)
        ));

        $results = $this->_con->getResults();

    }
    
}
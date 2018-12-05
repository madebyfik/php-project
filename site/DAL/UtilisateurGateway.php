<?php

class UtilisateurGateway {

    private $_con;

    public function($con) {
        $this->_con = $con;
    }

    public function insert($nom, $prenom, $mail, $password) {}
    public function update($id, $nom, $prenom, $mail, $password) {}
    public function delete($id) {}
    
}
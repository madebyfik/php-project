<?php

class Utilisateur {

    private $_id;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_password;

    function __construct($id, $nom, $prenom, $mail, $password) {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_mail = $mail;
        $this->_password = $password;
    }

    public function getId() {
        return $this->_id;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getPrenom() {
        return $this->_prenom;
    }

    public function getMail() {
        return $this->_mail;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function setNom($nom) {
        $this->_nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->_prenom = $prenom;
    }

    public function setMail($mail) {
        $this->_mail = $mail;
    }

    public function setPassword($password) {
        $this->_password = $password;
    }
}


?>
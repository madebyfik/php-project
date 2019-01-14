<?php

/**
 * Class User
 */
class User {

    /**
     * @var Contient l'id de l'utilisateur
     */
    private $_id;
    /**
     * @var Contient le nom de l'utilisateur
     */
    private $_nom;
    /**
     * @var Contient le prénom de l'utilisateur
     */
    private $_prenom;
    /**
     * @var Contient le mail de l'utilsateur
     */
    private $_mail;
    /**
     * @var Contient le mot de passe de l'utilisateur
     */
    private $_password;

    /**
     * User constructor, permet l'initialisation d'un User avec des données de bases
     * @param $id Représente la valeur de base de l'id de l'utilisateur
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $password
     */
    function __construct($id, $nom, $prenom, $mail, $password) {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_mail = $mail;
        $this->_password = $password;
    }

    /**
     * @return mixed Retourne l'id de l'utilisateur
     */
    public function getId() {
        return $this->_id;
    }

    /**
     * @return mixed Retourne
     */
    public function getNom() {
        return $this->_nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom() {
        return $this->_prenom;
    }

    /**
     * @return mixed
     */
    public function getMail() {
        return $this->_mail;
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        return $this->_password;
    }

    /**
     * @param $id
     */
    public function setId($id) {
        $this->_id = $id;
    }

    /**
     * @param $nom
     */
    public function setNom($nom) {
        $this->_nom = $nom;
    }

    /**
     * @param $prenom
     */
    public function setPrenom($prenom) {
        $this->_prenom = $prenom;
    }

    /**
     * @param $mail
     */
    public function setMail($mail) {
        $this->_mail = $mail;
    }

    /**
     * @param $password
     */
    public function setPassword($password) {
        $this->_password = $password;
    }
}


?>
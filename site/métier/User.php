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
     * @param $nom Représente le nom de l'utilisateur
     * @param $prenom Représente le prenom de l'utilisateur
     * @param $mail Représente l'adresse email de l'utilisateur
     * @param $password Représente le mot de passe de l'utilisateur
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
     * @return mixed Retourne le nom de l'utilisateur
     */
    public function getNom() {
        return $this->_nom;
    }

    /**
     * @return mixed Retourne le prenom de l'utilisateur
     */
    public function getPrenom() {
        return $this->_prenom;
    }

    /**
     * @return mixed Retourne l'adresse mail de l'utilisateur
     */
    public function getMail() {
        return $this->_mail;
    }

    /**
     * @return mixed Retourne le mot de passe de l'utilisateur
     */
    public function getPassword() {
        return $this->_password;
    }

    /**
     * @param $id Définit la valeur de base de l'id de l'utilisateur
     */
    public function setId($id) {
        $this->_id = $id;
    }

    /**
     * @param $nom Définit le nom de l'utilisateur
     */
    public function setNom($nom) {
        $this->_nom = $nom;
    }

    /**
     * @param $prenom Définit le prenom de l'utilisateur
     */
    public function setPrenom($prenom) {
        $this->_prenom = $prenom;
    }

    /**
     * @param $mail Définit l'adresse email de l'utilisateur
     */
    public function setMail($mail) {
        $this->_mail = $mail;
    }

    /**
     * @param $password Définit le mot de passe de l'utilisateu
     */
    public function setPassword($password) {
        $this->_password = $password;
    }
}


?>
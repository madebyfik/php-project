<?php

class ListeTache {

    private $_id;
    private $_nom;
    private $_public;
    private $_idUtilisateur;

    function __construct($id, $nom, $public, $idUtilisateur) {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_public = $public;
        $this->_idUtilisateur = $idUtilisateur;
    }

    public function getId() {
        return $_id;
    }

    public function getNom() {
        return $_nom;
    }

    public function getPublic() {
        return $_public;
    }

    public function getIdUtilisateur() {
        return $_idUtilisateur;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function setNom($nom) {
        $this->_nom = $nom;
    }

    public function setPublic($public) {
        $this->_public = $public;
    }

    public function setIdUtilisateur($idUtilisateur) {
        $this->_idUtilisateur = $idUtilisateur
    }

}
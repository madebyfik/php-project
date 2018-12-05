<?php

class Tache {

    private $_id;
    private $_nom;
    private $_description;
    private $_idList;

    function __construct($id, $nom, $description, $idList) {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_description = $description;
        $this->_idUtilisateur = $idUtilisateur;
    }

    public function getId() {
        return $_id;
    }

    public function getNom() {
        return $_nom;
    }

    public function getDescription() {
        return $_description;
    }

    public function getIdList() {
        return $_idList;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function setNom($nom) {
        $this->_nom = $nom;
    }

    public function setDescription($description) {
        $this->_description = $description;
    }

    public function setIdList($idList) {
        $this->_idList = $idList
    }

}
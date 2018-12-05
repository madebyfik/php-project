<?php

class Tache {

    private $id;
    private $nom;
    private $description;
    private $idList;

    function __construct($id, $nom, $description, $idList) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->idUtilisateur = $idUtilisateur;
    }

    public function getId() {
        return $id;
    }

    public function getNom() {
        return $nom;
    }

    public function getDescription() {
        return $description;
    }

    public function getIdList() {
        return $idList;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setIdList($idList) {
        $this->idList = $idList
    }

}
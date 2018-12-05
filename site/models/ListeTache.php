<?php

class ListeTache {

    private $id;
    private $nom;
    private $public;
    private $idUtilisateur;

    function __construct($id, $nom, $public, $idUtilisateur) {
        $this->id = $id;
        $this->nom = $nom;
        $this->public = $public;
        $this->idUtilisateur = $idUtilisateur;
    }

    public function getId() {
        return $id;
    }

    public function getNom() {
        return $nom;
    }

    public function getPublic() {
        return $public;
    }

    public function getIdUtilisateur() {
        return $idUtilisateur;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPublic($public) {
        $this->public = $public;
    }

    public function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur
    }

}
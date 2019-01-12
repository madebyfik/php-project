<?php

class Task {

    private $_id;
    private $_nom;
    private $_description;
    private $_completed;
    private $_idList;

    public function __construct($id, $nom, $description, $completed, $idList) {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_description = $description;
        $this->_completed = $completed;
        $this->_idList = $idList;
    }

    public function getId() {
        return $this->_id;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getCompleted() {
        return $this->_completed;
    }

    public function getIdList() {
        return $this->_idList;
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

    public function setCompleted($completed) {
        $this->_completed = $completed;
    }

    public function setIdList($idList) {
        $this->_idList = $idList;
    }

}
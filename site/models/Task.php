<?php

/**
 * Class Task
 */
class Task {

    /**
     * @var Contient l'identifiant de la tache
     */
    private $_id;
    /**
     * @var Contient le nom de la tache
     */
    private $_nom;
    /**
     * @var Contient la description de la tache
     */
    private $_description;
    /**
     * @var Contient la completion de la tache
     */
    private $_completed;
    /**
     * @var Contient l'identifiant de la liste
     */
    private $_idList;

    /**
     * Task constructor.
     * @param $id Represente l l'identifiant de la tache
     * @param $nom Represente le nom de la tache
     * @param $description Represente la description de la tache
     * @param $completed Represente la completion de la tache
     * @param $idList Represente l'identifiant de la liste
     */
    public function __construct($id, $nom, $description, $completed, $idList) {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_description = $description;
        $this->_completed = $completed;
        $this->_idList = $idList;
    }

    /**
     * @return mixed Retourne l'identifiant de la tache
     */
    public function getId() {
        return $this->_id;
    }

    /**
     * @return mixed Retourne le nom de la tache
     */
    public function getNom() {
        return $this->_nom;
    }

    /**
     * @return mixed Retourne la description de la tache
     */
    public function getDescription() {
        return $this->_description;
    }

    /**
     * @return mixed Restourne la completion de la tache
     */
    public function getCompleted() {
        return $this->_completed;
    }

    /**
     * @return mixed Retourne l'identifiant de la liste
     */
    public function getIdList() {
        return $this->_idList;
    }

    /**
     * @param $id Définit l'identifiant de la tache
     */
    public function setId($id) {
        $this->_id = $id;
    }

    /**
     * @param $nom Définit le nom de la tache
     */
    public function setNom($nom) {
        $this->_nom = $nom;
    }

    /**
     * @param $description Définit la description de la tache
     */
    public function setDescription($description) {
        $this->_description = $description;
    }

    /**
     * @param $completed Définit la completion de la tache
     */
    public function setCompleted($completed) {
        $this->_completed = $completed;
    }

    /**
     * @param $idList Définit l'identifiant de la liste
     */
    public function setIdList($idList) {
        $this->_idList = $idList;
    }

}
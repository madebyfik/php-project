<?php

/**
 * Class ListTask
 */
class ListTask {

    /**
     * @var Contient l'identifiant de la liste
     */
    private $_id;
    /**
     * @var Contient le nom de la liste
     */
    private $_nom;
    /**
     * @var Contient la visibilité de la liste
     */
    private $_public;
    /**
     * @var Contient l'identifiant de l'utilisateur
     */
    private $_idUtilisateur;

    /**
     * ListTask constructor.
     * @param $id Represente l'identifiant de la liste
     * @param $nom Represente le nom de la liste
     * @param $public Represente la visibilié de la liste
     * @param $idUtilisateur Represente l'identifiant de l'utilisateur
     */
    function __construct($id, $nom, $public, $idUtilisateur) {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_public = $public;
        $this->_idUtilisateur = $idUtilisateur;
    }

    /**
     * @return mixed Retourne l'identifiant de la liste
     */
    public function getId() {
        return $this->_id;
    }

    /**
     * @return mixed Retourne le nom de la liste
     */
    public function getNom() {
        return $this->_nom;
    }

    /**
     * @return mixed  Retourne la visibilité de la liste
     */
    public function getPublic() {
        return $this->_public;
    }

    /**
     * @return mixed Retourne l'identifiant de l'utilisateur
     */
    public function getIdUtilisateur() {
        return $this->_idUtilisateur;
    }

    /**
     * @param $id Définit l'identifiant de la liste
     */
    public function setId($id) {
        $this->_id = $id;
    }

    /**
     * @param $nom Définit le nom de la liste
     */
    public function setNom($nom) {
        $this->_nom = $nom;
    }

    /**
     * @param $public Définit la visibilité de la liste
     */
    public function setPublic($public) {
        $this->_public = $public;
    }

    /**
     * @param $idUtilisateur Définit l'identifiant de l'utilisateur
     */
    public function setIdUtilisateur($idUtilisateur) {
        $this->_idUtilisateur = $idUtilisateur;
    }

}